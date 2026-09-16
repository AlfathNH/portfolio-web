<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // frontend | backend | database | design | tools
            $table->string('level')->default('intermediate'); // beginner | intermediate | advanced
            $table->integer('level_percent')->default(60); // 0-100 for progress bar
            $table->string('icon_class')->nullable(); // devicon class
            $table->string('icon_url')->nullable();   // external URL
            $table->string('color')->nullable();       // hex for custom icon bg
            $table->integer('sort_order')->default(0);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
