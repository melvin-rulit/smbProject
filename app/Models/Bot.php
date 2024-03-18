<?php

namespace App\Models;

use App\Enum\BotStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bot extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['user_id', 'sub_account_id', 'bot_name', 'server', 'enabled', 'status', 'symbol',
        'base_asset', 'quote_asset', 'settings'];

    protected $appends = ['status_ru', 'color'];

    /* описать настройки
     * grid_step Шаг сетки на покупку
     * */

    public function sub_account()
    {
        return $this->hasOne(UserSubAccount::class, 'id', 'sub_account_id');
    }

    public function getStatusRuAttribute()
    {
        return BotStatusEnum::NAMES[$this->status];
    }

    public function getColorAttribute()
    {
        return BotStatusEnum::COLORS[$this->status];
    }

    /*public function telemetry() : HasOne
    {
        return $this->hasOne(BotTelemetry::class, 'bot_name', 'name');
    }*/
}
