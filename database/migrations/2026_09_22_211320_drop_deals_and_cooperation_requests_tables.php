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
        // حذف deals أولًا لأنها تعتمد على cooperation_requests
        Schema::dropIfExists('deals');

        // ثم حذف cooperation_requests
        Schema::dropIfExists('cooperation_requests');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // لا نعيد إنشاء الجداول المحذوفة هنا.
    }
};