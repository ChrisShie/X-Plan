<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->text('description');
            $table->string('category');
            $table->integer('destination_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('all_day');
            $table->time('open_hour')->nullable();
            $table->time('close_hour')->nullable();
            $table->bigInteger('estimate_cost');
            $table->integer('rate_value')->nullable();
            $table->integer('rate_by')->nullable();
            $table->integer('scheduled_value')->nullable();
            $table->timestamps();
            
            $table->foreign('city_id')
                ->references('id')->on('cities');
            $table->foreign('destination_id')
                ->references('id')->on('destinations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
