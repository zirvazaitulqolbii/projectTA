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
        Schema::create('penganjuan_pinjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('nominal');
            $table->date('tanggal_pengajuan');
            $table->string('keterangan');
            $table->enum('status',['belum_konfirmasi','konfirmasi'])->default('belum_konfirmasi');
            $table->timestamps();
        });

        DB::table('penganjuan_pinjamans')->insert([
            ['user_id' => '2',
            'nominal' => '1000000',
            'tanggal_pengajuan' => '2023-08-12',
            'keterangan' => 'pinjaman uang',
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
        Schema::dropIfExists('penganjuan_pinjamans');
    }
};
