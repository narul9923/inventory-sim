<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->bigincrements('id')->unsigned();
            $table->biginteger('barang_id')->unsigned()->nullable();
            $table->biginteger('user_id')->unsigned()->nullable();
            $table->string('jumlah');
            $table->string('tipe');
            $table->biginteger('created_by')->unsigned()->nullable();
            $table->biginteger('updated_by')->unsigned()->nullable();
            $table->biginteger('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('barang_id')->references('id')->on('barang');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('riwayats');
    }
}
