<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->string('no_reg')->primary()->unique();
            $table->string('nama_pemilik', 155);
            $table->string('alamat')->nullable();
            $table->string('merk')->nullable();
            $table->year('tahun')->nullable();
            $table->integer('silinder')->nullable();
            $table->enum('warna',['Merah','Hitam','Biru','Abu-Abu'])->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
