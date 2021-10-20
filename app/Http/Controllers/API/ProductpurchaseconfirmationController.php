<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Productprice;
use App\Branch;
use App\Purchase;
use App\Productpricechange;
use App\Supplierstatement;
class ProductpurchaseconfirmationController extends Controller
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
        //
     ///   $user = Unitmeasure::findOrfail($id);

     $this->validate($request,[
        'unitprice'   => 'required  |max:191',
        'qtydelivered'   => 'required  |max:191',
        'unitsellingprice'   => 'required  |max:191',
        'deliverydate'   => 'required'
        
      
          ]);
          
$unitcostwithoutvat = $request['unitprice'];
$qtydelivered = $request['qtydelivered'];
$newsellingprice = $request['unitsellingprice'];
$datedelivered = $request['deliverydate'];
$dateordered = $request['dateordered'];
$recordinquestion = $id;
/// getting the invoice DEtails
$userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $supplierinvoiceno = \DB::table('purchases')->where('id', '=', $recordinquestion)->value('supplierinvoiceno');
/// GEtting the product in question
$productnumber = \DB::table('purchases')->where('id', '=', $recordinquestion)->value('productcode');
$purchasecostforunit = \DB::table('purchases')->where('id', '=', $id)->value('ordercostwithoutvat');
$oldinvoicevat =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('totalvat');

$olddeliverycostwithoutvat =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('deliverycostwithoutvat');
$newdeliverycostwithoutvat = $olddeliverycostwithoutvat+($unitcostwithoutvat*$qtydelivered);
$oldinvoicetotal =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('finalcost');
$newamounttoaddtoinvoice = $qtydelivered*$purchasecostforunit;
$newconfirmedinvoicetotal = $oldinvoicetotal+$newamounttoaddtoinvoice;


/////// supplierid
$supplieridno =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('suppliername');

/// Vat calculation on deliveries
$vatstat = \DB::table('purchases')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('vatstatus');
if($vatstat == '1')
{
  $vattotalcurrentbasedonquantitydelivered = 0;
  // $actualsellingprice = $newsellingprice;
}
if($vatstat == '2')
{
  $vattotalcurrentbasedonquantitydelivered = ((round((($purchasecostforunit*1.18))))-$purchasecostforunit )*($qtydelivered);
}
if($vatstat == '3')
{
  $vattotalcurrentbasedonquantitydelivered = ((round((($purchasecostforunit*1.18))))-$purchasecostforunit )*($qtydelivered);
}
$newinvoicevat =  $vattotalcurrentbasedonquantitydelivered+$oldinvoicevat;
$levibalance = ($qtydelivered*$purchasecostforunit)+($newinvoicevat);
          
$ttttddedd = (($newinvoicevat)+(($unitcostwithoutvat)*($qtydelivered)));
   $oldquantityavailable = \DB::table('products')->where('id', '=', $productnumber)->value('qty');
   $oldsellingprice = \DB::table('products')->where('id', '=', $productnumber)->value('unitprice');
   $newquantity = $oldquantityavailable+$qtydelivered;
   $oldcostprice = \DB::table('products')->where('id', '=', $productnumber)->value('unitcost');
   if($oldcostprice > 0)
  { $newcostprice =     round((($purchasecostforunit+$oldcostprice)/2),0);
}
if($oldcostprice < 1)
{ 
  $newcostprice =     $purchasecostforunit;
}
$currentinputvat = \DB::table('expensewalets')->where('walletno', '=', 5)->value('bal');
$newinputvat =  $vattotalcurrentbasedonquantitydelivered;
$updatedinputtotal = $currentinputvat+$newinputvat;
DB::table('expensewalets')->where('walletno', 5)->update(array('bal' => $updatedinputtotal));

////
//////////////////////////////////////////////////////////////////////////// Purchase summaries
 DB::table('purchasessummaries')->where('supplierinvoiceno', $supplierinvoiceno)->update(array('totalvat' => $newinvoicevat,
 'finalcost' => $newconfirmedinvoicetotal,
 'deliverycostwithoutvat' => $newdeliverycostwithoutvat));
