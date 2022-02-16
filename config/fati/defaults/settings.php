<?php

return [
    'notifications' => [
        /*
        |--------------------------------------------------------------------------
        | Activity
        |--------------------------------------------------------------------------
        |
        | Here you may add the default activity options for a user.
        |
        */
        'activity' => [
            'assigned' => true,
            'added' => true,
            'mentioned' => true,
            'activity' => true,
        ],

        /*
        |--------------------------------------------------------------------------
        | Service
        |--------------------------------------------------------------------------
        |
        | Here you may add the default service options for a user
        |
        */
        'service' => [
            'newsletter' => true,
            'feature_enhancements' => true,
            'updates_bug_fixes' => true
        ],
    ]
];
