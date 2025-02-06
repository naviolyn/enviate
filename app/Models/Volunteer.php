<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Volunteer extends Model
{
    use HasFactory;

    protected $table = 'volunteers';  // Nama tabel
    protected $primaryKey = 'volunteer_id'; // Primary key yang sesuai dengan migration

    protected $fillable = [
        'name', 'description', 'crystal_reward', 'leaflets_reward',
        'category', 'start_date', 'end_date', 'image', 'created_by'
    ];

    /**
     * Relasi ke User (Volunteer dibuat oleh user tertentu)
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}