<?php

namespace Larruda\DorgToJira\Command;

use EclipseGc\DrupalOrg\Api\DrupalClient;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use chobie\Jira\Api;
use chobie\Jira\Api\Authentication\Basic;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;


class ImportCommand extends Command {

    protected function configure()
    {
        $this
            ->setName('jira:import')
            ->setDescription('Describe args behaviors')
            ->addArgument('issue', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $config = Yaml::parse(file_get_contents('./config.yml'));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
        $helper = $this->getHelper('question');
        $issue_id = $input->getArgument('issue');

        $question = new Question('Please enter your Jira password: ');
        $question
            ->setHidden(true)
            ->setHiddenFallback(false);
        $jira_pass = $helper->ask($input, $output, $question);

        $client = DrupalClient::create();
        $node = $client->getNode($issue_id);
        $jira_url = rtrim($config['jira'], '/') . '/';

        $issue_summary = "#{$node->getNid()} {$node->getTitle()}";

        $api = new Api($jira_url, new Basic($config['user'], $jira_pass));

        try {
            $response = $api->createIssue($config['key'], $issue_summary, 1, $config['fields']);

            if (isset($response->getResult()['id']) && !empty($response->getResult()['id'])) {
                $output->writeln("Issue created: {$jira_url}browse/{$response->getResult()['key']}");
            } else {
                $output->writeln("There was an error trying to create the Issue.");
                $output->writeln("ERROR: {$response->getResult()['errors']['description']}");
            }
        } catch (Api\UnauthorizedException $e) {
            $output->writeln("ERROR: {$e->getMessage()}");
        }
    }
}