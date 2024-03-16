<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Deal extends Model
{
    public const TYPE_RENT = 'rent';
    public const TYPE_CREDIT = 'credit';

    public const KIND_WITH_PROXY = 'proxy';
    public const KIND_WITH_OWNER = 'owner';

    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function active(): HasOne
    {
        return $this->hasOne(Active::class, 'id', 'active_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'deal_id', 'id');
    }


}
