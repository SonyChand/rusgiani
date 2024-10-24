<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingLettersTable extends Migration
{
    public function up()
    {
        Schema::create('outgoing_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter_type');
            $table->string('letter_number');
            $table->string('letter_nature');
            $table->string('letter_subject');
            $table->date('letter_date');
            $table->json('letter_destination');
            $table->string('to');
            $table->text('letter_body');
            $table->text('letter_closing');
            $table->string('sign_name');
            $table->string('sign_nip');
            $table->string('sign_position');
            $table->string('attachment')->nullable();
            $table->string('operator_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('outgoing_letters');
    }
}
