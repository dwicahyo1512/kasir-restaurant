<?php

namespace App\View\Composer\Sidebar;


class SidebarContent
{

    public static function hasActiveChild($menus)
    {
        foreach ($menus as $menu) {
            if (request()->routeIs($menu['route']) || (isset($menu['menus']) && static::hasActiveChild($menu['menus']))) {
                return true;
            }
        }
        return false;
    }

    public static function dashboard()
    {
        return [
            [
                'title' => 'Dashboard',
                'permissions' => '',
                'menus' => [
                    [
                        'title' => 'Dashboard',
                        'route' => 'dashboard',
                        'permissions' => '',
                        'icon' => @svg('heroicon-o-home'),
                        'menus' => [],
                    ],
                ],
            ],
            [
                'title' => 'Controller',
                'permissions' => '',
                'menus' => [
                    [
                        'title' => 'Master',
                        'route' => null,
                        'icon' => @svg('heroicon-o-folder-open'),
                        'permissions' => '',
                        'menus' => [
                            [
                                'title' => 'Kategori',
                                'route' => 'kategori.index',
                                'permissions' => '',
                                'icon' => null,
                            ],
                            [
                                'title' => 'Menu',
                                'route' => 'menu.index',
                                'icon' => null,
                            ],
                            [
                                'title' => 'Discount',
                                'route' => 'discount.index',
                                'icon' => null,
                            ]
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kasir',
                'permissions' => '',
                'menus' => [
                    [
                        'title' => 'Kasir Pesanan',
                        'route' => 'kasir.index',
                        'icon' => @svg('heroicon-o-shopping-cart'),
                        'permissions' => '',
                        'menus' => [],
                    ],
                ],
            ],
            [
                'title' => 'Admin',
                'permissions' => '',
                'menus' => [
                    [
                        'title' => 'Users',
                        'route' => 'users.index',
                        'icon' => @svg('heroicon-o-users'),
                        'permissions' => '',
                        'menus' => [

                        ],
                    ]
                ],
            ]
        ];
    }
}
