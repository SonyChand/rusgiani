<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppdsTable extends Migration
{
    public function up()
    {
        Schema::create('sppds', function (Blueprint $table) {
            $table->id();
            $table->string('letter_type');
            $table->string('letter_number');
            $table->string('commitment_making_officer');
            $table->string('business_trip_executor');
            $table->string('purpose_of_business_trip');
            $table->string('means_of_transportation_used');
            $table->string('departure_place');
            $table->string('destination');
            $table->string('length_of_business_trip');
            $table->date('departure_date');
            $table->date('date_must_return');
            $table->string('place_of_issuance_of_sppd');
            $table->date('date_of_issuance_of_sppd');
            $table->date('sppd_creation_date');
            $table->string('operator_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sppds');
    }
}
