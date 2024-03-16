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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->index();
            $table->string('login')->unique();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->integer('starting_capital')->default(0)->unsigned();
            $table->tinyInteger('profit_division_percent')->nullable()->unsigned();
            $table->tinyInteger('is_admin')->default(0)->index();
            $table->tinyInteger('super_admin')->default(0)->index();
            $table->foreignId('admin_owner_id')->nullable()->constrained('users')->nullOnDelete();
            $table->smallInteger('max_bot_count')->unsigned()->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
