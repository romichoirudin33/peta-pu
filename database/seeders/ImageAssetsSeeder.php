<?php

namespace Database\Seeders;

use App\Models\ImageAsset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = ['image-1.jpg', 'image-2.jpg', 'image-3.jpg'];
        $destinationPath = '/assets/images';
        foreach ($images as $image){
            ImageAsset::create([
                'name_file' => $destinationPath .'/'. $image,
            ]);
        }
    }
}
