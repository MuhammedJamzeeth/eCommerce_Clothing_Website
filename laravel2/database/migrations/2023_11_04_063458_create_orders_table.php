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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_price', 10, 2)->nullable();
            $table->enum('shipping_status',['Pending','Completed'])->default('Pending');
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('email')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->enum('payment_status',['PAID','NOT PAID'])->default('NOT PAID');
            $table->string('method')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('pro_id');
            $table->string('qty');
            $table->string('pro_name');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
