<?php

use App\Models\Office;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
        });

        Office::query()
            ->orderBy('id')
            ->get()
            ->each(function (Office $office) {
                $baseSlug = Str::slug($office->name);

                if ($baseSlug === '') {
                    $baseSlug = 'office';
                }

                $slug = $baseSlug;
                $counter = 2;

                while (
                    Office::where('slug', $slug)
                        ->where('id', '!=', $office->id)
                        ->exists()
                ) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                $office->update([
                    'slug' => $slug,
                ]);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};