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
        $deliveryRoles = [
             'read',
             'update_status'
        ];
      $company = config('permissions.company');
      $vendor = config('permissions.vendors');
      $delivery = config('permissions.deliveries');

        foreach ($roles as $role) {
            foreach ($company as $model) {
                Permission::create(['guard_name' =>'web','name' => $role . '-' . $model]);

            }
            foreach ($vendor as $permission ) {
                Permission::create(['guard_name' =>'vendor','name' => $role . '-' . $permission]);

            }
           
        }
        foreach ($deliveryRoles as $div){

            foreach ($delivery as $permission ) {
                Permission::create(['guard_name' =>'delivery','name' => $div . '-' . $permission]);
    
            }
        }

    }
}
