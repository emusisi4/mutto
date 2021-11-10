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
use App\Customerstatement;
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
    
    //  return   Unitmeasure::latest('id')->paginate(20);
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

$userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;





      $istherecordconfirmedalready = \DB::table('purchases')->where('id', '=', $id)->value('status');
if($istherecordconfirmedalready < 1)
{


















/// Activities 1. Updating quantities in products 
// Getting the current quantities
$productinaction = \DB::table('purchases')->where('id', '=', $recordinquestion)->value('productcode');
$currentproductquantity =\DB::table('products')->where('id', '=', $productinaction)->value('qty');
$newproductquantity = $currentproductquantity+$qtydelivered;
//// Getting the invoice in action
$invoicenumberinaction = \DB::table('purchases')->where('id', '=', $recordinquestion)->value('supplierinvoiceno');

/// getting the supplier details
$suppliername =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoicenumberinaction)->value('suppliername');
// getting the supplier type
$suppliertype = \DB::table('customers')->where('id', '=', $suppliername)->value('customertype');


/// Getting the current vattotal
$currenttotalvatoninvoice =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoicenumberinaction)->value('totalvat');

/// Calculating the new vat
$purchasecostforunit = \DB::table('purchases')->where('id', '=', $id)->value('ordercostwithoutvat');
$vatstat = \DB::table('purchases')->where('supplierinvoiceno', '=', $invoicenumberinaction)->value('vatstatus');
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


///////// Delivered details
$currentdeliverycostwithoutvat =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoicenumberinaction)->value('deliverycostwithoutvat');
$newdeliverycostwithoutvat = ($currentdeliverycostwithoutvat)+($unitcostwithoutvat*$qtydelivered);



$currentfinalcostoninvoice =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoicenumberinaction)->value('finalcost');
$newamounttoaddtoinvoice = $qtydelivered*$purchasecostforunit;
$newconfirmedinvoicetotal = $currentfinalcostoninvoice+$newamounttoaddtoinvoice;

//// working on costprice
$oldcostprice = \DB::table('products')->where('id', '=', $productinaction)->value('unitcost');
$oldsellingprice = \DB::table('products')->where('id', '=', $productinaction)->value('unitprice');
if($oldcostprice > 0)
{ $newcostprice =     round((($purchasecostforunit+$oldcostprice)/2),0);
}
if($oldcostprice < 1)
{ 
$newcostprice =     $purchasecostforunit;
}

/// calculating the total vat on invoice
$newinvoicevat =  $vattotalcurrentbasedonquantitydelivered+$currenttotalvatoninvoice;
//////////////////// updating the summaries
DB::table('purchasessummaries')->where('supplierinvoiceno', $invoicenumberinaction)->update(array('totalvat' => $newinvoicevat,
'finalcost' => $newconfirmedinvoicetotal,
'deliverycostwithoutvat' => $newdeliverycostwithoutvat));

//// calculating the vat on purchases input vat
 
$currentinputvat = \DB::table('expensewalets')->where('walletno', '=', 5)->value('bal');
$newinputvat =  $vattotalcurrentbasedonquantitydelivered;
$updatedinputtotal = $currentinputvat+$newinputvat;
DB::table('expensewalets')->where('walletno', 5)->update(array('bal' => $updatedinputtotal));
//////////////////// dauily purchase report

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
///////////////////////////// updating the product quantities and price
DB::table('products')->where('id', $productinaction)->update(array(
  'qty' => $newproductquantity,
 'unitcost' => $newcostprice,
 'unitprice' => $newsellingprice
));
///
$datenow = date('Y-m-d');
Productpricechange::Create([
    

  'productname' => $productinaction,
  'oldcostprice' => $oldcostprice,
  'newcostprice' => $newcostprice,

  'oldsellingprice' => $oldsellingprice,
  'newsellingprice' => $newsellingprice,
  'datemodified' => $datenow,
 
  'ucret' => $userid,

]);
 
////////////$newamounttoaddtoinvoice
//

//// Updating the supplier statement

//// checking if an invoice exists for a supplier
$isinvoiceinstatementforsupplier = \DB::table('customerstatements')->where('invoiceinaction', '=', $invoicenumberinaction)->count();

if($isinvoiceinstatementforsupplier > 0)
{
  /// Getting the current statement invoice amount
 

 //  $currentsupplierbalance =    \DB::table('customers')->where('id', '=', $suppliername)->value('bal');

//// working on the user type
  if($suppliertype == '2')
  {
    $standinginvoicestatementamount = \DB::table('customerstatements')->where('invoiceinaction', '=', $invoicenumberinaction)->value('debitamount');
    $myappendamount = ($unitcostwithoutvat * $qtydelivered)+($vattotalcurrentbasedonquantitydelivered);
    $amounttoupdateoninvoice = $standinginvoicestatementamount+$myappendamount;
  
    $supplieropenningbalance = \DB::table('customers')->where('id', '=', $suppliername)->value('bal');



    ////////////
    $supplieropenningbalance = \DB::table('customers')->where('id', '=', $suppliername)->value('bal');
 
   $newsupplierbalance = $supplieropenningbalance+$myappendamount;

   

    $totalnow = \DB::table('customerstatements')->where('invoiceinaction', '=', $invoicenumberinaction)->value('debitamount');
  //  $updatedtotaloninvoice = $totalnow+$newconfirmedinvoicetotal+$newconfirmedinvoicetotal;
  $resamount = $supplieropenningbalance+$amounttoupdateoninvoice;
  DB::table('customerstatements')->where('invoiceinaction', $invoicenumberinaction)->update(array('debitamount' => $amounttoupdateoninvoice));
  DB::table('customerstatements')->where('invoiceinaction', $invoicenumberinaction)->update(array('resultatantbalance' => $newsupplierbalance));

  DB::table('customers')->where('id', $suppliername)->update(array('bal' => $newsupplierbalance));

  }
 



if($suppliertype == '1')
{ 
  $standinginvoicestatementamount = \DB::table('customerstatements')->where('invoiceinaction', '=', $invoicenumberinaction)->value('amount');
$myappendamount = ($unitcostwithoutvat * $qtydelivered)+($vattotalcurrentbasedonquantitydelivered);
$amounttoupdateoninvoice = $standinginvoicestatementamount+$myappendamount;
  $supplieropenningbalance = \DB::table('customers')->where('id', '=', $suppliername)->value('bal');
 
   $newsupplierbalance = $supplieropenningbalance-$myappendamount;


  $totalnow = \DB::table('customerstatements')->where('invoiceinaction', '=', $invoicenumberinaction)->value('amount');


 DB::table('customerstatements')->where('invoiceinaction', $invoicenumberinaction)->update(array('amount' => $amounttoupdateoninvoice));
  DB::table('customerstatements')->where('invoiceinaction', $invoicenumberinaction)->update(array('resultatantbalance' => $newsupplierbalance));

  DB::table('customers')->where('id', $suppliername)->update(array('bal' => $newsupplierbalance));
}

}

