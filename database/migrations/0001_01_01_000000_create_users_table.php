<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->integer('poin')->default(0);
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('notelp')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('avatar')->nullable();
            $table->string('role')->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('verification_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('notelp')->nullable();
            $table->string('password')->nullable();
            $table->uuid('id_token')->nullable();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
            $table->unsignedTinyInteger('type')->default(0);
            // 0 = Register
            // 1 = Forgot Password
            // 2 = Forgot Username
            // 3 = Update
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('tb_penukaran_sampah', function (Blueprint $table) {
            $table-> id();
            $table->string('nama_operator')->nullable();
            $table->string('nama_pengguna')->nullable();
            $table->string('tipe_sampah')->nullable();
            $table->integer('berat')->nullable();
            $table->string('catatan')->nullable();
            $table->string('foto_bukti')->nullable();
            $table->integer('total_poin')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::create('tb_penukaran_poin', function (Blueprint $table) {
            $table->char('kode_unik', 5) -> primary();
            $table->string('username');
            $table->text('keterangan_penukaran');
            $table->integer('poin');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('tb_penukaran_poin');
        Schema::dropIfExists('tb_penukaran_sampah');
    }
};
