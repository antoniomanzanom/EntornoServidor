<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'user_id', 'image_path', 'description',
    ];

        public function comments(){
            return $this->hasMany('App\Comment','images_id')->orderBy('id','desc');
        }
        public function user(){
            return $this->belongsTo('App\User','user_id');
        }
        public function likes(){
            return $this->hasMany('App\Like','images_id');
        }
}
