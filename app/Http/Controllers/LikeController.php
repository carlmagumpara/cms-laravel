<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;

use App\Comment;

use Auth;

use App\User;

use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{

    public function Like(Request $request){

        $user = Auth::user();

        $like_data = $user->likes()->create($request->all());

        $like = array('id' => $like_data->id, 
                'post_id' => $like_data->post_id,
                'user_id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'created_at' => $like_data->created_at,
                'updated_at' => $like_data->updated_at
            );

        return $like;

    }
    public function UnLike($id){

        $user = Auth::user();

        $like = $user->likes()->find($id);

        $like->delete();

        return "unliked";

    }

    public function Likes($id) {

        $likes = DB::table('likes')->select('likes.id','likes.post_id','likes.user_id','users.firstname','users.lastname','likes.created_at','likes.updated_at')->join('users','users.id','=','likes.user_id')->where('post_id',$id)->get();
        
        return $likes;
    
    }

}
