<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositionsTable extends Migration
{
    public function up()
    {
        Schema::create('dispositions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('letter_id');
            $table->string('from');
            $table->string('type'); // incoming or outgoing
            $table->string('disposition_to');
            $table->text('notes')->nullable();
            $table->date('disposition_date');
            $table->string('signed_by')->nullable();
            $table->timestamps();

            $table->foreign('letter_id')->references('id')->on('incoming_letters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispositions');
    }
}