//////////////////////////////////////////////////////
if($isinvoiceinstatementforsupplier < 1)
{
 
 
 
  if($suppliertype == '2')
  {
    $standinginvoicestatementamount = \DB::table('customerstatements')->where('invoiceinaction', '=', $invoicenumberinaction)->value('debitamount');
    $myappendamount = ($unitcostwithoutvat * $qtydelivered)+($vattotalcurrentbasedonquantitydelivered);
    $amounttoupdateoninvoice = $standinginvoicestatementamount+$myappendamount;
  
    $supplieropenningbalance = \DB::table('customers')->where('id', '=', $suppliername)->value('bal');
    ///////
     $supplieropenningbalance = \DB::table('customers')->where('id', '=', $suppliername)->value('bal');
 
$resultantbalance = $supplieropenningbalance+$amounttoupdateoninvoice;
  Customerstatement::Create([
    

    'customername' => $suppliername,
    'transactiontype' => 2,
    'transactiondate' => $datedelivered,
  
    'description' => 'Recieved goods from Supplier',
    'openningbal' => $supplieropenningbalance,
    'amount' => 0,
    'transactionmode'=> 2,
    'debitamount' => $amounttoupdateoninvoice,
    'invoiceinaction' => $invoicenumberinaction,
    'resultatantbalance' => $resultantbalance,
   
    'ucret' => $userid,
  
  ]);
  DB::table('customers')->where('id', $suppliername)->update(array('bal' => $resultantbalance));
  // DB::table('supplierstatements')->where('invoiceinaction', $supplierinvoiceno)->update(array('amount' => $newrrrtttf));
}
////////////////// end of type 2
if($suppliertype == '1')
{ $standinginvoicestatementamount = \DB::table('customerstatements')->where('invoiceinaction', '=', $invoicenumberinaction)->value('amount');
  $myappendamount = ($unitcostwithoutvat * $qtydelivered)+($vattotalcurrentbasedonquantitydelivered);
  $amounttoupdateoninvoice = $standinginvoicestatementamount+$myappendamount;
    $supplieropenningbalance = \DB::table('customers')->where('id', '=', $suppliername)->value('bal');
  $resultantbalance = $supplieropenningbalance-$amounttoupdateoninvoice;
  $newsupplierbalance = $supplieropenningbalance-$amounttoupdateoninvoice;

    Customerstatement::Create([
      
  
      'customername' => $suppliername,
      'transactiontype' => 2,
      'transactiondate' => $datedelivered,
    
      'description' => 'Recieved goods from supplier',
      'openningbal' => $supplieropenningbalance,
      'amount' => $amounttoupdateoninvoice,
      'transactionmode'=> 2,
      'debitamount' => 0,
      'invoiceinaction' => $invoicenumberinaction,
      'resultatantbalance' => $resultantbalance,
      'ucret' => $userid,
    
    ]);
    DB::table('customers')->where('id', $suppliername)->update(array('bal' => $resultantbalance));
    // DB::table('supplierstatements')->where('invoiceinaction', $supplierinvoiceno)->update(array('amount' => $newrrrtttf));
}
}//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////// Purchases
/// getting the unit vat price 
$unitvvvva =    \DB::table('purchases')->where('id', '=', $id)->value('unitvat');
///////////////////////
DB::table('purchases')->where('id', $id)->update(array('status' => 1,'qtydelivered' => $qtydelivered,'datedelivered' => $datedelivered,
'ucretconfirmeddelivery' => $userid,
'totaltaxdelivered'=> $unitvvvva*$qtydelivered,
'totalcostdeliverywithtax'=> ($purchasecostforunit*$qtydelivered)+($unitvvvva*$qtydelivered),
'linecostdelivery' => $purchasecostforunit,
'totalcostdelivery'=> $purchasecostforunit*$qtydelivered));
//// Updating 
        ///////////////////////////////////////////
        /// checking if all products are confirmed
        $areallconf = \DB::table('purchases')->where('supplierinvoiceno', '=', $invoicenumberinaction)->where('status', '=', '0')->count();
        if($areallconf < 1)
        {
          DB::table('invoincestoappenditems')->where('invoiceno', $invoicenumberinaction)->delete();
 
        }




        }//// closing if the record is not confirmed
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
