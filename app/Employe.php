<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
  public function societe(){
    return $this->belongsTo(Societe::class);
  }

  protected $fillable = [
    'prenom','nom','tel','email','societe_id'
  ];
}
