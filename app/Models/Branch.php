<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 */
class Branch extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getName(): string
    {
        return $this->name;
    }
}
