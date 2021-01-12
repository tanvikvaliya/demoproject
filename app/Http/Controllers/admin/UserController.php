<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\User;
use App\Models\admin\Role;
use App\Models\admin\Role_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $data= User::with(['roles'])->get()->toArray();
        return view('pages.admin.user.usermanage',compact('data','userId'));
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
        $request->validate(['username'=>'required','fname'=>'required',
        'lname'=>'required','email'=>'required','pass'=>'required|min:8|max:12|alphanum','cpass'=>'required|same:pass',
        'status'=>'required','roleid'=>'required']);

        $res=new User;
        $res->username=$request->input('username');
        $res->first_name=$request->input('fname');
        $res->last_name=$request->input('lname');
        $res->email=$request->input('email');
        $res->password=bcrypt($request->input('pass'));
        $res->status=$request->input('status');
        $res->save();
        $res->roles()->sync($request->input('roleid'));
        $request->session()->flash('success','User Added');
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
      
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User,$id)
    {
        $user= User::with(['roles'])
        ->where('users.id',$id)
        ->first()->toArray();
        $role_id=[];
        foreach($user['roles'] as $r_id)
         $role_id[]=$r_id['id'];
        $roleArr=role::all();
        return view('pages.admin.user.edituser',compact('user','roleArr','role_id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $request->validate(['username'=>'required','fname'=>'required',
        'lname'=>'required','email'=>'required','pass'=>'','cpass'=>'same:pass',
        'status'=>'required']);

        $res=User::find($request->id);
        $res->username=$request->input('username');
        $res->first_name=$request->input('fname');
        $res->last_name=$request->input('lname');
        $res->email=$request->input('email');
        if($request->input('pass'))
        {
            $res->password=bcrypt($request->input('pass'));
        }
        $res->status=$request->input('status');
        $res->save();
        $res->roles()->sync($request->input('roleid'));
        $request->session()->flash('success','User Updated');
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User,Request $request, $id)
    {
        $res=User::find($request->id);
        User::destroy(array('id',$id));
        $res->roles()->sync(array());
        $request->session()->flash('error','User Deleted');
        return redirect('users');
    }
}
