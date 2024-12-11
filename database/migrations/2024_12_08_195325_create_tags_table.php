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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Example: 'Science', 'Math'
            $table->timestamps();
        });

    Schema::create('taggables', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tag_id')->constrained()->onDelete('cascade'); // Reference tags
        $table->morphs('taggable'); // Adds `taggable_id` and `taggable_type`
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taggables');

        Schema::dropIfExists('tags');
    }
};
