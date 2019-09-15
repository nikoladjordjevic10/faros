<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $guarded = [];

  public function setNameAttribute($value)
  {

    $this->attributes['name'] = ucfirst($value);

  }

  public function chairs()
  {

    return $this->hasMany(Chair::class);

  }

}
