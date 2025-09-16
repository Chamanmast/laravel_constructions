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
        Schema::create('brand_details', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->integer('brand_id');
            $table->string('location', 50)->nullable();
            $table->string('protocol', 50)->nullable();
            $table->string('eestablished_since', 50)->nullable();
            $table->string('worldwide', 55)->nullable();
            $table->string('controller', 55)->nullable();
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_details');
    }
};
