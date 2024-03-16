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
        Schema::create('trading_pairs', function (Blueprint $table) {
            $table->id();
            $table->boolean('enabled')->default(1)->index();
            $table->boolean('trading')->index();
            $table->enum('exchange', ['binance', 'bybit'])->index();
            $table->string('symbol', 15)->index();
            $table->string('base_asset', 10)->index();
            $table->enum('quote_asset', ['USDT', 'BTC'])->index();
            $table->tinyInteger('base_asset_precision'); // точность базового актива
            $table->tinyInteger('quote_asset_precision'); // точность второго актива
            $table->decimal('min_qty', 22, 13); // LOT_SIZE мин. объём (min_lot_size)
            $table->decimal('step_size', 17, 13); // LOT_SIZE шаг цены (grid_size_step)
            $table->decimal('market_min_qty', 22, 13); // MARKET_LOT_SIZE мин. объём на рынке
            $table->decimal('market_step_size', 17, 13); // MARKET_LOT_SIZE шаг цены на рынке
            $table->decimal('min_price', 24, 13)->unsigned(); // MIN_NOTIONAL мин. сумма
            $table->decimal('step_price', 16, 13)->unsigned();  // шаг цены
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trading_pairs');
    }
};
