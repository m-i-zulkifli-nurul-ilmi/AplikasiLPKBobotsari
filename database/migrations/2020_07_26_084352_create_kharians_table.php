<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kharians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal');
            $table->text('koderekening');
            $table->text('namapegawai');
            $table->text('uraian');
            $table->bigInteger('jumlahanggaran');
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
        Schema::dropIfExists('kharians');
    }
}
