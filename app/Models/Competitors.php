<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competitors extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'votes',
        'url',
    ];

    public function Votelogs():HasMany{
        return $this->hasMany(Votelogs::class);
    }
}
