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
        Schema::create('bonus_sets', function (Blueprint $table) {
            $table->id();
            $table->enum('bonus_type', ['daly', 'refferal', 'matching', 'generation']);
            $table->integer('bonus');
            $table->integer('c_wallet');
            $table->integer('r_wallet');
            $table->integer('s_wallet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonus_sets');
    }
};
