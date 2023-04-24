<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $writer= Role::create(['name' => 'writer']);
        $canWriteAnArticle= Permission::create(['name' => 'access writer']);
        $writer->givePermissionTo($canWriteAnArticle);


        User::factory(10)->create()->each(function ($user) {

             $user->assignRole('writer');
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $superAdmin = User::create([
            'name' => 'francine',
            'email' => 'francine@yahoo.fr',
            'password' => bcrypt('password'),
        ]);

        $admin= Role::create(['name' => 'admin']);
        $canAccessAdmin= Permission::create(['name' => 'access admin']);
        $admin->givePermissionTo($canAccessAdmin);

        $superAdmin->assignRole($admin);




    }
}
