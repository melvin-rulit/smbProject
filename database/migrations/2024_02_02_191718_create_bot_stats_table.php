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
        Schema::create('bot_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('bot_id')->nullable()->constrained('bots')->cascadeOnDelete();
            $table->dateTime('date')->index();
            $table->json('data'); // все данные
            $table->decimal('pl_amount', 40, 8); // освоенная прибыль
            $table->decimal('dirty_pl_amount', 40, 8); // нечистая прибыль
            $table->decimal('pl_percent', 40, 8); // процент чистой прибыли
            $table->decimal('dirty_pl_percent', 40, 8); // процент нечистой прибыли
            $table->decimal('account_balance_qty', 40, 8); // остаток монет на аккаунте
            $table->decimal('exchange_balance_qty', 40, 8); // остаток монет на бирже
            $table->decimal('on_hold_amount', 40, 8); // обеспечение в деньгах usdt/btc
            $table->decimal('on_hold_qty', 40, 8); // обеспечение в кол-ве монет
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot_stats');
    }
};
