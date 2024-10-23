<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-download',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-download',
            'incoming_letter-list',
            'incoming_letter-create',
            'incoming_letter-edit',
            'incoming_letter-delete',
            'incoming_letter-download',
            'outgoing_letter-list',
            'outgoing_letter-create',
            'outgoing_letter-edit',
            'outgoing_letter-delete',
            'outgoing_letter-download',
            'recomendation_letter-list',
            'recomendation_letter-create',
            'recomendation_letter-edit',
            'recomendation_letter-delete',
            'recomendation_letter-download',
            'official_task_file_letter-list',
            'official_task_file_letter-create',
            'official_task_file_letter-edit',
            'official_task_file_letter-delete',
            'official_task_file_letter-download',
            'command_letter-list',
            'command_letter-create',
            'command_letter-edit',
            'command_letter-delete',
            'command_letter-download',
            'spdd-list',
            'spdd-create',
            'spdd-edit',
            'spdd-delete',
            'spdd-download',
            'delivery_note-list',
            'delivery_note-create',
            'delivery_note-edit',
            'delivery_note-delete',
            'delivery_note-download',
            'memo-list',
            'memo-create',
            'memo-edit',
            'memo-delete',
            'memo-download',
            'disposition-list',
            'disposition-create',
            'disposition-edit',
            'disposition-delete',
            'disposition-download',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $user = User::create([
            'name' => 'Lord Daud',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12344321'),
            'email_verified_at' => now(),
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
