<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
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


         User::factory()->count(10)->create()->each(function ($user) use ($writer) {
            $user->assignRole($writer);
            Post::factory()->count(2)->create(['user_id' => $user->id]);
         });

        // User::factory()->count(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $superAdminPerson = User::create([
            'name' => 'Francine',
            'email' => 'Francine@example.com',
            'password' => bcrypt('password'),
        ]);

        $superAdmin= Role::create(['name' => 'superAdmin']);
        $canAccessSuperAdmin= Permission::create(['name' => 'access superAdmin']);
        $superAdmin->givePermissionTo($canAccessSuperAdmin);
        $superAdminPerson->assignRole($superAdmin);

        $admin= Role::create(['name' => 'admin']);
        $canAccessAdmin= Permission::create(['name' => 'access admin']);
        $admin->givePermissionTo($canAccessAdmin);
        $superAdmin->givePermissionTo($canAccessAdmin);

        $member= Role::create(['name' => 'member']);
        $canAccessMember= Permission::create(['name' => 'access member']);
        $member->givePermissionTo($canAccessMember);
        $admin->givePermissionTo($canAccessMember);
        $superAdmin->givePermissionTo($canAccessMember);

        Post::create([
            'title' => "Les chats n'aiment pas le poisson",
            'content' => 'Triste réalité',
            'user_id' => $superAdminPerson->id,
            'created_at' => '2023-05-05 00:00:00',
        ]);


    }
}
