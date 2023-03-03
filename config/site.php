<?php

return [
    'siteTitle' => 'App Name',
    'copyright' => 'copyright text',
    'contactNo' => '+8165464656546',
    'email'     => 'info@sitedomain.com',

    /*---- Sidebar Helper -----*/
    'sidebarLinks' => [
        [
            'name' => 'Dashboard',
            'icon' => 'bi bi-grid',
            'route' => 'admin.dashboard',
            'child' => []
        ],
        [
            'name' => 'Products',
            'icon' => 'bi bi-minecart-loaded',
            'route' => null,
            'child' => []
        ],
        [
            'name' => 'Shops',
            'icon' => 'bi bi-shop',
            'route' => null,
            'child' => []
        ],
        [
            'name' => 'Locations',
            'icon' => 'bi bi-geo-fill',
            'route' => 'admin.locations.index',
            'child' => []
        ],
    ]
];
