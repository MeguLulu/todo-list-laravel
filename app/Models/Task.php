<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'title',
    'begin',
    'end'
  ];
    // Renvoie de la date pour le tri
    public function date() {
      return $this->begin;
    }
}
