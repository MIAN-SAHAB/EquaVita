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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('address');
            // Encrypted fields (AES-256-GCM via Laravel Crypt)
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();

            $table->text('lockbox_code')->nullable();
            $table->text('alarm_code')->nullable();
            $table->text('emergency_contacts')->nullable();

            $table->text('structural_features')->nullable();
            $table->text('utility_diagrams_url')->nullable();
            $table->text('environmental_notes')->nullable();
            $table->text('key_assignments')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
