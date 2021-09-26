<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Purchasessummary;
use App\Dailypurchasesreport;

class NewinvoicegenerationController extends Controller
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
      
  if($productcategory != '900' and $productbrand != '900')
    {
      return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
  ->where('category', $productcategory)
   ->where('brand', $productbrand)
    ->where('del', 0)
        ->paginate($displaynumber);
 }
 if($productcategory == '900'  and $productbrand != '900')
 {
   return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
//->where('category', $productcategory)
->where('brand', $productbrand)
 ->where('del', 0)
     ->paginate($displaynumber);
}
if($productcategory == '900' and $productbrand == '900')
{
  return   Product::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
//->where('category', $productcategory)
//->where('brand', $productbrand)
->where('del', 0)
    ->paginate($displaynumber);
}


    
      
    }

   
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
      'suppliername'   => 'required  |max:191',
      'invoicedate'   => 'required',
      'invoicenumber'   => 'required'
    
    //   'unitname'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');

//  $inpbranch = $request['branchnametobalance'];
$latestid  = \DB::table('purchasessummaries')->orderBy('id', 'Desc')->limit(1)->value('id');
//$invd = $request['invoicedate'];
$invd = date('Ymd');

$wordCount = \DB::table('purchasessummaries')->where('invoicedate', '=', $invd)->count();
$yyt = $wordCount+1;
$dateinq =   $request['invoicedate'];
$purcaseno = $invd.$yyt;
   Purchasessummary::Create([
    
  
      'suppliername' => $request['suppliername'],
      'suppliername' => $request['suppliername'],
      'invoicedate' => $request['invoicedate'],
      'supplierinvoiceno' => $request['invoicenumber'],
    'purchaseno'=>$purcaseno,
      'ucret' => $userid,
    
  ]);


  /// checking and creating the invoice for the Daily purchases report
  $dexist = \DB::table('dailypurchasesreports')->where('datedone', '=', $dateinq)->count();
 if($dexist < 1) 
 {

  ///id, datedone, orderedamount, orderedvatamount, deliveredamount, deliveredvatamount, paymentsmade, balanceonpayments, created_at
   Dailypurchasesreport::Create([
    
  
    'datedone' => $dateinq,
    'orderedamount' => 0,
    'orderedvatamount' => 0,
    'deliveredamount' => 0,
  'deliveredvatamount'=>0,
  'paymentsmade'=>0,
  'balanceonpayments'=>0,
    // 'ucret' => $userid,
  
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
}
