<?php
namespace Database\Seeders;

use App\Enum\SettingEnum;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::create([
            'key'=>[
                'en'=> __('site.setting_.'.'app_name',[],'en'),
                'ar'=> __('site.setting_.'.'app_name',[],'ar'),
            ],
            'value'=>'Dose'
            ]);





        foreach(SettingEnum::getList() as $key=>$value){
            Setting::create([
                'key'=>[
                    'en'=> __('site.setting_.'.$key,[],'en'),
                    'ar'=> __('site.setting_.'.$key,[],'ar'),
                ],
                'value'=>$value
             ]);
        }
    }
}
