<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 












    {
        Schema::create('calculators', function (Blueprint $table) {
            $table->id();
             $table->string('Sku');
            $table->string('Title')->nullable();
             $table->integer('QuantityinStock')->nullable();
            $table->string('Vendor')->nullable();
            $table->string('Brand')->nullable();
            $table->string('SmartType')->nullable();
             $table->integer('TotalOrders')->nullable();
             $table->integer('UnitsSold')->nullable();
             $table->double('Payment',9,2)->default(0.00);
            $table->double('ItemPrice',9,2)->default(0.00);
            $table->double('Revenue',9,2)->nullable();
            $table->decimal('Commission',9,2)->default(0.00);
            $table->decimal('Tax',9,2)->nullable();
            $table->decimal('Discount',9,2)->default(0.00);
            $table->decimal('ShippingPrice',9,2)->default(0.00);
            $table->decimal('ShippingCost',9,2)->default(0.00);
            $table->decimal('ItemCost',9,2)->default(0.00);
            $table->decimal('Profit',9,2)->nullable();
            $table->decimal('MarginPercentage',9,2)->default(0.00);
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
        Schema::dropIfExists('calculators');
    }
}
