<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarapidanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narapidana', function (Blueprint $table) {
            $table->id();
            $table->boolean('kewarganegaraan')->default(0);
            $table->string('no_identitas', 30);
            $table->string('nama_lengkap', 100);
            $table->text('alamat');
            $table->date('tgl_lahir');
            $table->string('perkara', 100);
            $table->date('tgl_masuk');
            $table->integer('tahun')->nullable();
            $table->integer('bulan')->nullable();
            $table->integer('hari')->nullable();
            $table->boolean('lama_pidana')->nullable();
            $table->string('blok', 20);
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
        Schema::dropIfExists('narapidana');
    }
}
