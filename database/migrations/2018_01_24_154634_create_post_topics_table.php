<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*文章和专题的关联表*/
        Schema::create('post_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->default(0)->comment('文章id,外键关联');
            $table->integer('topic_id')->default(0)->comment('专题id,外键关联');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_topics');
    }
}
