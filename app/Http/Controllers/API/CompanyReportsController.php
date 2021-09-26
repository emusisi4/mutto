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
use App\Salessummary;
use App\Dailysummaryreport;
use App\Dailypurchasesreport;
use App\Purchasessummary;

class CompanyReportsController extends Controller
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

       
    


    public function dailyvatcollectedforselection()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      
      $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
      $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');
   
      //return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->orderBy('id', 'Asc')
      $totalcashin = \DB::table('dailysummaryreports')
   
      ->whereBetween('datedone', [$startdate, $enddate])
       
        ->sum('vatamount');
        return $totalcashin;
 
  
      
    }

    public function dailytotalsalesforselection()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      
      $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
      $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');
   
      $totalcashin = \DB::table('dailysummaryreports')
   
      ->whereBetween('datedone', [$startdate, $enddate])
       
        ->sum('invoiceamount');
        return $totalcashin;
  
      
    }




    public function dailypurchasesreportsummaryrecords()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      
      $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
      $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');
   
    //  return   Dailypurchasesreport::with(['branchName'])->orderBy('datedone', 'Asc')
      return   Dailypurchasesreport::orderBy('datedone', 'Desc')
      ->whereBetween('datedone', [$startdate, $enddate])
      
      ->paginate(90);
 
  
      
    }
    public function dailypurchasesreportdetailedrecords()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      
      $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
      $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');
      $supplier = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('supplier');
if($supplier == '900')
     {
       return   Purchasessummary::with(['supplierName'])->orderBy('invoicedate', 'Desc')
     ///return   Purchasessummary::orderBy('invoicedate', 'Desc')
    ->whereBetween('invoicedate', [$startdate, $enddate])
      
  //  ->where('brand', $productbrand)
 //   ->where('del', 0)
        ->paginate(90);
      }
      if($supplier != '900')
      {
        return   Purchasessummary::with(['supplierName'])->orderBy('invoicedate', 'Desc')
      ///return   Purchasessummary::orderBy('invoicedate', 'Desc')
     ->whereBetween('invoicedate', [$startdate, $enddate])
       
       ->where('suppliername', $supplier)
  //   ->where('del', 0)
         ->paginate(90);
       }
  
  
      
    }



























    public function dailysalessummaryrecords()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      
      $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
      $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');
   
      return   Dailysummaryreport::with(['branchName'])->orderBy('datedone', 'Asc')
    //  return   Dailysummaryreport::orderBy('datedone', 'Desc')
      ->whereBetween('datedone', [$startdate, $enddate])
      
  //  ->where('brand', $productbrand)
 //   ->where('del', 0)
        ->paginate(90);
 
  
      
    }

    

    public function dailysalesreports()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $productcategory = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productcategory');
      $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
      $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');
   
      return   Salessummary::with(['branchName'])->orderBy('invoicedate', 'Desc')
      //return   Salessummary::orderBy('invoicedate', 'Desc')
      ->whereBetween('invoicedate', [$startdate, $enddate])
      
  //  ->where('brand', $productbrand)
 //   ->where('del', 0)
        ->paginate(90);
 
 


    
      
    }
//////  getting the total sales

// totalvatdailysalesreports
// totalnetinvoicedailysalesreports







public function totaldailypurchasespaymentsbalancerangereports()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

  $totalcashin = \DB::table('dailypurchasesreports')
   
  ->whereBetween('datedone', [$startdate, $enddate])
  ->sum('balanceonpayments');
    return $totalcashin;


}
public function totaldailypurchasespaymentsamountrangereports()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

  $totalcashin = \DB::table('dailypurchasesreports')
   
  ->whereBetween('datedone', [$startdate, $enddate])
  ->sum('paymentsmade');
    return $totalcashin;


}

public function totaldailypurchasesdeliveriesvatsrangereports()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

  $totalcashin = \DB::table('dailypurchasesreports')
   
  ->whereBetween('datedone', [$startdate, $enddate])
  ->sum('deliveredvatamount');
    return $totalcashin;


}



public function totaldailypurchasesdeliveriesamountrangereports()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

  $totalcashin = \DB::table('dailypurchasesreports')
   
  ->whereBetween('datedone', [$startdate, $enddate])
  ->sum('deliveredamount');
    return $totalcashin;


}

public function totaldailypurchasesvatsrangereports()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

  $totalcashin = \DB::table('dailypurchasesreports')
   
  ->whereBetween('datedone', [$startdate, $enddate])
  ->sum('orderedvatamount');
    return $totalcashin;


}
public function totaldailypurchasesordersrangereports()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');
  $supplier = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('supplier');
  
  // if($supplier == '900')
  // {
  // $totalcashin = \DB::table('dailypurchasesreports')->whereBetween('datedone', [$startdate, $enddate])->sum('orderedamount');
  // }
  // if($supplier != '900')
  // {
  // $totalcashin = \DB::table('dailypurchasesreports')->where('suppliername', $supplier )->whereBetween('datedone', [$startdate, $enddate])->sum('orderedamount');
  // }  
 $totalcashin = \DB::table('dailypurchasesreports')->whereBetween('datedone', [$startdate, $enddate])->sum('orderedamount');
 return $totalcashin;


}








































public function totalnetinvoicedailysalesreports()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

  $totalcashin = \DB::table('salessummaries')
   
  ->whereBetween('invoicedate', [$startdate, $enddate])
    // ->where('transferdate', '=', $currentdate)
    // ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('netinvoiceincome');
    return $totalcashin;


}
public function totalvatdailysalesreports()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $productcategory = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productcategory');
  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

  $totalcashin = \DB::table('salessummaries')
   
  ->whereBetween('invoicedate', [$startdate, $enddate])
    // ->where('transferdate', '=', $currentdate)
    // ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('vatamount');
    return $totalcashin;


}

public function totalsalesdailysalesreports()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $productcategory = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productcategory');
  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

  $totalcashin = \DB::table('salessummaries')
   
  ->whereBetween('invoicedate', [$startdate, $enddate])
    // ->where('transferdate', '=', $currentdate)
    // ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('invoiceamount');
    return $totalcashin;


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
              ->paginate(20);
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
