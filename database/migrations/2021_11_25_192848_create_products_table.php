<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('title');
            $table->decimal('cost',5,2);
            $table->decimal('shipping',5,2);
            $table->decimal('commision',5,2);
            $table->decimal('profit',5,2);
            $table->decimal('item_price',5,2)->default(0.00);
            $table->decimal('min_price',5,2)->default(0.00);
            $table->decimal('max_price',5,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
