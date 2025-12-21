<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google API Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for Google APIs including Drive, Picker, etc.
    |
    */

    'client_id' => env('GOOGLE_CLIENT_ID', 'YOUR_GOOGLE_CLIENT_ID_HERE'),

    'api_key' => env('GOOGLE_API_KEY', 'YOUR_GOOGLE_API_KEY_HERE'),

    /*
    |--------------------------------------------------------------------------
    | Google Drive Configuration
    |--------------------------------------------------------------------------
    |
    | Specific configuration for Google Drive integration
    |
    */

    'drive' => [
        'scopes' => [
            'https://www.googleapis.com/auth/drive.readonly',
        ],

        'mime_types' => [
            'image/png',
            'image/jpeg',
            'image/jpg',
            
        ],
    ],
];
