<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    protected $fillable = ['idUser','address','phone',];
    public function user(){
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
