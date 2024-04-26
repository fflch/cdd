<?php

$pesquisa = [
    [
        'text' => '<i class="fas fa-plus-square"></i> Termos por categoria',
        'url' => '/',
        'can' => 'admin',
    ],
    [
        'text' => '<i class="fas fa-plus-square"></i> Termos por booleana',
        'url' => config('app.url') . '/termo/pesquisabooleana',
        'can' => 'admin',
    ],
    [
        'text' => '<i class="fas fa-plus-square"></i> CDD',
        'url' => config('app.url') . '/termo/pesquisacdd',
        'can' => 'admin',
    ],
];

$right_menu = [
    [
        'text' => '<i class="fas fa-hard-hat"></i>',
        'title' => 'Logs',
        'target' => '_blank',
        'url' => config('app.url') . '/logs',
        'align' => 'right',
        'can' => 'admins',
    ],
    [
        'text' => '<i class="fas fa-users"></i>',
        'title' => 'Users',
        'target' => '_blank',
        'url' => config('app.url') . '/users',
        'align' => 'right',
        'can' => 'admins',
    ],
];

return [
    'title' => config('app.name'),
    'skin' => env('USP_THEME_SKIN', 'uspdev'),
    'app_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => [
        [
            'text' => '<i class="fas fa-plus-square"></i> Cadastrar novo registro',
            'url' => config('app.url') . '/termos/create',
            'can' => 'admin',
        ],
        [
            'text' => '<i class="fas fa-plus-square"></i>  Pesquisa',
            'submenu' => $pesquisa,
            'can' => 'admin',
        ],

    ],
    'right_menu' => $right_menu,
];
