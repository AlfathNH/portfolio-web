<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('category'); // web | uiux | automation | ai-python
            $table->json('tech_stack');
            $table->json('highlights')->nullable();
            $table->string('github_repo')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('thumb_icon')->default('🚀');
            $table->string('thumb_gradient')->default('from-blue-600 to-blue-900');
            $table->boolean('featured')->default(false);
            $table->string('status')->default('completed'); // completed | in-progress | planned
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
