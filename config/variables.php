<?php

return [

    'boolean' => [
        '0' => 'No',
        '1' => 'Yes',
    ],

    'role' => [
        '0' => 'User',
        '1' => 'Manager',
        '4' => 'Admin',
        '5' => 'Superadmin',
    ],

    'status' => [
        '1' => 'Active',
        '0' => 'Inactive',
    ],

    'avatar' => [
        'public' => '/files/avatar/',
        'folder' => public_path() . '/files/avatar/',

        'image' => [
            'width'  => 160,
            'height' => 160,
        ]
    ],
    'gambar_pasar' => [
        'public' => '/files/gambar_pasar/',
        'folder' => public_path() . '/files/gambar_pasar/',

        'image' => [
            'width'  => 160,
            'height' => 160,
        ]
    ],
    'gambar_komoditas' => [
        'public' => '/files/gambar_komoditas/',
        'folder' => public_path() . '/files/gambar_komoditas/',

        'image' => [
            'width'  => 160,
            'height' => 160,
        ]
    ],

    /*
    |------------------------------------------------------------------------------------
    | ENV of APP
    |------------------------------------------------------------------------------------
    */
    'APP_ADMIN' => env('APP_ADMIN', 'admin'),
    'APP_TOKEN' => env('APP_TOKEN', 'admin123456'),
];
