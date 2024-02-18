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
        Schema::table('header_page_images', function (Blueprint $table) {
            $table->unsignedBigInteger('page_image_category_id')->nullable()->after('id');
            $table->foreign('page_image_category_id')->references('id')->on('page_image_categories')->onDelete('set null');
            $table->boolean('is_active')->default(true)->after('file_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('header_page_images', function (Blueprint $table) {
            //
        });
    }
};