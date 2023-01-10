<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        DB::table('users')->insert([
            'username' => 'Constanico',
            'email' => 'constanico@gmail.com',
            'password' => bcrypt('constanico'),
            'phone' => '08987654321',
            'address' => 'Indonesia',
            'role' => 'user'
        ]);

        Item::create([
            'name' => 'Blue T-Shirt',
            'image' => 'blue-t-shirt.jpg',
            'desc' => 'Blue T-Shirt Size : M',
            'price' => '150000',
            'stock' => '10',
        ]);

        Item::create([
            'name' => 'Green Bomber Jacket',
            'image' => 'green-bomber.jpg',
            'desc' => 'Green Bomber Jacket Size : L',
            'price' => '300000',
            'stock' => '8',
        ]);

        Item::create([
            'name' => 'Brown Short Pants',
            'image' => 'brown-short.jpg',
            'desc' => 'Brown Short Pants Size : S',
            'price' => '130000',
            'stock' => '6',
        ]);

        Item::create([
            'name' => 'Grey Hoodie',
            'image' => 'grey-hoodie.jpg',
            'desc' => 'Grey Hoodie Size : XL',
            'price' => '300000',
            'stock' => '8',
        ]);

        Item::create([
            'name' => 'Grey Oversize T-Shirt',
            'image' => 'grey-oversize-t-shirt.jpg',
            'desc' => 'Grey Oversize T-Shirt : M',
            'price' => '150000',
            'stock' => '10',
        ]);

        Item::create([
            'name' => 'Khaki Short Pants',
            'image' => 'khaki-short.jpg',
            'desc' => 'Khaki Short Pants Size : L',
            'price' => '130000',
            'stock' => '5',
        ]);

        Item::create([
            'name' => 'Pink Hoodie',
            'image' => 'pink-hoodie.jpg',
            'desc' => 'Pink Hoodie Size : M',
            'price' => '300000',
            'stock' => '8',
        ]);

        Item::create([
            'name' => 'White T-Shirt',
            'image' => 'white-t-shirt.jpg',
            'desc' => 'White T-Shirt Size : S',
            'price' => '150000',
            'stock' => '5',
        ]);

        Item::create([
            'name' => 'Blue Polo Striped Shirt',
            'image' => 'blue-polo-shirt.jpg',
            'desc' => 'Blue Polo Striped Shirt Size : L',
            'price' => '200000',
            'stock' => '8',
        ]);

        Item::create([
            'name' => 'Red Striped T-Shirt',
            'image' => 'red-striped-t-shirt.jpg',
            'desc' => 'Red Striped T-Shirt Size : XL',
            'price' => '150000',
            'stock' => '5',
        ]);
    }
}
