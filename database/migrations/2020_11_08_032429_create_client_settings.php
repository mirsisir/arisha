<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->unique();
            $table->string('website')->nullable();
            $table->string('phone_no')->unique();
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('contact_person');
            $table->string('contact_mobile');
            $table->double('bill_amount');
            $table->double('vat_amount');
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
        Schema::dropIfExists('client_settings');
    }
}
