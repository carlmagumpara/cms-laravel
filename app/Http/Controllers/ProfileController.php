<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Image;

use Auth;

use Hash;

use Validator;

use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);

        return view('profile.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $auth = Auth::user();

        $user = User::findOrFail($id);

        if ($auth->id == $id) {
            return view('profile.edit',compact('user'));    
        } else {
            return view('errors.access_denied');
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
                'firstname' => 'required',
                'lastname' => 'required',
            ]);

        $user = Auth::user();
        
        $user->update($request->all());

        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update_avatar(Request $request) {

        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(500, 500)->save( public_path('uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            return back();
        }

    }

    public function change_password(Request $request){

      if(Auth::Check())
      {
        $request_data = $request->All();
        $validator = $this->admin_credential_rules($request_data);
        if($validator->fails())
        {
          return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }
        else
        {  
          $current_password = Auth::User()->password;           
          if(Hash::check($request_data['current-password'], $current_password))
          {           
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);;
            $obj_user->save(); 
            return redirect('/profile/'.$user_id.'/edit');
          }
          else
          {           
            $error = array('current-password' => 'Please enter correct current password');
            return response()->json(array('error' => $error), 400);   
          }
        }        
      }
      else
      {
        return redirect()->to('/');
      }  

    }

    public function admin_credential_rules(array $data)
    {
      $messages = [
        'current-password.required' => 'Please enter current password',
        'password.required' => 'Please enter password',
      ];

      $validator = Validator::make($data, [
        'current-password' => 'required',
        'password' => 'required|same:password',
        'password_confirmation' => 'required|same:password',     
      ], $messages);

      return $validator;
    }  


    public function UsersAvatar($id) {

        $users = User::find($id);

        $data = $users->avatar;

        return $data;
    
    }


    public function data($id){

        $user = User::find($id);

        return $user;

    }

    public function user_comments_activity($id){

        $comments = DB::table('comments')->select('comments.id','comments.post_id','posts.title','comments.created_at')->join('posts','posts.id','=','comments.post_id')->where('user_id',$id)->orderBy('created_at','DESC')->get();

        return $comments;

    }


}
