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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);
            $table->date("bookDate");
            $table->string("start_time");
            $table->string("end_time");
            
            $table->unsignedBigInteger("club_id");
            $table->foreign("club_id")->on("clubs")->references("id")
            ->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")->on("users")->references("id")
            ->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->on("users")->references("id")
            ->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('book');
    }
};
