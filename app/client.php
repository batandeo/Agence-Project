<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class client extends Model
{
    public function dirigeant(){
        return $this->belongsTo(dirigeant::class);
    }
    public function rdvs() {
        return $this->hasMany(rdv::class);
    }

    public function audiances(){
        return $this->hasMany(audiance::class);
    }

    protected $fillable = [
        'nom','prenom', 'mail', 'sexe','contact','dirigeant_id','datecreation'
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
