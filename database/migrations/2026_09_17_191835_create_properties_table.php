<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->foreignId('office_id')
                ->constrained('offices')
                ->cascadeOnDelete();

            $table->foreignId('agent_id')
                ->nullable()
                ->constrained('agents')
                ->nullOnDelete();

            $table->string('title');
            $table->text('description')->nullable();

            $table->string('property_type');
            $table->string('listing_type');

            $table->decimal('price', 15, 2);

            $table->string('currency', 3)->default('USD');

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->unsignedInteger('bedrooms')->nullable();
            $table->unsignedInteger('bathrooms')->nullable();
            $table->decimal('area', 12, 2)->nullable();

            $table->string('status')->default('available');

            $table->timestamps();

            $table->index(['office_id', 'status']);
            $table->index(['city', 'status']);
            $table->index(['property_type', 'listing_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};