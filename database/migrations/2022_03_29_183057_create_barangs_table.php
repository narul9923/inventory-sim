<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigincrements('id')->unsigned();
            $table->string('nama_barang');
            $table->biginteger('kategori_id')->unsigned()->nullable();
            $table->string('jumlah_barang');
            $table->biginteger('gudang_id')->unsigned()->nullable();
            $table->biginteger('created_by')->unsigned()->nullable();
            $table->biginteger('updated_by')->unsigned()->nullable();
            $table->biginteger('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('gudang_id')->references('id')->on('gudang');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('barangs');
    }
}
