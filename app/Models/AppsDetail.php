<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppsDetail extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(AppsImage::class);
    }
}
