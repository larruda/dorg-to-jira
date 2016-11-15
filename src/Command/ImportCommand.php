<?php

namespace Larruda\DorgToJira\Command;

use EclipseGc\DrupalOrg\Api\DrupalClient;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use chobie\Jira\Api;
use chobie\Jira\Api\Authentication\Basic;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;


class ImportCommand extends Command {

    private $config = [];

    private $node = NULL;

    private $placeholders = [
        '%ISSUE_URL%' => 'getUrl',
        '%ISSUE_TITLE%' => 'getTitle',
        '%ISSUE_NID%' => 'getNid',
        '%ISSUE_TYPE%' => 'getType',
        '%ISSUE_BODY%' => 'getBody',
    ];

    protected function configure()
    {
        $this
            ->setName('dorg-to-jira')
            ->setDescription('Imports an issue from Drupal.org into a JIRA instance.')
            ->setDefinition(
                new InputDefinition([
                    new InputOption('config', 'c', InputOption::VALUE_REQUIRED),
                    new InputArgument('issue', InputArgument::REQUIRED, 'The issue id (nid) on Drupal.org.')
                ])
            );
    }

    protected function interact(InputInterface $input, OutputInterface $output) {
        $configFile = $input->getOption('config') ? $input->getOption('config') : getcwd() . '/config.yml';
        if (!file_exists($configFile)) {
            throw new RuntimeException(sprintf('Config file is not accessible or does not exist: %s', $configFile));
        }
        try {
            $this->config = Yaml::parse(file_get_contents($configFile));
        } catch (ParseException $e) {
            throw new RuntimeException(sprintf(
                "Unable to parse the YAML config file: %s\n%s",
                    $configFile,
                    $e->getMessage())
            );
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $issueId = $input->getArgument('issue');

        $question = new Question('Please enter your Jira password: ');
        $question
            ->setHidden(true)
            ->setHiddenFallback(false);
        $jiraPass = $helper->ask($input, $output, $question);

        $dorg = DrupalClient::create();
        $this->node = $dorg->getProjectIssue($issueId);
        $project = $dorg->getNode($this->node->getProject()['id']);
        $this->config['fields']['labels'] = [$project->getTitle()];

        $jiraUrl = rtrim($this->config['jira'], '/') . '/';

        array_walk($this->config['fields'], function(&$value) {
            if (isset($value['value']) && isset($this->placeholders[$value['value']])) {
                $value = $this->node->{$this->placeholders[$value['value']]}();
            }
        });

        $issueSummary = "#{$this->node->getNid()} {$this->node->getTitle()}";
        $jira = new Api($jiraUrl, new Basic($this->config['user'], $jiraPass));

        $response = $jira->createIssue($this->config['key'], $issueSummary, 1, $this->config['fields']);

        if (isset($response->getResult()['id']) && !empty($response->getResult()['id'])) {
            $jira->createRemotelink(
                $response->getResult()['key'],
                [
                    'url' => $this->node->getUrl(),
                    'title' => $this->node->getUrl()
                ]
            );
            $output->writeln("<info>Issue created:\n{$jiraUrl}browse/{$response->getResult()['key']}</info>");
        } else {
            throw new RuntimeException(sprintf(
                "There was an error when trying to create the issue on JIRA.\n%s",
                $response->getResult()['errors']['description']
            ));
        }
    }
}