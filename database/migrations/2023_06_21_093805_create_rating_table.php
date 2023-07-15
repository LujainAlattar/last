<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->text('feedback');
            $table->string('name');
            $table->string('email');
            $table->integer('star_rating');
            $table->string('user_image')->nullable();
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes'); //for the class
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating');
    }
};
