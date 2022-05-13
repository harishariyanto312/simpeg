<?php

return [
    'permissions' => [
        [
            'name' => 'System',
            'key' => 'system',
            'type' => 'group',
            'children' => [
                [
                    'name' => 'Groups',
                    'key' => 'system_groups',
                    'type' => 'subgroup',
                    'children' => [
                        [
                            'name' => 'Can view groups',
                            'key' => 'system_groups_index',
                            'type' => 'permission'
                        ],
                        [
                            'name' => 'Can create new group',
                            'key' => 'system_groups_create',
                            'type' => 'permission'
                        ],
                        [
                            'name' => 'Can edit groups',
                            'key' => 'system_groups_edit',
                            'type' => 'permission'
                        ],
                        [
                            'name' => 'Can delete groups',
                            'key' => 'system_groups_destroy',
                            'type' => 'permission'
                        ],
                        [
                            'name' => 'Can edit groups permissions',
                            'key' => 'system_groups_permissions',
                            'type' => 'permission'
                        ]
                    ]
                ],
                [
                    'name' => 'Users',
                    'key' => 'system_users',
                    'type' => 'subgroup',
                    'children' => [
                        [
                            'name' => 'Can view users',
                            'key' => 'system_users_index',
                            'type' => 'permission'
                        ],
                        [
                            'name' => 'Can create new user',
                            'key' => 'system_users_create',
                            'type' => 'permission'
                        ],
                        [
                            'name' => 'Can edit users',
                            'key' => 'system_users_edit',
                            'type' => 'permission'
                        ],
                        [
                            'name' => 'Can delete users',
                            'key' => 'system_users_delete',
                            'type' => 'permission'
                        ]
                    ]
                ]
            ]
        ]
    ]
];