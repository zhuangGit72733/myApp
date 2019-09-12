<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=[];
    public function setCollectionAttribute($value){
        $this->attributes['collection'] = implode(',', $value);
    }
    public function getCollectionAttribute($value){
        return explode(',', $value);
    }
    public function setHaveAttribute($value){
        $this->attributes['have'] = implode(',', $value);
    }
    public function getHaveAttribute($value){
        return explode(',', $value);
    }
}
