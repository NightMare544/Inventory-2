<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $fillable = ['serial','product_id','quantity','branch_id'];

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }
}
