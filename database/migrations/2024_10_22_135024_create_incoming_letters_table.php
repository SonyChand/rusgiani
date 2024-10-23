<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingLettersTable extends Migration
{
    public function up()
    {
        Schema::create('incoming_letters', function (Blueprint $table) {
            $table->id();
            $table->json('source_letter');
            $table->json('addressed_to');
            $table->string('letter_number');
            $table->date('letter_date');
            $table->string('subject');
            $table->string('attachment')->nullable();
            $table->json('forwarded_disposition')->nullable();
            $table->string('file_path')->nullable();
            $table->string('operator_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incoming_letters');
    }
}
