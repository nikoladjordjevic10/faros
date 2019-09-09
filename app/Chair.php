<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{

  protected $guarded = [];
    
  public function category(){

    return $this->belongsTo(Category::class);

  }

  public function dimensions(){

    return $this->attributes['width'] . 'cm / ' . $this->attributes['height'] . 'cm / ' . $this->attributes['depth'] . 'cm';

  }

  public function formatPrice(){

    return number_format($this->attributes['price'], 0, 0, '.') . ' din';

  }

}
