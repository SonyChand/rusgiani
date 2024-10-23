<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryNotesTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_notes', function (Blueprint $table) {
            $table->id();
            $table->date('letter_date');
            $table->string('letter_number');
            $table->string('letter_purpose');
            $table->text('sent_manuscript_goods');
            $table->integer('quantity');
            $table->text('information')->nullable();
            $table->string('sender_data');
            $table->string('recipient');
            $table->string('operator_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_notes');
    }
}