///
$deliveredamount = \DB::table('purchasessummaries')->where('invoicedate', '=', $dateordered)->sum('finalcost');
$deliveredvatamount = \DB::table('purchasessummaries')->where('invoicedate', '=', $dateordered)->sum('totalvat');
///
$deliverycostwithoutvat = \DB::table('purchasessummaries')->where('invoicedate', '=', $dateordered)->sum('deliverycostwithoutvat');
$ordercostwithoutvat = \DB::table('purchasessummaries')->where('invoicedate', '=', $dateordered)->sum('ordercostwithoutvat');

DB::table('dailypurchasesreports')
                   ->where('datedone', $dateordered)
               ->update(array(
                    'deliveredamount' => $deliveredamount,
                    'deliveredvatamount' =>  $deliveredvatamount,
                    'deliverycostwithoutvat'=>  $deliverycostwithoutvat,
                    'ordercostwithoutvat' =>  $ordercostwithoutvat
                    
                    
                   ));


 //////////////////////////////////////////////////////////////////////////// Product quantity
DB::table('products')->where('id', $productnumber)->update(array('qty' => $newquantity,
 'unitcost' => $newcostprice,
 'unitprice' => $newsellingprice
));
 // id, productname, oldcostprice, , , , , ucret, created_at, updated_at
/// Updating the price fluctuations
$datenow = date('Y-m-d');
Productpricechange::Create([
    

  'productname' => $productnumber,
  'oldcostprice' => $oldcostprice,
  'newcostprice' => $newcostprice,

  'oldsellingprice' => $oldsellingprice,
  'newsellingprice' => $newsellingprice,
  'datemodified' => $datenow,
 
  'ucret' => $userid,

]);
////////////$newamounttoaddtoinvoice
$currentsupplierbalance =    \DB::table('suppliers')->where('id', '=', $supplieridno)->value('bal');
$newsupplierbalance = $currentsupplierbalance+$levibalance;


//// Updating the supplier statement



$isinvoiceinstatementforsupplier = \DB::table('supplierstatements')->where('invoiceinaction', '=', $supplierinvoiceno)->count();

if($isinvoiceinstatementforsupplier > 0)
{
  $totalnow = \DB::table('supplierstatements')->where('invoiceinaction', '=', $supplierinvoiceno)->value('amount');
  $newrrrtttf = $totalnow+$ttttddedd;

  DB::table('supplierstatements')->where('invoiceinaction', $supplierinvoiceno)->update(array('amount' => $newrrrtttf));
}


if($isinvoiceinstatementforsupplier < 1)
{
   $supplieropenningbalance = \DB::table('suppliers')->where('id', '=', $supplieridno)->value('bal');
 
$resultantbalance = $supplieropenningbalance+$ttttddedd;
  Supplierstatement::Create([
    

    'suppliername' => $supplieridno,
    'transactiontype' => 1,
    'transactiondate' => $datedelivered,
  
    'description' => 'Order Delivery',
    'openningbal' => $supplieropenningbalance,
    'amount' => $ttttddedd,

    'debitamount' => 0,
    'invoiceinaction' => $supplierinvoiceno,
    'resultatantbalance' => $resultantbalance,
   
    'ucret' => $userid,
  
  ]);

  // DB::table('supplierstatements')->where('invoiceinaction', $supplierinvoiceno)->update(array('amount' => $newrrrtttf));
}

DB::table('suppliers')->where('id', $supplieridno)->update(array('bal' => $newsupplierbalance));
//////////////////////////////////////////////////////////////////////////// Purchases
DB::table('purchases')->where('id', $id)->update(array('status' => 1,'qtydelivered' => $qtydelivered,'datedelivered' => $datedelivered,
'ucretconfirmeddelivery' => $userid,'linecostdelivery' => $purchasecostforunit,'totalcostdelivery'=> $purchasecostforunit*$qtydelivered));
//// Updating 
        
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
