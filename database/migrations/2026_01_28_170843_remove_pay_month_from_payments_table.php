<?php
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // pay_month is required by current application logic.
        // Keep this migration as a safe no-op.
    }

    public function down(): void
    {
        // Intentionally no-op.
    }
};
