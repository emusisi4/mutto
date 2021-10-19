<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Product;
use App\Itemtransitdetail;

class ProducttransferController extends Controller
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
      $productcategory = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productcategory');
      $displaynumber = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('displaynumber');
      $productbrand = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productbrand');
      
  if($productcategory != '900' )
    {
      return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->orderBy('qty', 'Desc')
      ->orderBy('unitprice', 'Desc')->orderBy('unitcost', 'Desc')
  ->where('category', $productcategory)
  //  ->where('brand', $productbrand)
    ->where('del', 0)
        ->paginate($displaynumber);
 }
 if($productcategory == '900' )
 {
   return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->orderBy('qty', 'Desc')
   ->orderBy('unitprice', 'Desc')->orderBy('unitcost', 'Desc')
//->where('category', $productcategory)
// ->where('brand', $productbrand)
 ->where('del', 0)
     ->paginate($displaynumber);
}
// if($productcategory == '900' and $productbrand == '900')
// {
//   return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
// //->where('category', $productcategory)
// //->where('brand', $productbrand)
// ->where('del', 0)
//     ->paginate($displaynumber);
// }


    
      
    }

    public function gettransferexistanceforuser()
{
  $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
       
        // $receiptno = \DB::table('salessummaries') ->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('invoiceno');
// $zer == '0';
 $branchtobalanceexisits = \DB::table('itemtransitdetails')

  
    ->where('ucret', '=', $userid)
    ->where('status', '=', 0)
    ->count();

    return $branchtobalanceexisits;
   
}

public function producttoname()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $unitmeasurefrom = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasurefrom');
      $itemto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('itemto');
      $unitmeasureto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasureto');
      
  return $unitmeasurefromname = \DB::table('products')->where('id', $itemto )->value('productname');
   
    }

public function unittoname()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $unitmeasurefrom = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasurefrom');
      $itemto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('itemto');
      $unitmeasureto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasureto');
      
  return $unitmeasurefromname = \DB::table('unitmeasures')->where('id', $unitmeasureto )->value('unitname');
   
    }

    
    public function transferdadt()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $unitmeasurefrom = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasurefrom');
      $itemto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('transactiondate');
   
      
  return $itemto;
   
    }
    
    public function productfromname()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $unitmeasurefrom = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasurefrom');
      $itemto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('itemfrom');
   
      
  return $unitmeasurefromname = \DB::table('products')->where('id', $itemto )->value('productname');
   
    }

    public function productfromcode()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $unitmeasurefrom = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('itemto');
      $itemto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('itemfrom');
     // $unitmeasureto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasureto');
      
  return $itemto;
  }

    
    public function qtyintransit()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $unitmeasurefrom = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('itemto');
      $itemto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('qtyfrom');
     // $unitmeasureto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasureto');
      
  return $itemto;
  }


    public function producttocode()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $unitmeasurefrom = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('itemto');
      $itemto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('itemto');
     // $unitmeasureto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasureto');
      
  return $itemto;
  }


    // ///////////////////////////////////////////



    public function unitfromname()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $unitmeasurefrom = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasurefrom');
      $itemto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('itemto');
      $unitmeasureto = \DB::table('itemtransitdetails')->where('ucret', $userid )->value('unitmeasureto');
      
  return $unitmeasurefromname = \DB::table('unitmeasures')->where('id', $unitmeasurefrom )->value('unitname');
  
 


    
      
    }
   
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
      'productrefrenceiddes'   => 'required  |max:191',
     
      'transferquantity'   => 'required',
    //'productrefrenceiddes' => 'required',
      'transferdate'   => 'required'
    //   'unitname'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];
$prodto = $request['productrefrenceiddes'];
$dateinq =  $request['datedone'];
$unitmeasureto  = \DB::table('products')->where('id', $prodto)->value('unitmeasure');

       return Itemtransitdetail::Create([
    
  //    'productcode' => $request['productcode'],
      'itemfrom' => $request['id'],
      'qtyfrom' => $request['transferquantity'],
     'transactiondate'=> $request['transferdate'],
     'status'=> 0,
      'unitmeasurefrom' => $request['unitmeasure'],
      'itemto' => $request['productrefrenceiddes'],
      'unitmeasureto' => $unitmeasureto,
    
      'ucret' => $userid,
    
  ]);
    }

    
    public function searchproductinproductlist(){
      if($search = \Request::get('q')){
        $users = Product::where(function($query) use ($search){
          $query->where('productname', 'LIKE', "%$search%");
        //  ->where('uracode', 'LIKE', "%$search%");
        })
          -> paginate(30);
         return $users;
      }else{
        return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->orderBy('id', 'Asc')
      //  ->where('category', $productcategory)
        //  ->where('brand', $productbrand)
          ->where('del', 0)
              ->paginate(20);
      }
      
    }
    public function search(){
      if($search = \Request::get('q')){
        $users = Product::where(function($query) use ($search){
          $query->where('productname', 'LIKE', "%$search%");
        })
          -> paginate(30);
         return $users;
      }else{
        return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->orderBy('id', 'Asc')
      //  ->where('category', $productcategory)
        //  ->where('brand', $productbrand)
          ->where('del', 0)
              ->paginate(10);
      }
      
    }
    public function show($id)
    {
        //
    }
   
    
    public function update(Request $request, $id)
    {
        //
        $user = Product::findOrfail($id);

$this->validate($request,[
  //'branchname'   => 'required | String |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

  
    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Product::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }

    public function search_unit_by_key()
    {
    	$key = \Request::get('q');
        $unit = Product::where('productname','LIKE',"%{$key}%")
                                   // ->orWhere('is_active','LIKE',"%{$key}%")
                                    ->get();

    	return response()->json([ 'unit' => $unit ],Response::HTTP_OK);
    }
}
