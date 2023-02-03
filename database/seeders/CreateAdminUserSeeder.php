<?php
namespace Database\Seeders;

use App\Enum\StatusEnum;
use App\Models\Delivery;
use App\Models\Pharmacy;
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
        'phone' => '01234567890',
        'password' => bcrypt('123123123'),
        // 'branch_id'=> [null],
//        'status'=>StatusEnum::getAppoved()
        ]);

         $pharmacy = Pharmacy::create([
        'name' => 'Pharmacy',
        'email' => 'pharmacy@eg.com',
        'phone' => '01234567890',
        'sec_phone' => '01234567891',
        'password' => bcrypt('123123123'),
//        'status'=>StatusEnum::getAppoved()
        ]);

         $pharmacy = Pharmacy::create([
        'name' => 'Pharmacy 2',
        'email' => 'pharmacy2@eg.com',
        'phone' => '01234567893',
        'sec_phone' => '01234567892',
        'password' => bcrypt('123123123'),
//        'status'=>StatusEnum::getAppoved()
        ]);

         $pharmacy = Pharmacy::create([
        'name' => 'Pharmacy 3',
        'email' => 'pharmacy3@eg.com',
        'phone' => '01234567895',
        'sec_phone' => '01234567895',
        'password' => bcrypt('123123123'),
//        'status'=>StatusEnum::getAppoved()
        ]);




        $role = Role::create(['name' => 'super']);
        $pharmacyRole = Role::create(['guard_name'=>'pharmacy','name' => 'pharmacy']);
//        $deliveryRole = Role::create(['guard_name'=>'delivery','name' => 'delivery']);

        $permissions = Permission::where('guard_name','web')->pluck('id','id');
        $pharmacyPermissions = Permission::where('guard_name','pharmacy')->pluck('id','id');
//        $deliveryPermissions = Permission::where('guard_name','delivery')->pluck('id','id');

        $role->syncPermissions($permissions);
        $pharmacyRole->syncPermissions($pharmacyPermissions);
//        $deliveryRole->syncPermissions($deliveryPermissions);

        $user->assignRole([$role->id]);
        $pharmacy->assignRole([$pharmacyRole->id]);
//        $delivery->assignRole([$deliveryRole->id]);


}
}
