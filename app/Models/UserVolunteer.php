<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVolunteer extends Model
{
    use HasFactory;

    protected $table = 'user_volunteers';

    protected $fillable = [
        'user_volunteer_id',
        'user_id',
        'volunteer_id',
        'status',
        'confirmed_at',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
}
