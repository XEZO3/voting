<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Votelogs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'fingerprint',
        'competitors_id'
    ];

    public function Competitors():BelongsTo{
        return $this->belongsTo(Competitors::class);
    }
}
