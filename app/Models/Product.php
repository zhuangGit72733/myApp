<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function type() {
        return $this->belongsTo(Type::class);
    }
    public function recommend() {
        return $this->belongsTo(Recommend::class);
    }
}
