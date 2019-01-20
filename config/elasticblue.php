<?php

return [
    'connection' => [
        'hosts' => ['https://iysuhfpcx9:2jisc2zdbt@ash-127634581.eu-west-1.bonsaisearch.net:9200'],
        'logger' => Elasticsearch\ClientBuilder::defaultLogger(storage_path('logs/elastic-search.log'), 400),
        'retries' => 1,
    ],

    'pagination' => 30
];