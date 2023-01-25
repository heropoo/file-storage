#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Moon\Application;

$app = new Application(__DIR__, ['debug' => true]);
$app->runConsole();