<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dirigeant extends Model
{ public function clients(){
    return $this->hasMany(client::class);
}

 public function rdvs(){
    return $this->hasMany(rdv::class);
}

    protected $fillable = [
        'libelle'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
