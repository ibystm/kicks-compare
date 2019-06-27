<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'shoes_id',
    ];

    protected $table = 'likes';

    public function users()
    {
       return $this->belongsTo(User::class);
    }
    public function shoes()
    {
        return $this->belongsTo(Shoe::class);
    }
}
