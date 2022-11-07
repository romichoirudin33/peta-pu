<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrNew(['id' => 1]);
        $user->name = 'admin';
        $user->email = 'admin@app.com';
        $user->password = Hash::make('admin');
        $user->email_verified_at = date('Y-m-d h:i:s');

        $user->save();
    }
}
