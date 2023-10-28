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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('category')->nullable();
            $table->string('quantity')->nullable();
            $table->double('current_price')->nullable();
            $table->double('old_price')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('condition')->nullable();
            $table->longText('return_policy')->nullable();
            $table->enum('is_featured',['0','1'])->default('0');
            $table->enum('is_active',['0','1'])->default('0');

            $table->unsignedBigInteger('cat_id')->nullable();
            $table->integer('end_cat')->nullable();

            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
