<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Brand;

class ProductbrandsController extends Controller
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
    //  return   Product::with(['userbalancingBranch','branchinBalance'])->latest('id')
   // return   Productcategory::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
      return   Brand::latest('id')
       //  return   Branchpayout::latest('id')
        // ->where('branch', $userbranch)
        ->paginate(20);
      }


     // if($userrole == '100')
      {
      
      
     // return   Product::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Product::latest('id')
       //  return   Branchpayout::latest('id')
    //     ->where('del', 0)
     //   ->paginate(20);
      
    }
      
    }

   
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
     //   'branchname'   => 'required | String |max:191'
        'brandname'   => 'required',
    //    'test1'   => 'required',
        'description'   => 'required'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];

$dateinq =  $request['datedone'];


       return Brand::Create([
    

      'brandname' => $request['brandname'],
     
      'description' => $request['description'],
   //  'teto' => $request['teto'],
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
        $user = brand::findOrfail($id);

$this->validate($request,[
  'brandname'   => 'required  |max:191'
  

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

        $user = Brand::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
