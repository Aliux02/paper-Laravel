<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('eil_nr')->nullable();
            $table->string('uzsakovas');
            $table->string('pavadinimas');
            $table->string('kryptis')->nullable();
            $table->double('ilgis');
            $table->double('plotis');
            $table->string('medziaga');
            $table->string('klijai')->nullable();
            $table->integer('eiles');
            $table->integer('spalva');
            $table->integer('kiekis');
            $table->integer('velenas');
            $table->date('pabaigimas');
            $table->integer('dezes');
            $table->text('pastabos')->nullable();
            $table->string('maketas')->nullable();
            $table->integer('status')->nullable();
            $table->foreignId('machine_id')->nullable()->references('id')->on('machines');
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
        Schema::dropIfExists('orders');
    }
}
