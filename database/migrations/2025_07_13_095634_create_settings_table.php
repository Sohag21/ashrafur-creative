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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('phone');
            $table->string('public_email');
            $table->string('about');
            $table->string('institute');
            $table->string('degree');
            $table->string('photo')->nullable();
            $table->string('cover')->nullable();
            $table->string('resume')->nullable();
            $table->string('address');
            $table->json('interests');
            $table->json('awards');
            $table->json('links');
            $table->json('skills');
            $table->json('languages');
            $table->json('facts');
            $table->json('educations');
            $table->json('experiences');
            $table->json('designation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
