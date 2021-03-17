<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('charge')->nullable();
            $table->string('category')->nullable();

            $table->json('employee')->nullable();
            $table->string('employee_charge')->nullable();

            $table->string('hourly')->nullable();

            $table->string('basic_price')->nullable();
            $table->string('km_price')->nullable();
            $table->string('stop_over_price')->nullable();
            $table->string('waiting_price')->nullable();
            $table->string('helpers')->nullable();

            $table->longText('details')->nullable();

            $table->string('SPM')->nullable();





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
        Schema::dropIfExists('services');
    }
}
