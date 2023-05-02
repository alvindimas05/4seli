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
        Schema::table('fek', function (Blueprint $table) {
            $table->foreign(['id_post'], 'fek_ibfk_1')->references(['id_post'])->on('posts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_user'], 'fek_ibfk_2')->references(['id_user'])->on('users')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fek', function (Blueprint $table) {
            $table->dropForeign('fek_ibfk_1');
            $table->dropForeign('fek_ibfk_2');
        });
    }
};
