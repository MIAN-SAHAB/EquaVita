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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->foreignId('inspector_id')->constrained('users');
            $table->foreignId('service_tier_id')->constrained();

            $table->timestamp('check_in_at')->nullable();
            $table->text('check_in_latitude')->nullable();
            $table->text('check_in_longitude')->nullable();

            $table->timestamp('completed_at')->nullable();
            $table->text('completed_latitude')->nullable();
            $table->text('completed_longitude')->nullable();

            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'approved', 'invoiced'])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
