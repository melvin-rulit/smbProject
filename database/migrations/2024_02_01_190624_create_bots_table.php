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
        Schema::create('bots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('sub_account_id')->nullable()->constrained('user_sub_accounts')->nullOnDelete();
            $table->string('bot_name')->index();
            $table->tinyInteger('server')->index();
            $table->boolean('enabled')->index();
            $table->enum('status', ['not_started', 'running', 'stopped', 'cleared'])->index(); //
            $table->string('symbol')->nullable()->index();
            $table->string('base_asset')->nullable()->index();
            $table->string('quote_asset')->nullable()->index();
            $table->json('settings')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bots');
    }
};
