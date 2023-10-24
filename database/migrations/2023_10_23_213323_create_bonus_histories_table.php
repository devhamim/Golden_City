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
        Schema::create('bonus_histories', function (Blueprint $table) {
            $table->id();
            $table->enum('bonus_type', ['daily', 'refferal', 'matching', 'generation']);
            $table->integer('user_id');
            $table->integer('sender_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->enum('position', ['left', 'right'])->nullable();
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonus_histories');
    }
};
