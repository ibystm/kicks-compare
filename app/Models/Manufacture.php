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
        // hasManyの場合、外部キーを自身のモデル名のスネークケースに_idを加えたものを自動的に設定する。
        return $this->hasMany(Shoe::class, 'manufacturer_id');
    }
}
