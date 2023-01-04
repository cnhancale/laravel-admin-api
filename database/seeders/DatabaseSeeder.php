<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create(['name' => 'Admin']);
        Role::factory()->create(['name' => 'Editor']);
        Role::factory()->create(['name' => 'Viewer']);

        User::factory(20)->create();

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'admin',
            'password' => Hash::make('password'),
            'email' => 'admin@admin.com',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'first_name' => 'Editor',
            'last_name' => 'editor',
            'password' => Hash::make('password'),
            'email' => 'editor@editor.com',
            'role_id' => 2,
        ]);

        User::factory()->create([
            'first_name' => 'Viewer',
            'last_name' => 'viewer',
            'password' => Hash::make('password'),
            'email' => 'viewer@viewer.com',
            'role_id' => 3,
        ]);
    }
}
