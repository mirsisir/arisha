<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();


            $table->string('street')->nullable();
            $table->string('house_number')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();

            $table->string('hrb')->nullable();
            $table->string('ust')->nullable();

            $table->string('state')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

//2021_01_28_125811_create_general_settings_table.php

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
