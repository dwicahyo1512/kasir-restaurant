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
                'title' => 'Client',
                'permissions' => 'read client_users',
                'menus' => [
                    [
                        'title' => 'Client Pesan',
                        'route' => 'client_users.pesanan',
                        'permissions' => 'read client_users',
                        'icon' => @svg('heroicon-o-shopping-cart'),
                        'menus' => [],
                    ],
                ],
            ],
            [
                'title' => 'Controller',
                'permissions' => 'label controller',
                'menus' => [
                    [
                        'title' => 'Master',
                        'route' => null,
                        'icon' => @svg('heroicon-o-folder-open'),
                        'permissions' => 'label controller',
                        'menus' => [
                            [
                                'title' => 'Kategori',
                                'route' => 'kategori.index',
                                'permissions' => 'read kategori',
                                'icon' => null,
                            ],
                            [
                                'title' => 'Meja',
                                'route' => 'meja.index',
                                'permissions' => 'read meja',
                                'icon' => null,
                            ],
                            [
                                'title' => 'Menu',
                                'route' => 'menu.index',
                                'permissions' => 'read menu',
                                'icon' => null,
                            ],
                            [
                                'title' => 'Discount',
                                'route' => 'discount.index',
                                'permissions' => 'read discount',
                                'icon' => null,
                            ]
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kasir',
                'permissions' => 'label kasir',
                'menus' => [
                    [
                        'title' => 'Kasir Pesanan',
                        'route' => 'kasir.index',
                        'icon' => @svg('heroicon-o-shopping-cart'),
                        'permissions' => 'read kasir',
                        'menus' => [],
                    ],
                    [
                        'title' => 'Proses Pesanan',
                        'route' => 'proses.pesanan',
                        'icon' => @svg('heroicon-o-server-stack'),
                        'permissions' => 'read history',
                        'menus' => [],
                    ],
                    [
                        'title' => 'History Pesanan',
                        'route' => 'pesanan.index',
                        'icon' => @svg('heroicon-o-arrow-path'),
                        'permissions' => 'read kasir',
                        'menus' => [],
                    ],
                ],
            ],
            [
                'title' => 'laporan',
                'permissions' => 'read owner',
                'menus' => [
                    [
                        'title' => 'Laporan Pesanan',
                        'route' => 'laporan.pesanan',
                        'permissions' => 'read owner',
                        'icon' => @svg('heroicon-o-document-text'),
                        'menus' => [],
                    ],
                ],
            ],
            [
                'title' => 'Admin',
                'permissions' => 'label admin',
                'menus' => [
                    [
                        'title' => 'Users',
                        'route' => 'users.index',
                        'icon' => @svg('heroicon-o-users'),
                        'permissions' => 'read users',
                        'menus' => [

                        ],
                    ],
                    [
                        'title' => 'Setting',
                        'route' => 'settings.index',
                        'icon' => @svg('heroicon-o-wrench'),
                        'permissions' => 'update settings',
                        'menus' => [

                        ],
                    ],
                    [
                        'title' => 'Role',
                        'route' => 'roles.index',
                        'icon' => @svg('heroicon-o-identification'),
                        'permissions' => 'read roles',
                        'menus' => [

                        ],
                    ],
                    [
                        'title' => 'Permision',
                        'route' => 'permissions.index',
                        'icon' => @svg('heroicon-o-key'),
                        'permissions' => 'read permissions',
                        'menus' => [

                        ],
                    ]
                ],
            ]
        ];
    }
}
