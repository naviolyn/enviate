<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $primaryKey = 'badge_id';
    protected $fillable = ['name','description', 'image_path', 'required_level'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_badges');
    }
}
