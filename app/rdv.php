<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rdv extends Model
{
    public function client(){
        return $this->belongsTo(client::class);
    }

    public function dirigeant(){
        return $this->belongsTo(dirigeant::class);
    }
    protected $fillable = ['client_id', 'horaire','dirigeant_id','daterdv','todaydate','pastdate','futuredate'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
