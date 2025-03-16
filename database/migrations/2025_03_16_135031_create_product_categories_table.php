<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->foreignId('parent_id')->nullable()->constrained('product_categories')->onDelete('cascade'); // ✅ Cho phép NULL
            $table->timestamps();
        });

        // Đảm bảo danh mục "Chưa phân loại" luôn tồn tại
        DB::table('product_categories')->insertOrIgnore([
            'id' => 1,
            'name' => 'Chưa phân loại',
            'slug' => 'chua-phan-loai',
            'image' => null,
            'status' => 1,
            'parent_id' => null, // ✅ Đặt NULL thay vì 0
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
