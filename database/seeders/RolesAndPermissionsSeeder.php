<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'view_any_user',
            'view_user',
            'create_user',
            'update_user',
            'delete_user',
            'delete_any_user',
            'force_delete_user',
            'force_delete_any_user',
            'restore_user',
            'restore_any_user',
            'replicate_user',
            'reorder_user',

            'view_any_application',
            'view_application',
            'create_application',
            'update_application',
            'delete_application',
            'delete_any_application',
            'force_delete_application',
            'force_delete_any_application',
            'restore_application',
            'restore_any_application',
            'replicate_application',
            'reorder_application',

            'view_any_expense',
            'view_expense',
            'create_expense',
            'update_expense',
            'delete_expense',
            'delete_any_expense',
            'force_delete_expense',
            'force_delete_any_expense',
            'restore_expense',
            'restore_any_expense',
            'replicate_expense',
            'reorder_expense',

            'view_any_booking',
            'view_booking',
            'create_booking',
            'update_booking',
            'delete_booking',
            'delete_any_booking',
            'force_delete_booking',
            'force_delete_any_booking',
            'restore_booking',
            'restore_any_booking',
            'replicate_booking',
            'reorder_booking',

            'view_any_client::task',
            'view_client::task',
            'create_client::task',
            'update_client::task',
            'delete_client::task',
            'delete_any_client::task',
            'force_delete_client::task',
            'force_delete_any_client::task',
            'restore_client::task',
            'restore_any_client::task',
            'replicate_client::task',
            'reorder_client::task',

            'view_any_role',
            'view_role',
            'create_role',
            'update_role',
            'delete_role',
            'delete_any_role',
            'force_delete_role',
            'force_delete_any_role',
            'restore_role',
            'restore_any_role',
            'replicate_role',
            'reorder_role',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign created permissions

        $userRole = Role::create(['name' => 'User'])
            ->givePermissionTo([
                'view_any_application',
                'view_application',
                'create_application',
                'update_application',
                'delete_application',
                'view_any_expense',
                'view_expense',
                'create_expense',
                'update_expense',
                'delete_expense',
            ]);

        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());
    }
}
