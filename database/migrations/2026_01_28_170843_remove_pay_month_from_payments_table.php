<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('table_name', function (Blueprint $table) {
            $table->dropColumn('pay_month');
        });
    }

    public function down(): void
    {
        Schema::table('table_name', function (Blueprint $table) {
            $table->string('pay_month')->nullable(); // Adjust type if needed
        });
    }
};
