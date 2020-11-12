<?php
$submenu1 = [
    [
        'text' => '<i class="fas fa-atom"></i>  SubItem 1',
        'url' => config('app.url') . '/subitem1',
    ],
    
    [
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
    ],
    
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
    'dashboard_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => [
        [
            'text' => '<i class="fas fa-home"></i> Home',
            'url' => config('app.url') . '/records',
        ],
        [
            'text' => 'Cadastrar novo CDD',
            'url' => config('app.url') . '/records/create',
            /*'can' => '',*/
        ],
        [
            'text' => 'Item 3',
            'url' => config('app.url') . '/item3',
            'can' => 'admin',
        ],
        [
            'text' => 'SubMenu1',
            'submenu' => $submenu1,
            'can' => '',
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
