<?php
namespace Database\Seeders;

use App\Enum\StatusEnum;
use App\Models\Delivery;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

         $user = User::create([
        'name' => 'super',
        'email' => 'super@eg.com',
        'phone' => '01208645789',
        'password' => bcrypt('12345'),
        // 'branch_id'=> [null],
        'status'=>StatusEnum::getAppoved()
        ]);
     
         $vendor = Vendor::create([
        'name' => 'vendor',
        'email' => 'vendor@eg.com',
        'phone' => '01208645789',
        'sec_phone' => '01208645789',
        // 'long' => '50',
        // 'lat' => '40',
        // 'branch_id'=> [null],
        'password' => bcrypt('12345'),
        'status'=>StatusEnum::getAppoved()
        ]);
        $delivery = Delivery::create([
                'name' => 'super',
                'email' => 'delivery@eg.com',
                'password' => bcrypt('12345'),
                'status'=>StatusEnum::getAppoved(),
                // 'branch_id'=> ["1"],

                ]);

        $role = Role::create(['name' => 'owner']);
        $vendorRole = Role::create(['guard_name'=>'vendor','name' => 'vendor']);
        $deliveryRole = Role::create(['guard_name'=>'delivery','name' => 'delivery']);

        $permissions = Permission::where('guard_name','web')->pluck('id','id');
        $vendorPermissions = Permission::where('guard_name','vendor')->pluck('id','id');
        $deliveryPermissions = Permission::where('guard_name','delivery')->pluck('id','id');

        $role->syncPermissions($permissions);
        $vendorRole->syncPermissions($vendorPermissions);
        $deliveryRole->syncPermissions($deliveryPermissions);

        $user->assignRole([$role->id]);
        $vendor->assignRole([$vendorRole->id]);
        $delivery->assignRole([$deliveryRole->id]);


}
}
