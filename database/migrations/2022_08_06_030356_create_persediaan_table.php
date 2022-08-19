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
        Schema::create('persediaan', function (Blueprint $table) {
            $table->id();
            $table->char('id_rekening');
            $table->char('name');
            $table->char('satuan');
            $table->char('harga');
            $table->char('total_persediaan');
            $table->char('total_harga');
            $table->date('tanggal');
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
        Schema::dropIfExists('persediaan');
    }
};
