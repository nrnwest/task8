<?php

declare(strict_types=1);

return [
    // data files
    'abbreviations' => 'resources/race/abbreviations.txt',
    'end' => 'resources/race/end.txt',
    'start' => 'resources/race/start.txt',
    'api' => [
        'format' => 'format',
        'formatType' => [
            'json' => 'json',
            'xml' => 'xml'
        ],
        'contentType' => 'Content-Type',
        'textXml' => 'text/xml',
        'xmlHeader' => '<?xml version="1.0" encoding="utf-8"?><root></root>',
    ]
];
