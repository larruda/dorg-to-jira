#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: larruda
 * Date: 10/29/16
 * Time: 12:17 AM
 */
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Larruda\DorgToJira\Command\ImportCommand;

$application = new Application();

$application->add(new ImportCommand());

$application->run();