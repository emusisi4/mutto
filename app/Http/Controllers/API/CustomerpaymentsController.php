<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Customer;
use App\Customersreporttoview;
use App\Customerstatement;
use App\Customerpayment;
class CustomerpaymentsController extends Controller
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
      return   Customer::latest('id')
       //  return   Branchpayout::latest('id')
        // ->where('branch', $userbranch)
        ->paginate(20);
      }


    
      
    }

    
    public function customerpaymentsrecords()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $productcategory = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productcategory');
      $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
      $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');
    
     return   Customerpayment::with(['cusName', 'branfName','transUser','debitAccoubt','creditAccoubt'])->orderBy('id', 'Desc')
    //  return   Customerpayment::orderBy('id', 'Desc')
    //  ->whereBetween('datesold', [$startdate, $enddate])
      
    //  ->where('brand', $productbrand)
    //   ->where('del', 0)
        ->paginate(90);
    
    
    
    
    
      
    }
    
 
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
    //   'customername'   => 'required  |max:191',
       'narration'   => 'required  |max:225',
       'dop' => 'required',
       'mop' => 'required',
       'recievingwallet' =>'required',
       'amountpaid'   => 'required'
     //  'dorder'   => 'sometimes |min:0'
     ]);



$walletrecieving =  $request['recievingwallet'];



     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
   
$currentcustomerbalance = $request['bal'];
  $datepaid = date('Y-m-d');
  $receiptno = Str::random(6);
  //$receiptno = dd($randomString);

//  $inpbranch = $request['branchnametobalance'];
//// getting the customer type 
$customer = $request['id'];
$customertyppe = \DB::table('customers')->where('id', $customer )->value('customertype');

$currentwalletinactionbalance = \DB::table('expensewalets')->where('id', $walletrecieving )->value('bal');
Customerpayment::Create([
     'customername' => $request['id'],
     'amountpaid'=> $request['amountpaid'],
      'datepaid' => $request['dop'],
      'description' => $request['narration'],
      'reccievedby' => $userid,
      'accountcredited' => $walletrecieving,
      'mop' => $request['mop'],
      'receiptno'=> $receiptno,
      'branchname' => $userbranch,
      'ucret' => $userid, 
  ]);
  $cust = $request['id'];

/// Updating the customer Statement
if($customertyppe == '1')
{
  
  $vvdsr = \DB::table('customers')->where('id', $cust )->value('bal');
if($vvdsr < 1)
{
  $paidamount = $request['amountpaid'];
  $resultantbalance = $vvdsr-$paidamount;
}
if($vvdsr >= 1)
{
  $paidamount = $request['amountpaid'];
  $resultantbalance = $vvdsr-$paidamount;
}
Customerstatement::Create([
   'customername' =>  $request['id'],
    'openningbal' => $currentcustomerbalance,
   'transactiontype' => 2,
    'transactiondate' =>$request['dop'],  
    'description'=> 'Recieved cash from customer ',
    'debitamount'=> $request['amountpaid'],
  'invoiceinaction'=> $receiptno,
  'transactionmode'=> 1,
  
    'resultatantbalance' => $resultantbalance,
   
              'ucret' => $userid,
            
          ]);
          $bec = $request['amountpaid'];
$newwalbal = $currentwalletinactionbalance+$bec;

          /// Updatint the Custoomer balance
  DB::table('customers')->where('id', $request['id'])->update(['bal' =>  $resultantbalance]);
  /// Updating the collection wallet
  DB::table('expensewalets')->where('id', $walletrecieving)->update(['bal' =>  $newwalbal]);
// getting the branch with wallet

$branchstanding = \DB::table('expensewalets')->where('id', $walletrecieving )->value('branchname');
  DB::table('branchcashstandings')->where('branch', $branchstanding)->update(['outstanding' =>  $newwalbal]);
}/// closing if

if($customertyppe == '2')
{
  $vvdsr = \DB::table('customers')->where('id', $cust )->value('bal');
  if($vvdsr < 1)
  {
    $paidamount = $request['amountpaid'];
    $resultantbalance = $vvdsr+$paidamount;
  }
  if($vvdsr >= 1)
  {
    $paidamount = $request['amountpaid'];
    $resultantbalance = $vvdsr+$paidamount;
  }
Customerstatement::Create([
   'customername' =>  $request['id'],
    'openningbal' => $currentcustomerbalance,
   'transactiontype' => 1,
    'transactiondate' =>$request['dop'],  
    'description'=> 'Recieved cash from customer ',
    'debitamount'=> $request['amountpaid'],
  'transactionmode'=> 1,
    'resultatantbalance' => $resultantbalance,
    'invoiceinaction'=> $receiptno,
              'ucret' => $userid,
            
          ]);
          $bec = $request['amountpaid'];
$newwalbal = $currentwalletinactionbalance+$bec;

          /// Updatint the Custoomer balance
  DB::table('customers')->where('id', $request['id'])->update(['bal' =>  $currentcustomerbalance + $request['amountpaid']]);
  /// Updating the collection wallet
  DB::table('expensewalets')->where('id', $walletrecieving)->update(['bal' =>  $newwalbal]);

// getting the branch with wallet

$branchstanding = \DB::table('expensewalets')->where('id', $walletrecieving )->value('branchname');
DB::table('branchcashstandings')->where('branch', $branchstanding)->update(['outstanding' =>  $newwalbal]);
}/// closing if
    }

    
public function customerstatementrecords()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $productcategory = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productcategory');
  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

 return   Customerstatement::with(['customerName','createdbyName'])->orderBy('transactiondate', 'Asc')
 /// return   Customerstatement::orderBy('id', 'Desc')
//  ->whereBetween('datesold', [$startdate, $enddate])
  
//  ->where('brand', $productbrand)
//   ->where('del', 0)
    ->paginate(90);





  
}

    public function customerstamento(){
   
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $existanceinthetable = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->count();
       
       
       
        if($existanceinthetable < 1 )
        { Customersreporttoview::Create([
          //  'branch', 'ucret','startdate','enddate',
            //    'productcode' => $request['productcode'],
                'customername' => $request['customername'],
                // 'enddate' => $request['enddate'],
                // 'supplier' => $request['suppliername'],
                'ucret' => $userid,
              
            ]);
}
if($existanceinthetable > 0 )
{ 
  $result = DB::table('customersreporttoviews')
  ->where('ucret', $userid)
  ->update([
    'customername' => $request['customername']
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
        $user = Customer::findOrfail($id);

$this->validate($request,[
  'customername'   => 'required  |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

 
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Customer::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
