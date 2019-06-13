<?php

return [
    'category' => [
        'type' => ['product'],
        'limit' => 6,
    ],
    'slide' => [
        'limit' => 5,
    ],
    'contact' => [
        'limit' => 5,
    ],
    'about' => [
        'limit' => 5,
    ],
    'product' => [
        'limit' => 30,
    ],
    'pricing' => [
        'limit' => 3,
    ],
    'date' => [
        'blog' => 'd F Y',
    ],
    'flicker' => [
        'base_url' => 'https://api.flickr.com/services/rest/',
        'api_key' => '3c73644788ac2d1aa5694a308c7c71e4',
        'photo_setid' => '72157674021237807',
    ],
    'documents' => [
        'link' => 'realty-edits_documents.pdf',
    ],
    'email' => [
        'realty-edits' => env('EMAIL_INFO', 'dung13890@gmail.com'),
    ],
];
