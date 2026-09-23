<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->constrained('properties')
                ->restrictOnDelete();

            $table->foreignId('cooperation_request_id')
                ->nullable()
                ->constrained('cooperation_requests')
                ->nullOnDelete();

            $table->foreignId('listing_office_id')
                ->constrained('offices')
                ->restrictOnDelete();

            $table->foreignId('client_office_id')
                ->constrained('offices')
                ->restrictOnDelete();

            $table->decimal('deal_amount', 15, 2);
            $table->string('currency', 3)->default('USD');

            $table->decimal('commission_amount', 15, 2)->nullable();
            $table->decimal('listing_office_commission', 15, 2)->nullable();
            $table->decimal('client_office_commission', 15, 2)->nullable();

            $table->string('status')->default('pending');

            $table->date('closed_at')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index(['listing_office_id', 'status']);
            $table->index(['client_office_id', 'status']);
            $table->index(['property_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};