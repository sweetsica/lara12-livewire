<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['id' => 2, 'name' => 'Tài khoản', 'parent_id' => null],
            ['id' => 3, 'name' => 'Media - Ảnh', 'parent_id' => null],
            ['id' => 4, 'name' => 'Media - Video', 'parent_id' => null],
            ['id' => 5, 'name' => 'Văn bản - Docx', 'parent_id' => null],
            ['id' => 6, 'name' => 'Văn bản - Pdf', 'parent_id' => null],
        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate(['id' => $category['id']], $category);
        }
    }
}


