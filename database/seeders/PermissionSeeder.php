<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = config('permissions.permissions');

        foreach ($permissions as $group) {
            foreach ($group['children'] as $subgroup) {
                foreach ($subgroup['children'] as $permission) {
                    Permission::create(['key' => $permission['key']]);
                }
            }
        }
    }
}
