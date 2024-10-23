<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandLettersTable extends Migration
{
    public function up()
    {
        Schema::create('command_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter_type');
            $table->string('letter_number');
            $table->string('letter_reference');
            $table->string('consideration');
            $table->string('the_one_giving_orders');
            $table->string('giving_orders_to');
            $table->text('to_implement');
            $table->text('letter_closing');
            $table->date('letter_creation_date');
            $table->string('signed_by');
            $table->string('attachment')->nullable();
            $table->string('operator_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('command_letters');
    }
}
