<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    protected $table = 'manufacturer';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function shoes()
    {
        return $this->hasMany(Shoe::class, 'manufacturer_id');
    }
}
