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
        Schema::create('tour_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->text('maps')->nullable();
            $table->enum('operating_days', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'])->nullable();
            $table->time('opening_hours')->nullable();
            $table->time('closing_hours')->nullable();
            $table->longText('images')->nullable();
            $table->enum('status', ['buka', 'tutup', 'sementara_tutup'])->default('buka');
            $table->timestamps();
        });
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('duration');
            $table->text('inclusions');
            $table->enum('status', ['aktif', 'nonaktif', 'habis'])->default('aktif');
            $table->enum('availability', ['terbatas', 'tidak_terbatas'])->default('terbatas');
            $table->enum('cancellation_policy', ['ya', 'tidak'])->default('tidak');
            $table->enum('refund_policy', ['ya', 'tidak'])->default('tidak');
            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('tour_destinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourist_destinations');
        Schema::dropIfExists('tourist_packages');
    }
};
