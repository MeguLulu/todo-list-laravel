<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Renvoie de la date pour le tri
    public function date() {
      return $this->begin;
    }
}
