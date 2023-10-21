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
        Schema::create('generation_sets', function (Blueprint $table) {
            $table->id();
            $table->integer('bonus');
            $table->integer('c_wallet')->nullable();
            $table->integer('r_wallet')->nullable();
            $table->integer('s_wallet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generation_sets');
    }
};
