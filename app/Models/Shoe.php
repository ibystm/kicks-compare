<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    protected $fillable = [
        'manufacturer_id',
        'name',
        'created_at',
        'updated_at',
        'image_url',
    ];

    protected $table = 'shoes';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'shoes_id');
    }
    public function manufacturer()
    {
        return $this->belongsTo(Manufacture::class);
    }

}
