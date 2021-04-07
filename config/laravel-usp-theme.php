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
        'text' => 'SubItem 2',
        'url' => config('app.url') . '/subitem2',
        'can' => 'admin',
    ],
    [
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

return [
    'title' => config('app.name'),
    'skin' => env('USP_THEME_SKIN', 'uspdev'),
    'app_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => [
        [
            'text' => '<i class="fas fa-plus-square"></i> Cadastrar registro',
            'url' => config('app.url') . 'termos/create',
            /* 'can' => '', */
        ],
        [
            'text' => 'CDD',
            'submenu' => $submenu1,
            /* 'can' => 'admin', */
        ],
        [
            'text' => 'SubMenu2',
            'submenu' => $submenu2,
            'can' => 'admin',
        ],
    ],
    'right_menu' => [
        [
            'text' => '<i class="fas fa-cog"></i>',
            'title' => 'Configurações',
            'target' => '_blank',
            'url' => config('app.url') . '/item1',
            'align' => 'right',
        ],
    ],
];
