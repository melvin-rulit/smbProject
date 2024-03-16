<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserSubAccount extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'exchange', 'name', 'starting_capital_btc', 'starting_capital_usdt',
        'key', 'secret'];

    protected $appends = ['icon'];

    public function bots(): HasMany
    {
        return $this->hasMany(Bot::class, 'sub_account_id', 'id');
    }

    public function getIconAttribute()
    {
        return '/images/icons/'.$this->exchange.'.png';
    }
}
