<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('thumbnail');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->text('description');
            $table->string('category');
            $table->integer('city_id')->unsigned();
            $table->time('open_hour');
            $table->time('close_hour');
            $table->bigInteger('estimate_cost');
            $table->integer('rate_value');
            $table->integer('rate_by');
            $table->integer('scheduled_value');
            $table->timestamps();

            $table->foreign('city_id')
                ->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
}
