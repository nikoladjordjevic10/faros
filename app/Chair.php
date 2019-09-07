<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{

  protected $guarded = [];
    
  public function category(){

    return $this->belongsTo(Category::class);

  }

  // public function getPriceAttribute($value){

  //   return number_format($value, 0, 0, '.') . ' din';

  // }

}
