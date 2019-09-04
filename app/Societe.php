<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
  public function employes(){
    return $this->hasMany(Employe::class);
  }

  protected $fillable = [
    'nom','email','logo','siteweb'
  ];
}
