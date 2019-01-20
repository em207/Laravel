<?php

return [
    'connection' => [
        'hosts' => ['ash-127634581:9200'],
        'logger' => Elasticsearch\ClientBuilder::defaultLogger(storage_path('logs/elastic-search.log'), 400),
        'retries' => 1,
    ],

    'pagination' => 30
];