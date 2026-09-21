<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'country_manager',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'region_manager',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'area_manager',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
