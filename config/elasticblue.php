<?php

return [
    'connection' => [
        'hosts' => ['https://ash-127634581.eu-west-1.bonsaisearch.net/'],
        'logger' => Elasticsearch\ClientBuilder::defaultLogger(storage_path('logs/elastic-search.log'), 400),
        'retries' => 1,
    ],

    'pagination' => 30
];