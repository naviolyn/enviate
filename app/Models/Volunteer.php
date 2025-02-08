<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\VolunteerRegistration; // Pastikan model VolunteerRegistration diimpor

class Volunteer extends Model
{
    use HasFactory;

    protected $table = 'volunteers';  // Nama tabel
    protected $primaryKey = 'volunteer_id'; // Primary key sesuai migration

    // Jika primary key berupa integer:
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name', 'description', 'email', 'crystal_reward', 'leaflets_reward',
        'category', 'start_date', 'end_date', 'image', 'email', 'created_by'
    ];

    public function registrations()
    {
        return $this->hasMany(VolunteerRegistration::class, 'volunteer_id', 'volunteer_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    // Opsional: Override getForeignKey untuk memastikan nama foreign key yang tepat
    public function getForeignKey()
    {
        return 'volunteer_id';
    }
}
