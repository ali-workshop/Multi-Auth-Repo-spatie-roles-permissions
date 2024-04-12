<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::get();
        $users=User::get();
       return view('user.index',[
        'users'=>$users,
            'roles'=>$roles    
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $roles=Role::get();
            
            if(empty($roles)){
                return  view('user.create',['message'=>'thee is no roles to assign to user']);


            }
        return view('user.create',['roles'=>$roles]);


    }
    /**
     * Store a newly created resource in storage.
     */ 
    public function store(Request $request)
    {
        $user=$request->validate([
            'name'=>['required'],
            'email'=>['email'],
            'password'=>['required'],
            'roles'=>['required']
        ]);
        $user=User::create($user);
        //  i stored the return from create function above... for free to play with the user
        #add roles to the user when create it:)
        $user->syncRoles($request->roles);
   
        return to_route('users.index')
        ->with('message','the user added successfully');    
    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {         
  
        $roles=Role::get();
         // $userroles=$user->getRoleNames()->all( );   
        $userroles=$user->roles()->pluck('name','name')->all();    
        // dd($userroles);
        return view('user.edit',[
            'user'=> $user,
            'roles'=> $roles,
            'userroles'=> $userroles    
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {   # if u notice i ignore the email becuase i want to consider it as not changable:)
        $request->validate([

            'name'=>['required'],
 
            'password'=>['nullable'],
            'roles' =>['required']

        ]);
            #not every time the password may change so that i do this staffes below
        $data=$request->only('name');
        // dd($data);
        if(!empty($request->password)){
            $data+=[
                'password'=>$request->password            
            ];
    
        }
        // dd($data);
        $user->update($data);
        $user->syncRoles($request->roles);
        return to_route('users.index')
        ->with('message','the user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')
        ->with('message','the user deleted successfully');
        
    }
}
