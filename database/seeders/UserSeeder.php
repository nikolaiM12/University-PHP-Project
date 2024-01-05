<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $adminUser = User::create([
            'name' => 'Nikolai',
            'email' => 'nikolai@gmail.com',
            'email_verified_at' => now(),
            'password' => 'nA12344321'
        ]);

        $adminUser->assignRole($adminRole);
        
        $userRole = Role::where('name', 'user')->first();
        $userUser = User::create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'email_verified_at' => now(),
            'password' => 'jU12344321'
        ]);

        $userUser->assignRole($userRole);
    }
}
