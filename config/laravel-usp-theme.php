<?php

$cdd = [
    [
        'text' => '<i class="fas fa-list"></i> Listar',
        'url' => config('app.url') . '/cdd',
    ],
    [
        'text' => '<i class="fas fa-plus"></i>  Cadastrar CDD',
        'url' => config('app.url') . '/cdd/create',
        'can' => 'admins',
    ],
];

$menu = [
    [
        'text' => '<i class="fas fa-plus-square"></i> Cadastrar novo registro',
        'url' => config('app.url') . '/termos/create',
        'can' => 'admin',
    ],
    /*[
        'text' => 'Índice CDD',
        'submenu' => $cdd,
        'can' => 'admin',

    ],*/
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

/* $right_menu = [
    [
        'text' => '<i class="fas fa-cog"></i>',
        'title' => 'Configurações',
        'target' => '_blank',
        'url' => config('app.url') . '/',
        'align' => 'right',
    ],
]; */

# dashboard_url renomeado para app_url
# USPTHEME_SKIN deve ser colocado no .env da aplicação 

return [
    'title' => config('app.name'),
    'skin' => env('USP_THEME_SKIN', 'uspdev'),
    'app_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => $menu,
    'right_menu' => $right_menu,
];