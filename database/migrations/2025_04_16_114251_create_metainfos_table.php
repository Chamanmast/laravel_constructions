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
        Schema::create('metainfos', function (Blueprint $table) {
            $table->id();

            // Polymorphic columns
            $table->unsignedBigInteger('metable_id');
            $table->string('metable_type');

            // Your meta fields
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // Optional: Add index for performance
            $table->index(['metable_id', 'metable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metainfos');
    }
};
