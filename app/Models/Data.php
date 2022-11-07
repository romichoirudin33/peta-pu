<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $guarded = [];

    public function image()
    {
        return $this->hasOne(DataImage::class, 'data_id');
    }
}
