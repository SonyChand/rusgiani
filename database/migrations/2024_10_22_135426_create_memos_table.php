<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemosTable extends Migration
{
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->string('to');
            $table->string('from');
            $table->string('copy')->nullable();
            $table->date('date');
            $table->string('number');
            $table->string('subject');
            $table->text('content');
            $table->text('closing');
            $table->string('signer');
            $table->string('operator_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('memos');
    }
}
