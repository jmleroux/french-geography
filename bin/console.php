#!/usr/bin/env php
<?php

chdir(__DIR__ . '/..');

$loader = require(__DIR__ . '/../vendor/autoload.php');
$loader->add('JmLeroux', __DIR__ . '/../src');

use JmLeroux\FrenchGeography\Command\DownloadSourcesCommand;
use JmLeroux\FrenchGeography\Command\GenerateListCommand;
use Symfony\Component\Console\Application;

$config = 'app/config/main.php';

$application = new Application();
$application->add(new GenerateListCommand);
$application->add(new DownloadSourcesCommand());
$application->run();
