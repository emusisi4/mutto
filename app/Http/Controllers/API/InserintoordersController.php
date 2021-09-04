<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Product;
use App\Shopingcat;
use App\Productsale;
use App\ Ordermaking;

class InserintoordersController extends Controller
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

  //   //  if($userrole == '101')
  //     {
  //   //  return   Product::with(['userbalancingBranch','branchinBalance'])->latest('id')
  // //  return   Shopingcat::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
  // return   Shopingcat::with(['productName'])->latest('id')
  
  // ///  return   Product::latest('id')
  //      //  return   Branchpayout::latest('id')
  //       // ->where('branch', $userbranch)
  //       ->paginate(20);
   //   }


     // if($userrole == '100')
      {
      
      
     // return   Product::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Product::latest('id')
       //  return   Branchpayout::latest('id')
    //     ->where('del', 0)
     //   ->paginate(20);
      
    }
      
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
      //
       // return ['message' => 'i have data'];



       $this->validate($request,[
        'productname'   => 'required',
        'brand'   => 'required',
        'supplier'   => 'required',
        'smallunitmeasure'   => 'required',
        'unitcost'   => 'required',
        'qtyperunit'   => 'required',
        'quantity'   => 'required',

        'unitofmeasure'   => 'required',
       
        // 'dorder'   => 'sometimes |min:0'
      ]);
      $userid =  auth('api')->user()->id;
      $branch =  auth('api')->user()->branch;
   $datepaid = date('Y-m-d');
 
   
 /// getting the Unit Price
 $product = $request['productname'];
 //$unitprice = \DB::table('productstocks') ->where('productcode', '=', $product)->value('unitprice');
 
 /// checking if the product is on the cart
 $productexistsoncart = \DB::table('ordermakings')->where('productname', '=', $product)->where('ucret', '=', $userid)->count();
 if($productexistsoncart < 1)
 {
         Ordermaking::Create([
     
       'lineunitcost' => round($request['unitcost']/$request['qtyperunit']),
       'productname' => $request['productname'],
       'brand' => $request['brand'],
       'supplier' => $request['supplier'],
       'unitofmeasure' => $request['unitofmeasure'],
       'quantity' => $request['quantity'],
       'unitcost' => $request['unitcost'],
       'smallunitmeasure' => $request['smallunitmeasure'],
       'qtyperunit' => $request['qtyperunit'],
       'datemade' => $datepaid,
       //'branch' => $branch,
      // 'unitprice' => $unitprice,
       'linetotalcost' => (($request['quantity'])*( $request['unitcost'])),
      
       'ucret' => $userid,
     
   ]);
         }
 
         if($productexistsoncart > 0)
 {
   $currentquantity = \DB::table('ordermakings') ->where('productname', '=', $product)->where('ucret', '=', $userid)->value('quantity');
  
 $newquantity = $request['quantity']+$currentquantity;
   
 $result = DB::table('ordermakings')
     ->where('productname', $product)
     ->update([
       'quantity' => $newquantity,
       'linetotalcost' => (($request['quantity'])*( $request['unitcost']))
     ]);
   
      
         }
   //$datas =\DB::table('shopingcats')->get();
 
 //  //foreach($datas as $data){
 //   $users = DB::table('shopingcats')->where('ucret', $userid)->get();
     
 //   foreach ($users as $user) {
     
 //    Productsale::Create([
 //     'productcode' => $user->productcode,
 //     'unitprice' => $user->unitprice,       
             
 //              'ucret' => $userid,
            
 //          ]);
        
}
  
  
  


   
    public function show($id)
    {
        //
    }
   
    




     
    public function update(Request $request, $id)
    {
        //
        $user = Ordermaking::findOrfail($id);

$this->validate($request,[
  
 'productname'  => 'required',
  'quantity' => 'required',
 'qtyperunit' => 'required',
 'linetotalcost' => 'required',
 'unitcost' => 'required',
 'lineunitcost' => 'required',
 'supplier' => 'required',
 'brand' => 'required',
 'unitofmeasure' => 'required',
 'smallunitmeasure' => 'required',
 
    ]);

    $user->update([
      'lineunitcost' => round($request['unitcost']/$request['qtyperunit']),
      'productname' => $request['productname'],
      'brand' => $request['brand'],
      'supplier' => $request['supplier'],
      'unitofmeasure' => $request['unitofmeasure'],
      'quantity' => $request['quantity'],
      'unitcost' => $request['unitcost'],
      'smallunitmeasure' => $request['smallunitmeasure'],
      'qtyperunit' => $request['qtyperunit'],
    
      //'branch' => $branch,
     // 'unitprice' => $unitprice,
      'linetotalcost' => (($request['quantity'])*( $request['unitcost'])),

    ]);
     
///$user->update($request->all());
    }

    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Ordermaking::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
