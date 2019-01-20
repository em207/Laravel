<?php

return [
    'connection' => [
        'hosts' => ['192.168.10.10:9200'],
        'logger' => Elasticsearch\ClientBuilder::defaultLogger(storage_path('logs/elastic-search.log'), 400),
        'retries' => 1,
    ],

    'pagination' => 30
];