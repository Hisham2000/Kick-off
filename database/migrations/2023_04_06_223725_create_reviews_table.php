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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('comment')->nullable(true);
            $table->integer('rate')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')->on('clubs')->references('id')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reviews');
    }
};
