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
        Schema::create('MY_ARTICLE', function (Blueprint $table) {
            $table->id('article_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 50);
            $table->longText('content');
            $table->string('category', 20);
            $table->dateTime('article_creation_datetime');
            $table->dateTime('article_update_datetime')->nullable();
            $table->dateTime('article_delete_datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DH_ARTICLE');
    }
};
