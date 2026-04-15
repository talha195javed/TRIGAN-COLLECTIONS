<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert AED currency if it doesn't exist
        if (!DB::table('currencies')->where('code', 'AED')->exists()) {
            DB::table('currencies')->insert([
                'code' => 'AED',
                'name' => 'UAE Dirham',
                'symbol' => 'AED',
                'exchange_rate' => 3.67, // Approximate exchange rate
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert LKR currency if it doesn't exist
        if (!DB::table('currencies')->where('code', 'LKR')->exists()) {
            DB::table('currencies')->insert([
                'code' => 'LKR',
                'name' => 'Sri Lankan Rupee',
                'symbol' => 'LKR',
                'exchange_rate' => 298.50, // Approximate exchange rate
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('currencies')->whereIn('code', ['AED', 'LKR'])->delete();
    }
};
