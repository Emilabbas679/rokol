<?php


return [
    'api' => env('LSIM_API'),
    'login' => env('LSIM_LOGIN'),
    'password' => env('LSIM_PASSWORD'),
    'sender' => env('LSIM_SENDER'),
    'endpoints' => [
        'smssender'=> env('LSIM_API').'smssender',
        'balance' => env('LSIM_API').'balance',
    ]

];