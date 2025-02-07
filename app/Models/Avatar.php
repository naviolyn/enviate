<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'leaflet_reward', 'path'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_avatar');
    }

    public function styles()
    {
        return $this->hasMany(Style::class);
    }
}
