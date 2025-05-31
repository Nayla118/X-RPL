<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            [
                'name' => 'Bakso Sapi',
                'description' => 'Bakso enak dengan daging sapi pilihan dan kuah kaldu yang gurih.',
                'price' => 50000,
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1559847844-5315695dadae'
            ],
            [
                'name' => 'Nasi Goreng Spesial',
                'description' => 'Nasi goreng dengan campuran seafood dan bumbu rahasia.',
                'price' => 45000,
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38'
            ],
            // Tambahkan item menu lainnya
        ];
    
    }
}
