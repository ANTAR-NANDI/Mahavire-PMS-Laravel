<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->decimal('january',9,2)->nullable();
            $table->decimal('february',9,2)->nullable();
            $table->decimal('march',9,2)->nullable();
            $table->decimal('april',9,2)->nullable();
            $table->decimal('may',9,2)->nullable();
            $table->decimal('june',9,2)->nullable();
            $table->decimal('july',9,2)->nullable();
            $table->decimal('august',9,2)->nullable();
            $table->decimal('september',9,2)->nullable();
            $table->decimal('october',9,2)->nullable();
            $table->decimal('november',9,2)->nullable();
            $table->decimal('december',9,2)->nullable();
            $table->integer('year')->default(0);
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
        Schema::dropIfExists('sales_histories');
    }
}
