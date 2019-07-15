<?php declare(strict_types=1);

return [
    'settings' => [
        'displayErrorDetails' => getenv('DISPLAY_ERROR_DETAILS'),
        'useRedisCache' => filter_var(getenv('USE_REDIS_CACHE'), FILTER_VALIDATE_BOOLEAN),
    ],
];
