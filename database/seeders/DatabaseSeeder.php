<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PermissionDatabaseSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ImageSeeder::class);

        Contact::create([
            'name' => 'Dose',
            'email' => 'test@test.com',
            'subject' => 'Test',
            'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.'
        ]);
    }
}
