<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('customer_phone');

            $table->string('service_id');
            $table->string('categorie');
            $table->string('hourly')->nullable();

            $table->string('duration');
            $table->string('date');
            $table->string('start_time');
            $table->string('notes');
            $table->string('payments');

            $table->string('SPM')->nullable();


            $table->string('street');
            $table->string('house_number');
            $table->string('post_code');
            $table->string('city');
            $table->string('state')->nullable();

            $table->string('pickoff_addresses_id')->nullable();


            $table->string('total_charge')->nullable();
            $table->string('net_charge')->nullable();

            $table->string('employes_id')->nullable();


            $table->set('status', ['hold','pending','confirm','complete'])->default('pending');

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
        Schema::dropIfExists('service_requests');
    }
}
