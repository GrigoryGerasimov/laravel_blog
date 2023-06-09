<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable(false);
            $table->tinyText('author')->nullable(false);
            $table->string('image')->nullable();
            $table->longText('content')->nullable(false);
            $table->string('description')->nullable();
            $table->unsignedBigInteger('likes')->nullable();
            $table->tinyInteger('is_published')->nullable();
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
