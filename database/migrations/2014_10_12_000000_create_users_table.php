<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('license_id')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->unique();

            $table->string('street')->nullable();
            $table->string('house_number')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();

            $table->string('state')->nullable();

            $table->string('employee_id')->nullable();

            $table->enum('role', ['customer','admin','employee'])->default('customer');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
