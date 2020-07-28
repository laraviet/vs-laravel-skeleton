<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blog_post_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('content');
            $table->timestamps();

            $table->unique(['blog_post_id', 'locale']);
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_translations');
    }
}
