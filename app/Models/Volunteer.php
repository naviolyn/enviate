<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // Pastikan import ini ada

class Volunteer extends Model
{
    use HasFactory;

    protected $table = 'volunteers';
    protected $primaryKey = 'volunteer_id'; // Sesuaikan dengan migration

    protected $fillable = [
        'name', 'description', 'crystal_reward', 'leaflets_reward', 
        'category', 'start_date', 'end_date', 'image', 'created_by'
    ];
}