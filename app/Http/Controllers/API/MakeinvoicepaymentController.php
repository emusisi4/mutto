<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Productprice;
use App\Invoicepayment;
use App\Purchase;

class MakeinvoicepaymentController extends Controller
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

    
    public function show($id)
    {
        //
    }
   
   
    public function update(Request $request, $id)
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
        //
     ///   $user = Unitmeasure::findOrfail($id);

     $this->validate($request,[
        'supplierinvoiceno'   => 'required  |max:191',
        'finalcost'   => 'required  |max:191',
        'amountpaid'   => 'required  |max:191',
        'walletofexpense'   => 'required  |max:191',
        'amountbeingpaid'   => 'required  |max:191',
        'dateofpayment' => 'required  |max:191',
      //  'invoicebalance'=> 'required|min:0',
        'paymentmode'   => 'required'
        
      
          ]);
      

$transactionid = $id;
$supplierinvoiceno = $request['supplierinvoiceno'];
$invoicetotalamount = $request['finalcost'];
$amountalreadypaid = $request['amountpaid'];
$newpayment = $request['amountbeingpaid'];
$dateofpayment = $request['dateofpayment'];
$walletofexpense = $request['walletofexpense'];
$paymentmode = $request['paymentmode'];
$newinvoicebalance = ($invoicetotalamount)-(($amountalreadypaid+$newpayment)); 
$newinvoicetotalpaid = $amountalreadypaid+$newpayment;

if($newinvoicebalance >= 0)
{
  /// Updating the invoice amount paid
  DB::table('purchasessummaries')->where('supplierinvoiceno', $supplierinvoiceno)
  ->update(array('amountpaid' => $newinvoicetotalpaid,
  'invoicebalance' => $newinvoicebalance

));
//// creating the Payment statement 
//getting the supplier details

$suppliername =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('suppliername');
$invoicedate =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('invoicedate');
$invoiceamount =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('finalcost');
$doccumentno =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('purchaseno');

/// Getting the account in Question
$accountinquestionbalance =\DB::table('expensewalets')->where('walletno', '=', $walletofexpense)->value('bal');
$newaccountinquestionbalance = $accountinquestionbalance-$newpayment;
/// Checking if the Account balance is enough to pay the invoice
if($accountinquestionbalance >= $newpayment )
{

/// inserting the Data into the invoice payments

Invoicepayment::Create([
  'invoiceno' => $doccumentno,
  'suppliername' => $suppliername,
   'supplierinvoiceno' => $supplierinvoiceno,
   'dateofpayment' => $dateofpayment,
   'amountpaid' => $newpayment,
   'payingaccount' => $walletofexpense,
   'modeofpayment' => $paymentmode,
   'documentno' => $doccumentno,
   'invoicedate' => $invoicedate,
   'invoicebalance' => $newinvoicebalance,
    'ucret' => $userid,
       
     ]);
    
    }/// closing if the account balance is enough
/// updting the purchase summary
DB::table('purchasessummaries')
->where('supplierinvoiceno', $supplierinvoiceno)
->update(array(
  'amountpaid' => $newinvoicetotalpaid,
  'invoicebalance' => $newinvoicebalance
)); //// End of update for product summaries



$paymentsmade = \DB::table('purchasessummaries')->where('invoicedate', '=', $invoicedate)->sum('amountpaid');
$invoicebalance = \DB::table('purchasessummaries')->where('invoicedate', '=', $invoicedate)->sum('invoicebalance');


DB::table('dailypurchasesreports')
                   ->where('datedone', $invoicedate)
               ->update(array(
                       'paymentsmade' => $paymentsmade,
                       'balanceonpayments' =>  $invoicebalance
                    
                    
                    
                   ));













//// Updating the account balance
DB::table('expensewalets')
->where('id', $walletofexpense)
->update(array(
  'bal' => $newaccountinquestionbalance
));
/// End of expense walet update
//// Updating the branch balance 
/// wallwt branch
$branchinwallet =\DB::table('expensewalets')->where('walletno', '=', $walletofexpense)->value('branchname');
DB::table('branchcashstandings')
->where('branch', $branchinwallet)
->update(array(
  'outstanding' => $newaccountinquestionbalance
));

}



        
    }

  
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

     /// getting the product details
     
     $productid =\DB::table('purchases')->where('id', '=', $id)->value('productcode');
     $supplierinvoiceno =\DB::table('purchases')->where('id', '=', $id)->value('supplierinvoiceno');
     
     $vattotal =\DB::table('purchases')->where('id', '=', $id)->value('vattotal');
     $tendecostproduct =\DB::table('purchases')->where('id', '=', $id)->value('grandtotal');

     $expectedvat =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('expectedvat');
     $tendercost =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('tendercost');
     $newtendercost = $tendercost-$tendecostproduct;
     $newexpectedvat = $expectedvat - $vattotal;
////


     /// updating the 
     DB::table('purchasessummaries')->where('supplierinvoiceno', $supplierinvoiceno)->update(array('expectedvat' => $newexpectedvat,'tendercost' => $newtendercost));
        $user = Purchase::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
