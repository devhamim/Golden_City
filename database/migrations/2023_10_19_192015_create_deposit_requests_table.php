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
        Schema::create('deposit_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('country');
            $table->string('wallet_type');
            $table->string('email');
            $table->bigInteger('amount');
            $table->enum('status', ['pending', 'confirm', 'cancel']);
            $table->string('transaction_number');
            $table->longText('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit_requests');
    }
};
