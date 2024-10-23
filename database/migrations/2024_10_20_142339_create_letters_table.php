<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // // Create table for letter categories
        // Schema::create('letter_categories', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        // });

        // // Create table for letter subcategories
        // Schema::create('letter_subcategories', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('letter_category_id');
        //     $table->string('name');
        //     $table->timestamps();

        //     $table->foreign('letter_category_id')->references('id')->on('letter_categories')->onDelete('cascade');
        // });

        // // Create table for letter classifications
        // Schema::create('letter_classifications', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        // });

        // // Create table for letters
        // Schema::create('letters', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('letter_category_id');
        //     $table->unsignedBigInteger('letter_subcategory_id');
        //     $table->unsignedBigInteger('letter_classification_id');
        //     $table->string('number');
        //     $table->string('subject');
        //     $table->text('content');
        //     $table->date('date');
        //     $table->timestamps();

        //     $table->foreign('letter_category_id')->references('id')->on('letter_categories')->onDelete('cascade');
        //     $table->foreign('letter_subcategory_id')->references('id')->on('letter_subcategories')->onDelete('cascade');
        //     $table->foreign('letter_classification_id')->references('id')->on('letter_classifications')->onDelete('cascade');
        // });

        // // Create table for letter attachments
        // Schema::create('letter_attachments', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('letter_id');
        //     $table->string('name');
        //     $table->string('path');
        //     $table->timestamps();

        //     $table->foreign('letter_id')->references('id')->on('letters')->onDelete('cascade');
        // });

        // // Create table for letter recipients
        // Schema::create('letter_recipients', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('letter_id');
        //     $table->string('name');
        //     $table->string('email');
        //     $table->timestamps();

        //     $table->foreign('letter_id')->references('id')->on('letters')->onDelete('cascade');
        // });

        // // Create table for letter logs
        // Schema::create('letter_logs', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('letter_id');
        //     $table->unsignedBigInteger('user_id');
        //     $table->string('action');
        //     $table->timestamps();

        //     $table->foreign('letter_id')->references('id')->on('letters')->onDelete('cascade');
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_logs');
        Schema::dropIfExists('letter_recipients');
        Schema::dropIfExists('letter_attachments');
        Schema::dropIfExists('letters');
        Schema::dropIfExists('letter_classifications');
        Schema::dropIfExists('letter_subcategories');
        Schema::dropIfExists('letter_categories');
    }
};
