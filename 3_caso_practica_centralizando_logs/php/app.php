<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;

$log = new Logger('logger');

$stdoutHandler = new \Monolog\Handler\ErrorLogHandler();

// JSON formatter
$formatter = new \Monolog\Formatter\JsonFormatter();
$stdoutHandler->setFormatter($formatter);

// Elasticsearch Handler
$elasticaClient = new \Elastica\Client(
    [
        'host' => 'localhost',
        'port' => 9200
    ]
);

$elasticsearchHandler = new \Monolog\Handler\ElasticSearchHandler(
    $elasticaClient,
    [
        'index' => 'codelytv'
    ]
);

// Register Handlers
$log->pushHandler($stdoutHandler);
$log->pushHandler($elasticsearchHandler);

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
