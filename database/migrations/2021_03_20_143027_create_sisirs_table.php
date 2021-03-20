<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSisirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisirs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('charge')->nullable();
            $table->integer('category_id')->unsigned()->nullable()->index();
            $table->string('employee_charge')->nullable();
            $table->boolean('hourly')->nullable();
            $table->string('basic_price')->nullable();
            $table->string('km_price')->nullable();
            $table->string('stop_over_price')->nullable();
            $table->string('waiting_price')->nullable();
            $table->string('helpers')->nullable();
            $table->string('details', 1000)->nullable();
            $table->string('SPM')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sisirs');
    }
}
