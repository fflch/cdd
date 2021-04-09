<?php

$submenu1 = [
    [
        'text' => '<i class="fas fa-list"></i> Índice CDD',
        'url' => config('app.url') . 'cdd',
    ],
    [
        'text' => '<i class="fas fa-plus"></i>  Cadastrar CDD',
        'url' => config('app.url') . 'cdd/create',
    ],
    /* [
        'type' => 'divider',
    ],
    [
        'type' => 'header',
        'text' => 'Cabeçalho',
    ],
    [
        'text' => 'SubItem 3',
        'url' => config('app.url') . '/subitem3',
    ], */
];

$submenu2 = [
    [
        'text' => 'SubItem 1',
        'url' => config('app.url') . '/subitem1',
    ],
    [
        'text' => 'SubItem 2',
        'url' => config('app.url') . '/subitem2',
        'can' => 'admin',
    ],
];
$menu = [
    [
        'text' => '<i class="fas fa-plus-square"></i> Cadastrar registro',
        'url' => config('app.url') . 'termos/create',
    ],
    [
        'text' => 'Item 2',
        'url' => config('app.url') . '/item2',
        'can' => '',
    ],
    [
        'text' => 'Item 3',
        'url' => config('app.url') . '/item3',
        'can' => 'admin',
    ],
    [
        'text' => 'CDD',
        'submenu' => $submenu1,
    ],
    [
        'text' => 'SubMenu2',
        'submenu' => $submenu2,
        'can' => 'admin',
    ],
];

$right_menu = [
    [
        'text' => '<i class="fas fa-cog"></i>',
        'title' => 'Configurações',
        'target' => '_blank',
        'url' => config('app.url') . '/item1',
        'align' => 'right',
    ],
];

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