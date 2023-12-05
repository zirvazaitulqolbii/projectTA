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
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pengajuan_id');
            $table->integer('nominal');
            $table->date('tanggal');

            $table->timestamps();
        });

        DB::table('pinjamans')->insert([
            ['user_id' => '2',
            'pengajuan_id'=> '1',
            'nominal' => '1000000',
            'tanggal' => '2023-08-12',
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
        Schema::dropIfExists('pinjamans');
    }
};
