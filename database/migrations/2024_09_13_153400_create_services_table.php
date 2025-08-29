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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('category_id')->default(0);
            $table->string('name', 100)->unique();
            $table->tinyInteger('parent')->default(0);
            $table->string('icon', 30)->nullable();
            $table->string('image')->nullable();
            $table->string('large_image')->nullable();
            $table->string('small_text', 150)->nullable();
            $table->mediumText('text')->nullable();
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
