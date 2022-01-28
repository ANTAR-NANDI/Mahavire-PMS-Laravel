<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_credits', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->default('0');
            $table->integer('January')->default(0);
            $table->integer('February')->default(0);
            $table->integer('March')->default(0);
             $table->integer('April')->default(0);
            $table->integer('May')->default(0);
            $table->integer('June')->default(0);
            $table->integer('July')->default(0);
             $table->integer('August')->default(0);
            $table->integer('September')->default(0);
            $table->integer('October')->default(0);
            $table->integer('November')->default(0);
            $table->integer('December')->default(0);
            $table->integer('Year')->default(0);
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
        Schema::dropIfExists('debit_credits');
    }
}
