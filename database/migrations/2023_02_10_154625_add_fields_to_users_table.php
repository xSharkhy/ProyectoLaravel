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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('id');
            $table->date('birthday')->nullable();
            $table->enum('rol', ['member', 'admin'])->default('member')->after('password');
            $table->text('twitter')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitch')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('birthday');
            $table->dropColumn('rol');
            $table->dropColumn('twitter');
            $table->dropColumn('instagram');
            $table->dropColumn('twitch');
        });
    }
};
