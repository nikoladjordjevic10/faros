<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
  protected $guarded = [];

  public function chair(){

    return $this->belongsTo(Chair::class);

  }

  public function table(){

    return $this->belongsTo(Table::class);

  }

}
