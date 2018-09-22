<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class audiance extends Model
{
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);

    }

    protected $fillable = ['client_id', 'categorie_id','dateaudiance','daterenvoie','resumeaudiance'];
}
