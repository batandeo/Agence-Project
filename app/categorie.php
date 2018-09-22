<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    public function audiances(){
        return $this->hasMany(audiance::class);
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
