<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('commenter_id')->nullable();
            $table->string('commenter_type')->nullable();
            $table->string("commentable_type");
            $table->string("commentable_id");
            $table->text('comment');
            $table->boolean('approved')->default(true);
            $table->unsignedBigInteger('child_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(["commenter_id", "commenter_type"]);
            $table->index(["commentable_type", "commentable_id"]);
            $table->foreign('child_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
