<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proxi extends Model
{
    use HasFactory;

    protected $casts = [
        'valid_until' => 'datetime'
    ];

    public function delegate()
    {
        return $this->hasOne(User::class, 'id', 'delegate_id');
    }

    public function owner()
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }
}
