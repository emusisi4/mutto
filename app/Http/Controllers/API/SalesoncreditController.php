<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Custinactionsprof;
class SalesoncreditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }
    public function index()
    {
     
  return   Machine::latest('id')

     // ->where('del', 0)
     ->paginate(20);

    }

    
    
    public function store(Request $request)
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
        $this->validate($request,[
         'customername'   => 'required | max:191',
         'customerorderno'   => 'required',
         'invoicesalesdate'   => 'required'

          ]);
        //  $userid =  auth('api')->user()->id;
         
        \DB::table('custinactionsprofs')->where('ucret', $userid)->delete();
        return Custinactionsprof::Create([
            'customername' => $request['customername'],
            'customerorderno' => $request['description'],
            'invoicesalesdate' => $request['invoicesalesdate'],
          


            'ucret' => $userid,
         
  
                
        ]);
    }

    
    public function show($id)
    {
        //

    }

   
    
    public function update(Request $request, $id)
    {
        //
        $user = Machine::findOrfail($id);

        $this->validate($request,[
            'machinename'   => 'required | max:191',
       ///  'email'   => 'required | String |email|max:191|unique:users',
         'description'   => 'required  |min:2'
        
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
