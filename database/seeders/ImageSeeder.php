<?php
namespace Database\Seeders;

use App\Enum\ImageEnum;
use App\Enum\SettingEnum;
use App\Models\Image;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach(ImageEnum::getList() as $key=>$value){
            Image::create([
                'key'=>[
                    'en'=> __('site.images_.'.$key,[],'en'),
                    'ar'=> __('site.images_.'.$key,[],'ar'),
                ],
                'image'=>$value
             ]);
        }
    }
}
