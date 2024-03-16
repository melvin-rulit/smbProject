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
        Schema::create('user_sub_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('exchange', ['binance', 'bybit'])->index();
            $table->string('name')->index();
            $table->decimal('starting_capital_btc', 13, 8)->unsigned();
            $table->decimal('starting_capital_usdt', 16, 4)->unsigned();
            $table->string('key');
            $table->string('secret');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_sub_accounts');
    }
};
