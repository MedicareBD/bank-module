<?php

return [
    'name' => 'Bank',

    'menus' => [
        [
            'text'              => 'Bank',
            'icon'              => 'fas fa-university',
            'order'             => 13,
            'can'               => 'banks-read',
            'submenu' => [
                [
                    'text'      => 'Add Bank',
                    'route'     => 'admin.banks.create',
                    'can'       => 'banks-create'
                ],
                [
                    'text'      => 'Manage Banks',
                    'route'     => 'admin.banks.index',
                    'can'       => 'banks-read'
                ]
            ]
        ],
    ]
];
