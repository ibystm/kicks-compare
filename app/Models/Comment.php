<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Comment extends Model implements HasMedia
{
    use HasMediaTrait;

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
