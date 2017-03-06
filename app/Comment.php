<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
  protected $fillable = ['comment','post_id'];

    public function comment_author() {

      return $this->belongsTo('App\User', 'user_id');
    
    }

    public function replies() {

        return $this->hasMany(Reply::class);

    }


}
