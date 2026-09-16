<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timeline_entries', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // education | organization | internship | achievement
            $table->string('title');
            $table->string('institution');
            $table->text('description')->nullable();
            $table->string('period_start'); // e.g. "2024"
            $table->string('period_end')->nullable(); // e.g. "Present"
            $table->boolean('is_current')->default(false);
            $table->string('icon_emoji')->default('🎓');
            $table->string('badge_color')->default('blue'); // blue | purple | green | orange
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timeline_entries');
    }
};
