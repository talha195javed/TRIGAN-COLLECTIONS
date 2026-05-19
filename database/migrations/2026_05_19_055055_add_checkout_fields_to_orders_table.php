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
        if (!Schema::hasColumn('orders', 'shipping_address')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->string('shipping_address')->nullable()->after('guest_email');
            });
        }

        if (!Schema::hasColumn('orders', 'payment_method')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->string('payment_method')->nullable()->after('shipping_address');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('orders', 'payment_method')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('payment_method');
            });
        }

        if (Schema::hasColumn('orders', 'shipping_address')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('shipping_address');
            });
        }
    }
};
