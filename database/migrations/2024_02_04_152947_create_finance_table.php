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
        Schema::create('finance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('sub_account_id')->nullable()->constrained('user_sub_accounts')->nullOnDelete();
            $table->dateTime('date');

            $table->decimal('profit_usd', 11, 4)->default(0)->index();
            $table->decimal('profit_percent', 6, 4)->nullable()->index();
            $table->decimal('deposit', 15, 8)->unsigned()->default(0);
            $table->decimal('payout', 15, 8)->unsigned()->default(0);
            $table->tinyInteger('profit_division_percent')->unsigned();

            $table->timestamps();
            $table->index(['date', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance');
    }
};
