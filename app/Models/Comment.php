<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Comment extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
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
