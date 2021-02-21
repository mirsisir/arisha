<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickoffAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickoff_addresses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();


            $table->string('street');
            $table->string('house_number');
            $table->string('post_code')->nullable();
            $table->string('city');
            $table->string('notes')->nullable();
            $table->string('state')->nullable();


            $table->string('stop_over')->nullable();
            $table->string('waiting')->nullable();

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
        Schema::dropIfExists('pickoff_addresses');
    }
}
