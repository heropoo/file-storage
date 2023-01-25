<?php

/**
 * @var \Moon\Console\Console $console
 */

$console->add('fmc', 'FillModelCommentCommand::run', 'Fill Model Comment');
$console->add('serve', 'HttpServerCommand::run', 'Run a http server');
$console->add('debug:routes', 'DebugCommand::routes', 'List all web routes');