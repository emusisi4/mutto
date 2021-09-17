<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Unitmeasure;

class ProductunitmeasuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }

    public function index()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;

    //  if($userrole == '101')
      {
    
      return   Unitmeasure::latest('id')->paginate(20);
      }


    
      
    }

       public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
     'unitname'   => 'required  |max:191',
     //'rop'   => 'required  |max:191',
     'shotcode'   => 'required  |max:5'
       // 'iconclass'   => 'required',
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];

$dateinq =  $request['datedone'];


       return Unitmeasure::Create([
    

      'unitname' => $request['unitname'],
    //  'rop' => $request['rop'],
      'shotcode' => $request['shotcode'],
     
      'ucret' => $userid,
    
  ]);
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
        $user = Unitmeasure::findOrfail($id);

$this->validate($request,[
  //'unitname'   => 'required  |max:191',
  //'shotcode'   => 'required'
  

    ]);

 
     
$user->update($request->all());
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
     //   $this->authorize('isAdmin'); 

        $user = Unitmeasure::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
