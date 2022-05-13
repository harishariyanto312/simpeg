<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name'              => 'Administrator',
            'is_restricted'     => 'N',
            'is_removable'      => 'N'
        ]);

        Group::create([
            'name'              => 'User',
            'is_restricted'     => 'Y',
            'is_removable'      => 'N'
        ]);
    }
}
