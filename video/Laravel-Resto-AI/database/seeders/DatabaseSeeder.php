<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\MenuItem;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Kategori
        $categories = [
            ['name' => 'Makanan', 'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947'],
            ['name' => 'Minuman', 'image' => 'https://images.unsplash.com/photo-1551029506-0807df4e2031'],
            ['name' => 'Gorengan', 'image' => 'https://images.unsplash.com/photo-1624726175512-19b9baf9fbd1'],
            ['name' => 'Buah-buahan', 'image' => 'https://images.unsplash.com/photo-1568702846914-96b305d2aaeb'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Menu Items
        $menuItems = [
            [
                'name' => 'Bakso Sapi',
                'description' => 'Bakso enak dengan daging sapi pilihan dan kuah kaldu yang gurih.',
                'price' => 50000,
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1559847844-5315695dadae'
            ],
            // Tambahkan item menu lainnya
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }
    }
}