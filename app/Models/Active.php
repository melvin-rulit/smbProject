<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    protected $casts = [
        'document_date' => 'date'
    ];
    public function branch()
{
return $this->hasOne(Branch::class, 'id', 'branch_id');
}

public function investor()
{
    return $this->hasOne(User::class, 'id', 'investor_id');
}
}
