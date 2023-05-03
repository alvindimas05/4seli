<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id_comment', true);
            $table->string('id_user', 36)->index('id_user_2');
            $table->integer('id_post')->index('id_post');
            $table->text('comment');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->index(['id_user'], 'id_user');
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
};
