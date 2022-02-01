<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legalities', function (Blueprint $table) {
            $table->id();
            $table->longText('return_policy');
            $table->longText('mission_and_vision');
            $table->longText('legal_information');
            $table->longText('careers');
            $table->longText('terms_and_condition');
            $table->longText('privacy_and_policy');
            $table->longText('travel_and_tours');
            $table->longText('easy_eservice');
            $table->longText('employee_aid');
            $table->longText('shipping');
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
        Schema::dropIfExists('legalities');
    }
}
