<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // Person Information
            $table->string('name');
            $table->string('telephone_number');
            $table->string('e_mail');

            // Car Information
            $table->string('licence_plate', 6);
            $table->integer('mileage');
            $table->longText('equipment_and_accessories')->nullable();
            $table->longText('condition')->nullable();

            $table->string('exterior_1_url');
            $table->string('exterior_2_url')->nullable();
            $table->string('interior_1_url');
            $table->string('interior_2_url')->nullable();
            $table->string('service_book_url')->nullable();
            $table->string('summer_wheels_url')->nullable();
            $table->string('winter_wheels_url')->nullable();

            $table->boolean('opened')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_vehicles');
    }
}
