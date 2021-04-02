<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArishaInfoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arisha_info_translations', function (Blueprint $table) {
            $table->id();

            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedInteger('arisha_info_id');
            $table->unique(['arisha_info_id', 'locale']);
            $table->foreign('arisha_info_id')->references('id')->on('arisha_infos')->onDelete('cascade');


            $table->string('title')->nullable();
            $table->longText('details')->nullable();

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
        Schema::dropIfExists('arisha_info_translations');
    }
}
