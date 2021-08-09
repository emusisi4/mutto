<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branchandproduct;
use App\Branch;
use App\Branchandcode;
use App\Branchinaction;
class BranchesfloatcodesController extends Controller
{
  
  
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
    //  return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->latest('id')
    $roleto  = Branchinaction::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
     return    Branchandcode::with(['branchNamebettingproducts'])->latest('id')
    //return   Branchandproduct::latest('id')
          ->where('branch', $roleto)
        ->paginate(10);
      }

      
    }

 
    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
       'branch'   => 'required',
       'daterecieved'   => 'required',
       'floatcode'   => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];
$bn = $request['branch'];
$prod = $request['product'];
$systemprodname = DB::table('bettingproducts')->where('id', $prod)->value('sysname');
$dateinq =  $request['datedone'];
//DB::table('branchandproducts')->where('branch', $bn)->where('product', $prod)->delete();

       return Branchandcode::Create([
    

     'branch' => $request['branch'],
     'floatcode'=> $request['floatcode'],
     'daterecieved'=> $request['daterecieved'],
     
      'ucret' => $userid,
    
  ]);
    }
////////////////////////////////////////////////////////////////////
    public function show($id)
    {
        //
    }
   
   
    
    public function update(Request $request, $id)
    {
        //
        $user = branch::findOrfail($id);

$this->validate($request,[
  'branchname'   => 'required | String |max:191'
  

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

        $user = Shopbalancingrecord::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
