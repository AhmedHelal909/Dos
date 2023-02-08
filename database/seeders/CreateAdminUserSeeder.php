<?php
namespace Database\Seeders;

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
        'password' => bcrypt('12345'),
        // 'branch_id'=> [null],
//        'status'=>StatusEnum::getAppoved()
        ]);

         $pharmacy = Pharmacy::create([
        'name' => 'Pharmacy',
        'email' => 'pharmacy@eg.com',
        'phone' => '01234567890',
        'sec_phone' => '01234567891',
        'password' => bcrypt('12345'),
//        'status'=>StatusEnum::getAppoved()
        ]);

    $role = Role::create(['name' => 'super']);
    $vendorRole = Role::create(['guard_name'=>'pharmacy','name' => 'pharmacy']);


    $permissions = Permission::where('guard_name','web')->pluck('id','id');
    $vendorPermissions = Permission::where('guard_name','pharmacy')->pluck('id','id');


    $role->syncPermissions($permissions);
    $vendorRole->syncPermissions($vendorPermissions);


    $user->assignRole([$role->id]);
    $pharmacy->assignRole([$vendorRole->id]);


}
}
