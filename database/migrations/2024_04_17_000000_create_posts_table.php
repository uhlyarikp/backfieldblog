<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_category')->default('uncategorized');
            $table->string('author')->nullable(false);
            $table->string('post_title', 150)->unique();
            $table->text('post_content')->nullable(false);
            $table->timestamp('published_at')->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('author', 'author_idx');
            $table->index('post_category', 'category_idx');
            $table->unique('post_title', 'title_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
