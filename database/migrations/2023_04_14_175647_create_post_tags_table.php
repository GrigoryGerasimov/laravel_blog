<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->index('tag_id', 'tag_post_idx');
            $table->index('post_id', 'post_tag_idx');
            $table->foreign('tag_id', 'tag_post_fk')->on('tags')->references('id');
            $table->foreign('post_id', 'post_tag_fk')->on('posts')->references('id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};
