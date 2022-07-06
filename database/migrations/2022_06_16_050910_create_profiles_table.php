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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('work');
            $table->string('study');
            $table->string('college');
            $table->string('currentlocation');
            $table->string('permanentlocation');
            $table->date('join');
            $table->unsignedBigInteger('user_id2');
            $table->foreign('user_id2')->references('id')->on('users');
            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
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
        Schema::dropIfExists('profiles');
    }
};
