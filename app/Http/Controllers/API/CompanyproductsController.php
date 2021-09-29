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

class CompanyproductsController extends Controller
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
      return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->orderBy('id', 'Asc')
  ->where('category', $productcategory)
  //  ->where('brand', $productbrand)
    ->where('del', 0)
        ->paginate($displaynumber);
 }
 if($productcategory == '900' )
 {
   return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->orderBy('id', 'Asc')
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
    public function purchaseproducts()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $productcategory = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productcategory');
      $displaynumber = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('displaynumber');
      $productbrand = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productbrand');
      
 
    {
      return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->orderBy('id', 'Asc')
  //->where('category', $productcategory)
  //  ->where('brand', $productbrand)
    ->where('del', 0)
        ->paginate(10);
 }
 


    
      
    }
   
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
      'productname'   => 'required  |max:191',
      'brand'   => 'required',
      'unitmeasure'   => 'required',
      'brand'   => 'required', 
      'category'   => 'required'
    //   'unitname'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];

$dateinq =  $request['datedone'];
$productcode  = \DB::table('products')->orderBy('id', 'Desc')->limit(1)->value('id');

       return Product::Create([
    
  //    'productcode' => $request['productcode'],
      'productname' => $request['productname'],
      'rol' => $request['rol'],
      'category' => $request['category'],
      'brand' => $request['brand'],
      'description' => $request['description'],
      'unitmeasure' =>$request['unitmeasure'],
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
