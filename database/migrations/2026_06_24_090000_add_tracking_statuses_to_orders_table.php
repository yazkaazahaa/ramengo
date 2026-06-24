<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('status_pesanan')
                ->default('pending')
                ->after('status');

            $table->string('status_pembayaran')
                ->default('belum_lunas')
                ->after('status_pesanan');
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'status_pesanan',
                'status_pembayaran',
            ]);
        });
    }
};
