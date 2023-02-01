<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionDatabaseSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
    public function run()
    {

        $roles = [
            'create',
            'read',
            'update',
            'delete',
        ];

      $super = config('permissions.super');
      $pharmacy = config('permissions.pharmacy');
//      $delivery = config('permissions.deliveries');

        foreach ($roles as $role) {
            foreach ($super as $model) {
                Permission::create(['guard_name' =>'web','name' => $role . '-' . $model]);
            }
            foreach ($pharmacy as $permission ) {
                Permission::create(['guard_name' =>'pharmacy','name' => $role . '-' . $permission]);
            }

        }

    }
}
