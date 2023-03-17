<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnonceView extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function annonce()
    {
        return $this->belongsTo(Announcement::class);
    }
}
