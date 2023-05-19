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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->integer("price");
            $table->string("name");
            $table->boolean("wc");
            $table->boolean("cafe");
            $table->date("creationDate");
            $table->string("address")->nullable();
            $table->text("notes")->nullable();
            $table->string("image");
            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")->on("users")->references("id")
            ->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("area_id");
            $table->foreign("area_id")->on("area")->references("id")
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
        Schema::dropIfExists('clubs');
    }
};
