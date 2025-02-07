<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    protected $fillable = ['avatar_id', 'name', 'path', 'leaflet_cost'];

    public function avatar()
    {
        return $this->belongsTo(Avatar::class);
    }
}
