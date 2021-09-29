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
use App\ productstock;

class InserintocartController extends Controller
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
    //  return   Product::wvith(['userbalancingBranch','branchinBalance'])->latest('id')
  //  return   Shopingcat::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
  return   Shopingcat::with(['productName'])->latest('id')
  
  ///  return   Product::latest('id')
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
    
      
       $this->validate($request,[
       'quantity'   => 'required',
       'id'   => 'required',
    
     ]);
     $userid =  auth('api')->user()->id;
     $branch =  auth('api')->user()->branch;
  $datepaid = date('Y-m-d');

  
/// getting the Unit Price
$product = $request['id'];
$unitprice = \DB::table('products') ->where('id', '=', $product)->orderBy('id', 'Desc')->value('unitprice');
$currentproductquantity = \DB::table('products') ->where('id', '=', $product)->orderBy('id', 'Desc')->value('qty');
$unitcost = \DB::table('products') ->where('id', '=', $product)->value('unitcost');
/// checking if the product is on the cart
$productexistsoncart = \DB::table('shopingcats')->where('productcode', '=', $product)->where('ucret', '=', $userid)->count();
if($productexistsoncart < 1)
{
  $qty = $request['quantity'];
  $linevat = ($unitprice*0.18);
  $totalvat = $linevat*$qty;
        Shopingcat::Create([
    

      'productcode' => $request['id'],
      'quantity' => $request['quantity'],
      'datesold' => $datepaid,
      'branch' => $branch,
      'unitprice' => $unitprice,
      'unitcost' => $unitcost,
      'netsalewithoutvat' => ((($unitprice*( $request['quantity']))-($unitcost*( $request['quantity']))))-($totalvat),
      'netunitsalewithoutvat' => $unitprice-$unitcost-$linevat,
      'vatamount'=> $totalvat,
      'linevat'=> $linevat,
      'linetotal' => ($unitprice*( $request['quantity'])),
     'totalcostprice'  => ($unitcost*( $request['quantity'])),
     'lineprofit'  => (($unitprice*( $request['quantity']))-($unitcost*( $request['quantity']))),
      'ucret' => $userid,
    
  ]);

  ///// updating the product quantity
  $newqtt = $currentproductquantity - $qty;
  $result = DB::table('products')
    ->where('id', $product)
    ->update([
      'qty' => $newqtt,
     
    ]);
        }

        if($productexistsoncart > 0)
{
  $currentquantity = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('quantity');
  $cp = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('unitcost');
  $sp = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('unitprice');
 
$newquantity = $request['quantity']+$currentquantity;
$currentproductquantity = \DB::table('products') ->where('id', '=', $product)->orderBy('id', 'Desc')->value('qty');
$zqty = $request['quantity'];
$newqtt = $currentproductquantity-$zqty;


$qty = $newquantity;
$linevat = ($unitprice*0.18);
$totalvat = $linevat*$qty;


$result = DB::table('shopingcats')
    ->where('productcode', $product)
    ->update([
      'quantity' => $newquantity,
      'vatamount'=> $totalvat,
      'linevat'=> $linevat,
      'netsalewithoutvat' => ((($unitprice*( $newquantity))-($unitcost*($newquantity))))-($totalvat),
      'netunitsalewithoutvat' => $unitprice-$unitcost-$linevat,
      'linetotal' => (($newquantity*$unitprice)),
      'totalcostprice'  => ($cp*($newquantity)),
      'lineprofit'  => (($sp*($newquantity))-($cp*($newquantity))),
    ]);
  

  
    $result = DB::table('products')
      ->where('id', $product)
      ->update([
        'qty' => $newqtt,
       
      ]);
     
        }
 
}
  
  
  
    public function show($id)
    {
        //
    }
   
  



     
    public function update(Request $request, $id)
    {
        //
        $user = Shopingcat::findOrfail($id);
        $userid =  auth('api')->user()->id;
        $branch =  auth('api')->user()->branch;
$this->validate($request,[
  'productcode'   => 'required',
  'unitprice'   => 'required',
  'quantity'   => 'required'

    ]);
    $product = $request['productcode'];
    $up = $request['unitprice'];
    $qty = $request['quantity'];

    $cp = \DB::table('shopingcats') ->where('productcode', '=', $product)->where('ucret', '=', $userid)->value('unitcost');
    $sp = $request['unitprice'];
   
    $user->update([
        'productcode' =>  $request['productcode'],
        'quantity' => $request['quantity'],
        'unitprice' => (($request['unitprice'])),
        'linetotal' => (($request['quantity']*$request['unitprice'])),
        'totalcostprice' => (($qty*$cp)),
        // 'totalcostprice'  => ($cp*($newquantity)),
        'lineprofit'  => (($qty*$sp)-( ($qty*$cp) )),
       
    ]);
     
///$user->update($request->all());
    }

    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 
/// Gettint the product in Question
$user = Shopingcat::findOrfail($id);
$userid =  auth('api')->user()->id;
$branch =  auth('api')->user()->branch;
$product = \DB::table('shopingcats') ->where('id', '=', $id)->where('ucret', '=', $userid)->value('productcode');
$soldqty = \DB::table('shopingcats') ->where('id', '=', $id)->where('ucret', '=', $userid)->value('quantity');
$currentpq = \DB::table('products') ->where('id', '=', $product)->value('qty');
$newqtytoupdate = $currentpq+$soldqty;
$result = DB::table('products')
      ->where('id', $product)
      ->update([
        'qty' => $newqtytoupdate,
       
      ]);
        $user = Shopingcat::findOrFail($id);
        $user->delete();
    
    }
}
