<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('wish_products', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wish_products');
    }
}
