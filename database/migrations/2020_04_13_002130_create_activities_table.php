<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->enum('action', ['start', 'complete', 'join', 'assign', 'leave', 'remove', 'add', 'edit', 'delete', 'move']);
            $table->enum('type', ['project', 'task', 'note', 'checklist', 'file']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('object_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
