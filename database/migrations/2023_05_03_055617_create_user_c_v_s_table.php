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
        Schema::create('user_c_v_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Integer('age');
            $table->string('phone');
            $table->string('email');
            $table->string('technology');
//            $table->enum('level',['Junior' , 'Mid' ,'Senior']);
//            $table->string('salary');
            $table->string('experience');
//            $table->string('document');
//            $table->string('references');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_c_v_s');
    }
};
