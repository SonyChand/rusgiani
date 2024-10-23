<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendationsTable extends Migration
{
    public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('recommendation_type');
            $table->string('recommendation_number');
            $table->string('basis_of_recommendation');
            $table->string('recommendation_consideration');
            $table->text('recommended_data');
            $table->string('recommendation_purpose');
            $table->text('recommendation_closing');
            $table->date('recommendation_date');
            $table->string('signed_by');
            $table->string('operator_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendations');
    }
}
