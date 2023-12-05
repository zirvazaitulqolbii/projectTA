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
        Schema::create('cicilans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pinjaman_id');
            $table->integer('nominal');
            $table->date('tanggal_pembayaran');
            $table->double('bunga')->default(0.1);
            $table->integer('total')->nullable();
            $table->timestamps();
        });

        DB::table('cicilans')->insert([
            ['user_id' => '2',
            'pinjaman_id' => '1',
            'nominal' => '1000000',
            'tanggal_pembayaran' => '2023-08-12',
            'total' => '110000'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cicilans');
    }
};
