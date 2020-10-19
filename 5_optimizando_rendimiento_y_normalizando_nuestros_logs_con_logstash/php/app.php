<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;

$log = new Logger('logger');

$stdoutHandler = new \Monolog\Handler\ErrorLogHandler();
$formatter = new \Monolog\Formatter\JsonFormatter();
$stdoutHandler->setFormatter($formatter);

// File Handler
$fileHandler = new \Monolog\Handler\RotatingFileHandler('../../var/logs/app.log', 0, Logger::DEBUG);
$formatter = new \Monolog\Formatter\JsonFormatter();
$fileHandler->setFormatter($formatter);

$log->pushHandler($fileHandler);
$log->pushHandler($stdoutHandler);


// APLICATIONS
$options = getopt('a:b:');

# App Servidor A
if ($options['a'] == 'warning') {
    $log->warn('Esto es un Warning', ['Servidor' => 'Servidor A']);
} else {
    $log->info('Esto es un Info', ['Servidor' => 'Servidor A']);
}

# App Servidor B
if ($options['b'] == 'error') {
    $log->error('Esto es un Error', ['Servidor' => 'Servidor B']);
} else {
    $log->info('Esto es un Info', ['Servidor' => 'Servidor B']);
}
