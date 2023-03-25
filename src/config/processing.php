<?php

return [
    'auth-token-header' => env('PROCESSING_AUTH_TOKEN_HEADER', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJub25lIn'),

    'log_channel' => env('PROCESSING_LOG_CHANNEL', 'processing_webhook')
];