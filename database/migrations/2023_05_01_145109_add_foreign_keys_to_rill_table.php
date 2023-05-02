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
        Schema::table('rill', function (Blueprint $table) {
            $table->foreign(['id_post'], 'rill_ibfk_1')->references(['id_post'])->on('posts')->onUpdate('CASCADE');
            $table->foreign(['id_user'], 'rill_ibfk_2')->references(['id_user'])->on('users')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rill', function (Blueprint $table) {
            $table->dropForeign('rill_ibfk_1');
            $table->dropForeign('rill_ibfk_2');
        });
    }
};
