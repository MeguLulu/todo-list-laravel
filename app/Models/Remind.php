<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Remind extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'title',
    'day'
  ];
  /**
  *
  * @var array
  */
  protected $dates = ['deleted_at'];

  // Renvoie la date pour le tri
  public function date() {
    return $this->day;
  }

}
