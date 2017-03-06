<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = ['reply','post_id','comment_id'];
    
    public function comment() {

      return $this->belongsTo(Comment::class);
    
    }

    public function reply_author() {

      return $this->belongsTo('App\User', 'user_id');
    
    }

    public function user() {

      return $this->belongsTo(User::class);
    
    }
}
