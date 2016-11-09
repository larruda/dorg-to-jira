#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: larruda
 * Date: 10/29/16
 * Time: 12:17 AM
 */
require __DIR__.'/vendor/autoload.php';

use Larruda\DorgToJira\Command\ImportCommand;
use Larruda\DorgToJira\SingleCommandApplication;

$application = new SingleCommandApplication();

$application->add(new ImportCommand());

$application->run();