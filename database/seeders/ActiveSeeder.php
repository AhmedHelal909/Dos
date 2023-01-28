<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\Active;

class ActiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Active::factory()->count(2)->create();
    }
}
