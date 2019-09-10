<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model implements HasMedia
{
    protected $fillable = [
        'user_id',
        'shoes_id',
        'comment',
        'created_at',
        'updated_at',
    ];

    protected $table = 'comments';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function shoes()
    {
        return $this->belongsTo(Shoe::class);
    }
}
