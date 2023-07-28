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
        Schema::create('MY_ARTICLE_COMMENT', function (Blueprint $table) {

            $table->bigIncrements('article_comment_id');

            $table->string('article_commenter_id')->nullable();
            $table->string('article_commenter_type')->nullable();

            $table->string("article_commentable_type");
            $table->string("article_commentable_id");

            $table->text('article_comment');

            $table->unsignedBigInteger('article_comment_child_id')->nullable();
           
            $table->timestamps();
            $table->foreign('article_comment_child_id')->references('article_comment_id')
                ->on('MY_ARTICLE_COMMENT')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MY_ARTICLE_COMMENT');
    }
};
