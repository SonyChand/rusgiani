<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('incoming_items', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap transaksi masuk
            $table->date('in_date'); // Tanggal gas diterima di gudang
            $table->string('gas_type'); // Jenis gas, misalnya, Gas 3 Kg, 5.5 Kg, 12 Kg
            $table->integer('quantity_in'); // Jumlah unit gas yang diterima
            $table->decimal('unit_price', 10, 2); // Harga satuan per unit gas yang diterima
            $table->decimal('total_cost', 15, 2); // Total biaya transaksi masuk (jumlah masuk × harga per unit)
            $table->string('supplier'); // Nama atau identitas pemasok gas
            $table->string('batch_number')->nullable(); // Nomor batch atau kode pengiriman
            $table->string('warehouse_location')->nullable(); // Lokasi gudang atau penyimpanan gas
            $table->text('additional_notes')->nullable(); // Keterangan tambahan terkait pengiriman, seperti kondisi tabung atau tanggal kadaluarsa
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gas_in');
    }
}
