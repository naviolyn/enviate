<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserView extends Model
{
    // Specify the name of the view (not a table)
    protected $table = 'user_view';

    // Disable timestamps if your view does not have them
    public $timestamps = false;

    // If the primary key is not `id`, specify it
    protected $primaryKey = 'id';

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
