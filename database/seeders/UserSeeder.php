<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'phone' => '081234567890',
            'address' => 'MaiBoutique Office',
            'role' => 'admin'
        ]);
    }
}
