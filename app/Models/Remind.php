<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remind extends Model
{
  // Renvoie la date pour le tri
  public function date() {
    return $this->day;
  }

}
