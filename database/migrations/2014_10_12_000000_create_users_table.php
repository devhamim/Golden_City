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
            $table->string('fName');
            $table->string('lName');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('number')->nullable();
            $table->string('password');
            $table->bigInteger('pin')->nullable();
            $table->string('profile')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('left_child_id')->nullable();
            $table->unsignedBigInteger('right_child_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('verified_status')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['admin', 'user']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
