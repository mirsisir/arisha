<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('primary_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->double('price');
            $table->double('total');
            $table->unsignedBigInteger('user_id');
            $table->foreign('primary_id')->references('id')->on('purchase_primaries')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product_infos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_details');
    }
}
