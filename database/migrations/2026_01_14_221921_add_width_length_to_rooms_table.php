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
        Schema::table('rooms', function (Blueprint $table) {
            $table->decimal('width', 5, 2)->nullable()->after('price');
            $table->decimal('length', 5, 2)->nullable()->after('width');
            $table->decimal('size', 6, 2)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn([
                'width',
                'length'
            ]);

            $table->decimal('size', 5, 2)->nullable()->change();
        });
    }
};
