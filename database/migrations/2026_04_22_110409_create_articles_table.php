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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('featured_image', 255)->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id', 'fk_category')
                  ->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
