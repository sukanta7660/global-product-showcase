<?php

return [
    'siteSortTitle' => 'Smart Shoppers',
    'siteTitle' => 'Smart Shoppers United LLC',
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
            'name' => 'Coupons',
            'icon' => 'bi bi-tag',
            'route' => 'admin.coupons.index',
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
        [
            'name' => 'Members',
            'icon' => 'bi bi-people-fill',
            'route' => null,
            'child' => [
                [
                    'name'  => 'Users',
                    'route' => 'admin.all.users'
                ],
                [
                    'name'  => 'Admins',
                    'route' => 'admin.all.admins'
                ],
            ]
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
