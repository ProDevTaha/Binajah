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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('matier')->nullable();
            $table->string('niveaux')->nullable();
            $table->string('discription')->nullable();
            $table->string('created_by')->nullable();
            $table->string('statut')->nullable();
            $table->string('img_course')->nullable();
            $table->string('folder')->nullable();
            $table->string('title')->nullable();
            $table->integer('videos_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
