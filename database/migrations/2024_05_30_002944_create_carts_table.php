<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products');
            $table->string('colour');
            $table->integer('quantity');
            $table->integer('chest_size');
            $table->integer('arm_length');
            $table->integer('neck_size');
            $table->integer('waist_size');
            $table->string('custom_logo')->nullable();
            $table->longText('further_info')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};