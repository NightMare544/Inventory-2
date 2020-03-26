<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable=['name','phone','store_id'];

    public function store()
    {
      return $this->belongsTo('app\store');
    }
  
}
