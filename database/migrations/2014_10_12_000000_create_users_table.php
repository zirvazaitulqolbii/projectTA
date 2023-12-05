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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('no_hp');
            $table->string('alamat');
            $table->char('jenis_kelamin',1);
            $table->enum('role', ['admin', 'anggota', 'kepala_sekolah'])->default('anggota');
            $table->date('tanggal_masuk');
            $table->string('password');
            $table->string('password_confirmation');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['nama' => 'Zirva',
            'nip' => '123456789',
            'email' => 'Zirva@gmail.com',
            'avatar' => 'abc',
            'no_hp' => '082345678922',
            'alamat' => 'Pedalaman',
            'jenis_kelamin' => 'P',
            'role' => 'admin',
            'tanggal_masuk' => '2019-11-02',
            'password' => Hash::make('Zirva123'),
            'password_confirmation' => Hash::make('Zirva123'),
            ]
        ]);

        DB::table('users')->insert([
            ['nama' => 'Zaitul',
            'nip' => '2214356757',
            'email' => 'Zaitul@gmail.com',
            'avatar' => 'sdhsdh.jpg',
            'no_hp' => '2322321',
            'alamat' => 'Padang',
            'jenis_kelamin' => 'P',
            'role' => 'anggota',
            'tanggal_masuk' => '2019-11-02',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            ]
        ]);

        DB::table('users')->insert([
            ['nama' => 'Qolbi',
            'nip' => '1234567343',
            'email' => 'Qolbi@gmail.com',
            'avatar' => 'abc',
            'no_hp' => '082345678922',
            'alamat' => 'pariaman',
            'jenis_kelamin' => 'P',
            'role' => 'kepala_sekolah',
            'tanggal_masuk' => '2019-11-02',
            'password' => Hash::make('Qolbi123'),
            'password_confirmation' => Hash::make('Qolbi123'),
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
        Schema::dropIfExists('users');
    }
};
