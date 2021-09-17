<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }
    public function index()
    {
      //  $userid =  auth('api')->user()->id;
       

     //   $this->authorize('isSuperadmin'); 
     //   return   User::with(['userRole','userBranch'])->latest('id')
  return   User::latest('id')

     // ->where('del', 0)
     ->paginate(20);

    }

    
    
    public function store(Request $request)
    {
        //

        //
        $this->validate($request,[
         'name'   => 'required | String |max:191',
         'email'   => 'required | String |email|max:191|unique:users',
         'password'   => 'required  |min:2',
        
         'rolename'   => 'required'


        // 'type'   => 'required'
          ]);
        //  $userid =  auth('api')->user()->id;
         
         
         
        return User::Create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
  
            'mmaderole' => $request['rolename'],
           // 'branch' => $request['branch'],
         //   'photo' => $request['photo'],
        //    'ucret' => $userid,
            'password' => Hash::make($request['password']),
        ]);
    }

    
    public function show($id)
    {
        //

    }

   
    
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrfail($id);

        $this->validate($request,[
            'name'     => 'required | String |max:191',
            'email'    => 'required | String |email|max:191|unique:users,email,'.$user->id,
            'password'   => 'sometimes|min:2'
        
            ]);
        
        
    $user->update($request->all());
       // return ['message' => 'Userd updated'];
    }

    
    
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
    }
}
