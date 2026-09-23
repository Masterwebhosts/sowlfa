<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cooperation_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->constrained('properties')
                ->cascadeOnDelete();

            $table->foreignId('requesting_office_id')
                ->constrained('offices')
                ->cascadeOnDelete();

            $table->foreignId('requesting_agent_id')
                ->nullable()
                ->constrained('agents')
                ->nullOnDelete();

            $table->string('status')->default('pending');

            $table->text('message')->nullable();

            $table->timestamps();

            $table->index(['property_id', 'status']);
            $table->index(['requesting_office_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cooperation_requests');
    }
};