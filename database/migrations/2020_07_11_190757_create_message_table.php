<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('rooms', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedBigInteger('user_id')->nullable(); // from
        //     $table->unsignedBigInteger('to_user_id')->nullable(); // to

        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        //     $table->foreign('to_user_id')->references('id')->on('users')->onDelete('set null');
        // });

        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(); // from
            $table->unsignedBigInteger('to_user_id')->nullable(); // to
            $table->text('content');
            $table->dateTime('read_at')->nullable();
            $table->timestamp('created_at');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
