<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'crystal_reward',
        'leaflets_reward',
        'category',
        'start_date',
        'end_date',
        'image',
    ];
}
