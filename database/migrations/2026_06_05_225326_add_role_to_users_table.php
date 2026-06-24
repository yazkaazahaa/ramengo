<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('admin');
        });
        if (!Schema::hasColumn('menus', 'kategori')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->string('kategori')->nullable();
            });
        }
    }

    public function down(): void
    {

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        if (Schema::hasColumn('menus', 'kategori')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->dropColumn('kategori');
            });
        }

    }
};