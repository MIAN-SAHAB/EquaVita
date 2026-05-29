<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('event');
            $table->string('auditable_type')->nullable();
            $table->unsignedBigInteger('auditable_id')->nullable();
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        // Enforce immutability at the database level
        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::unprepared("
                CREATE TRIGGER tr_audit_logs_no_update
                BEFORE UPDATE ON audit_logs
                FOR EACH ROW
                BEGIN
                    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Updates not allowed on audit_logs table';
                END
            ");

            DB::unprepared("
                CREATE TRIGGER tr_audit_logs_no_delete
                BEFORE DELETE ON audit_logs
                FOR EACH ROW
                BEGIN
                    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Deletes not allowed on audit_logs table';
                END
            ");
        } elseif ($driver === 'sqlite') {
            DB::unprepared("
                CREATE TRIGGER tr_audit_logs_no_update
                BEFORE UPDATE ON audit_logs
                BEGIN
                    SELECT RAISE(FAIL, 'Updates not allowed on audit_logs table');
                END
            ");

            DB::unprepared("
                CREATE TRIGGER tr_audit_logs_no_delete
                BEFORE DELETE ON audit_logs
                BEGIN
                    SELECT RAISE(FAIL, 'Deletes not allowed on audit_logs table');
                END
            ");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS tr_audit_logs_no_update");
        DB::unprepared("DROP TRIGGER IF EXISTS tr_audit_logs_no_delete");
        Schema::dropIfExists('audit_logs');
    }
};
