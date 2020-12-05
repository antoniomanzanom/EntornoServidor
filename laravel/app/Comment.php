<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Tabla que voy a estar modificando
    protected $table = 'comments';
    protected $fillable = [
        'user_id', 'images_id', 'content',
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
