<?php
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // pay_month already exists in create_payments_table migration.
        // Keep this migration as a safe no-op to avoid duplicate column errors.
    }

    public function down(): void
    {
        // Intentionally no-op.
    }
};
