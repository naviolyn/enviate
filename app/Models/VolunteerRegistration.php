<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerRegistration extends Model
{
    use HasFactory;

    protected $table = 'volunteer_registrations';
    protected $fillable = [
        'volunteer_id',
        'user_id',
        'name',
        'email',
        'phone',
        'reason'
    ];

    // Relasi ke tabel Volunteer
    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'volunteer_id', 'volunteer_id');
    }

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
