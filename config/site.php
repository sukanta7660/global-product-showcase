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
            'route' => 'admin.products.index',
            'child' => []
        ],
        [
            'name' => 'Shops',
            'icon' => 'bi bi-shop',
            'route' => 'admin.shops.index',
            'child' => []
        ],
        [
            'name' => 'Locations',
            'icon' => 'bi bi-geo-fill',
            'route' => 'admin.locations.index',
            'child' => []
        ],
    ],

    'AllowedMediaType'   => ['image', 'video', 'pdf'],
    'allowedImageRole'   => [
        'other',
        'shop_logo',
        'brand_logo',
        'shop_banner',
        'brand_banner',
        'product_images',
        'slider',
        'slide',
        'slide_small',
        'blog_banner'
    ],
];
