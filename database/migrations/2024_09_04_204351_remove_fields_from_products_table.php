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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sku', 'cost', 'track_quantity', 'sell_out_of_stock']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->nullable();
            $table->decimal('cost', 8, 2)->nullable();
            $table->boolean('track_quantity')->default(true);
            $table->boolean('sell_out_of_stock')->default(false);
        });
    }
};
