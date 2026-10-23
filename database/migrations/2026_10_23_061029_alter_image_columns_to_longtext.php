<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->longText('image')->change();
        });
        Schema::table('menu', function (Blueprint $table) {
            $table->longText('image')->change();
            $table->longText('model')->change();
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('image')->change();
        });
        Schema::table('menu', function (Blueprint $table) {
            $table->string('image')->change();
            $table->string('model')->change();
        });
    }
};