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
        Schema::create('MY-USER', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('login_password_hash', 255)->nullable();
            $table->string('login_password_salt', 32);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_datetime')->nullable();
            $table->dateTime('user_creation_datetime')->default(now());
            $table->string('user_acct_status', 20)->default("Active");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MY-USER');
    }
};
