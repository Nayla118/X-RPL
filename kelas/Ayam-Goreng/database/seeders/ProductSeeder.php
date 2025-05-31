<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Product::insert([
        [
            'name' => 'Ayam Geprek Original',
            'description' => 'Ayam goreng yang di geprek dan disajikan dengan sambal original pedas.',
            'price' => 15000,
            'image' => 'ayam_geprek_original.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Ayam Geprek Keju',
            'description' => 'Ayam geprek dengan taburan keju leleh yang gurih.',
            'price' => 20000,
            'image' => 'ayam_geprek_keju.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Ayam Geprek Original',
            'description' => 'Ayam goreng tepung dengan sambal geprek khas.',
            'price' => 15000,
            'image' => 'geprek-original.jpg',
        ],
        [
            'name' => 'Ayam Geprek Keju Leleh',
            'description' => 'Ayam geprek dengan topping keju mozzarella.',
            'price' => 22000,
            'image' => 'geprek-keju.jpg',
        ],
        [
            'name' => 'Ayam Geprek Sambal Ijo',
            'description' => 'Ayam geprek dengan sambal ijo pedas segar.',
            'price' => 18000,
            'image' => 'geprek-sambal-ijo.jpg',
        ],
        [
            'name' => 'Ayam Geprek Level 5',
            'description' => 'Cocok buat pecinta pedas, level 5 sambal rawit.',
            'price' => 16000,
            'image' => 'geprek-level5.jpg',
        ],
        [
            'name' => 'Ayam Geprek Pete',
            'description' => 'Ayam geprek dengan sambal pete yang menggoda.',
            'price' => 20000,
            'image' => 'geprek-pete.jpg',
        ],
        [
            'name' => 'Ayam Geprek Telur Asin',
            'description' => 'Ayam crispy dengan saus telur asin creamy.',
            'price' => 23000,
            'image' => 'geprek-telur-asin.jpg',
        ],
        [
            'name' => 'Ayam Geprek Mie Goreng',
            'description' => 'Ayam geprek disajikan dengan mie goreng spesial.',
            'price' => 25000,
            'image' => 'geprek-mie.jpg',
        ],
        [
            'name' => 'Ayam Geprek Nasi Uduk',
            'description' => 'Ayam geprek disajikan dengan nasi uduk gurih.',
            'price' => 24000,
            'image' => 'geprek-nasi-uduk.jpg',
        ],
        
    ]);
}

}
