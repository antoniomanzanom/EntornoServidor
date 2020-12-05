<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //Tabla que voy a estar modificando
    protected $table = 'likes';

    protected $fillable = [
        'user_id', 'images_id',
    ];
    //Relaciónde Muchos a Uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
}
    //Relaciónde Muchos a Uno
    public function image(){
        return $this->belongsTo('App\Image', 'images_id');
}

}