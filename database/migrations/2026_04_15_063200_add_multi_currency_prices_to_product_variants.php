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
        Schema::table('product_variants', function (Blueprint $table) {
            $table->decimal('price_aed', 10, 2)->nullable()->after('price');
            $table->decimal('price_lkr', 10, 2)->nullable()->after('price_aed');
            $table->decimal('price_gbp', 10, 2)->nullable()->after('price_lkr');
            $table->decimal('discount_price_aed', 10, 2)->nullable()->after('discount_price');
            $table->decimal('discount_price_lkr', 10, 2)->nullable()->after('discount_price_aed');
            $table->decimal('discount_price_gbp', 10, 2)->nullable()->after('discount_price_lkr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn([
                'price_aed',
                'price_lkr', 
                'price_gbp',
                'discount_price_aed',
                'discount_price_lkr',
                'discount_price_gbp'
            ]);
        });
    }
};
