<?php

namespace Database\Seeders;

use App\Models\AppsDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apps = AppsDetail::firstOrNew(['id' => 1]);
        $apps->name = 'Peta PU';
        $apps->visi = 'visi';
        $apps->misi = 'misi';
        $apps->profil = 'profil';
        $apps->save();
    }
}
