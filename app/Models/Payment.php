<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public const TYPE_RENT = 'rent';
    public const TYPE_BUYOUT = 'buyout';

    public function deal()
    {
        return $this->hasOne(Deal::class, 'id', 'deal_id');
    }
}
