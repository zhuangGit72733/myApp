<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
