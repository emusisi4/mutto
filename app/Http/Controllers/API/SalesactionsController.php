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
use App\Dailysummaryreport;
use App\Productsale;
use App\Salessummary;
class SalesactionsController extends Controller
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
     
      'datesold' => $userid,
    
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
 //// Getting the supplier type in question
 $suppliertype = \DB::table('customers')->where('id', '=', $supplieridno)->value('customertype');

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
 // id, productname, oldcostprice, , , , , datesold, created_at, updated_at
/// Updating the price fluctuations
$datenow = date('Y-m-d');
Productpricechange::Create([
    

  'productname' => $productnumber,
  'oldcostprice' => $oldcostprice,
  'newcostprice' => $newcostprice,

  'oldsellingprice' => $oldsellingprice,
  'newsellingprice' => $newsellingprice,
  'datemodified' => $datenow,
 
  'datesold' => $userid,

]);
////////////$newamounttoaddtoinvoice
$currentsupplierbalance =    \DB::table('customers')->where('id', '=', $supplieridno)->value('bal');

//// Updating the supplier statement



$isinvoiceinstatementforsupplier = \DB::table('customerstatements')->where('invoiceinaction', '=', $supplierinvoiceno)->count();

if($isinvoiceinstatementforsupplier > 0)
{
  if($suppliertype == '2')
  $newsupplierbalance = $currentsupplierbalance+$levibalance;


 { $totalnow = \DB::table('customerstatements')->where('invoiceinaction', '=', $supplierinvoiceno)->value('amount');
  $newrrrtttf = $totalnow+$ttttddedd;
}
if($suppliertype == '1')
{ $totalnow = \DB::table('customerstatements')->where('invoiceinaction', '=', $supplierinvoiceno)->value('amount');
 $newrrrtttf = $totalnow-$ttttddedd;
}

  DB::table('customerstatements')->where('invoiceinaction', $supplierinvoiceno)->update(array('amount' => $newrrrtttf));
}


if($isinvoiceinstatementforsupplier < 1)
{
  if($suppliertype == '2')
  {
     $supplieropenningbalance = \DB::table('customers')->where('id', '=', $supplieridno)->value('bal');
 
$resultantbalance = $supplieropenningbalance+$ttttddedd;
  Customerstatement::Create([
    

    'customername' => $supplieridno,
    'transactiontype' => 2,
    'transactiondate' => $datedelivered,
  
    'description' => 'Recieved goods from Supplier',
    'openningbal' => $supplieropenningbalance,
    'amount' => 0,
    'transactionmode'=> 2,
    'debitamount' => $ttttddedd,
    'invoiceinaction' => $supplierinvoiceno,
    'resultatantbalance' => $resultantbalance,
   
    'datesold' => $userid,
  
  ]);
  DB::table('customers')->where('id', $supplieridno)->update(array('bal' => $resultantbalance));
  // DB::table('supplierstatements')->where('invoiceinaction', $supplierinvoiceno)->update(array('amount' => $newrrrtttf));
}
////////////////// end of type 2
if($suppliertype == '1')
{
  $newsupplierbalance = $currentsupplierbalance-$levibalance;


  $supplieropenningbalance = \DB::table('customers')->where('id', '=', $supplieridno)->value('bal');
 
  $resultantbalance = $supplieropenningbalance-$ttttddedd;
    Customerstatement::Create([
      
  
      'customername' => $supplieridno,
      'transactiontype' => 2,
      'transactiondate' => $datedelivered,
    
      'description' => 'Recieved goods from customer',
      'openningbal' => $supplieropenningbalance,
      'amount' => 0,
      'transactionmode'=> 2,
      'debitamount' => $ttttddedd,
      'invoiceinaction' => $supplierinvoiceno,
      'resultatantbalance' => $resultantbalance,
      'datesold' => $userid,
    
    ]);
    DB::table('customers')->where('id', $supplieridno)->update(array('bal' => $resultantbalance));
    // DB::table('supplierstatements')->where('invoiceinaction', $supplierinvoiceno)->update(array('amount' => $newrrrtttf));
}
}


//////////////////////////////////////////////////////////////////////////// Purchases
/// getting the unit vat price 
$unitvvvva =    \DB::table('purchases')->where('id', '=', $id)->value('unitvat');
///////////////////////
DB::table('purchases')->where('id', $id)->update(array('status' => 1,'qtydelivered' => $qtydelivered,'datedelivered' => $datedelivered,
'datesoldconfirmeddelivery' => $userid,
'totaltaxdelivered'=> $unitvvvva*$qtydelivered,
'totalcostdeliverywithtax'=> ($purchasecostforunit*$qtydelivered)+($unitvvvva*$qtydelivered),
'linecostdelivery' => $purchasecostforunit,
'totalcostdelivery'=> $purchasecostforunit*$qtydelivered));
//// Updating 
        ///////////////////////////////////////////
        /// checking if all products are confirmed
        $areallconf = \DB::table('purchases')->where('supplierinvoiceno', '=', $supplierinvoiceno)->where('status', '=', '0')->count();
        if($areallconf < 1)
        {
          DB::table('invoincestoappenditems')->where('invoiceno', $supplierinvoiceno)->delete();
 
        }
    }

  
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 
     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     $userrole =  auth('api')->user()->type;

     /// getting the product details
     
     $productoinquestion =\DB::table('productsales')->where('id', '=', $id)->value('productcode');
     $totalamountsold =\DB::table('productsales')->where('id', '=', $id)->value('linetotal');
     $datesold =\DB::table('productsales')->where('id', '=', $id)->value('datesold');
     $quantitysold =\DB::table('productsales')->where('id', '=', $id)->value('quantity');
     $receiptno =\DB::table('productsales')->where('id', '=', $id)->value('invoiceno');
     $branchsold =\DB::table('productsales')->where('id', '=', $id)->value('branch');
     $totlvatin =\DB::table('productsales')->where('id', '=', $id)->value('vatamount');
     $totalcost =\DB::table('productsales')->where('id', '=', $id)->value('totalcost');
     $netsalewithoutvat  =\DB::table('productsales')->where('id', '=', $id)->value('netsalewithoutvat');
     $transuser  =\DB::table('productsales')->where('id', '=', $id)->value('ucret');
     /// getting the current balance for the wallet
     $walletinactionone =\DB::table('expensewalets')->where('branchname', '=', $branchsold)->value('id');
     $walletbalance =\DB::table('expensewalets')->where('id', '=', $walletinactionone)->value('bal');
     $newwalletbalance = $walletbalance-$totalamountsold;
     if($newwalletbalance >= 0)
     {
         // updating the wallet balance
         DB::table('expensewalets')->where('id', $walletinactionone)->update(array('bal' => $newwalletbalance));
         DB::table('branchcashstandings')->where('branch', $branchsold)->update(array('outstanding' => $newwalletbalance));

         // working on vat 
         $currentvatamount =\DB::table('expensewalets')->where('id', '=', 6)->value('bal');
         $newvatinamount = $currentvatamount- $totlvatin;
         DB::table('expensewalets')->where('id', 6)->update(array('bal' => $newvatinamount));

         /// working on the product quantities
         $currentproductquantity =\DB::table('products')->where('id', '=', $productoinquestion)->value('qty');
         $newproductquantity = $currentproductquantity+$quantitysold;
         DB::table('products')->where('id', $productoinquestion)->update(array('qty' => $newproductquantity));

         /// checking the daily sales record 


         $totalsalesamount = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('linetotal');
         $totalnetunitsalewithoutvat= \DB::table('productsales')->where('datesold', '=', $datesold)->sum('netunitsalewithoutvat');
         $totalnetsalewithoutvat = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('netsalewithoutvat');
         $totalcostoftheday = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('totalcost');

         $lineprofitdaily = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('lineprofit');

         $totaldailyvat = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('vatamount');
         $netinvoiceincome = $totalsalesamount-$totaldailyvat;
    ///neteters
    
  

//////////////////////
$user = Productsale::findOrFail($id);
$user->delete();



// DB::table('dailysummaryreports')->where('branch', $branchsold)->where('datedone', $datesold)->delete();
DB::table('dailysummaryreports')->where('datedone', $datesold)->delete();

/// Inserting a fresh record

Dailysummaryreport::Create([
  'datedone' => $datesold,
  'branch' => $branchsold, 

  'netunitsalewithoutvat' => $totalnetunitsalewithoutvat,
  'netsalewithoutvat' => $totalnetsalewithoutvat,

  'saletype' => 1,
  'invoiceamount' => $totalsalesamount,
  'totalcost' => $totalcostoftheday,
  'netinvoiceincome' => $netinvoiceincome,
  'lineprofit' => $lineprofitdaily,
  'vatamount'=> $totaldailyvat, 
  // 'monthmade'=> $monthmade, 
  // 'yearmade' => $yearmade,
         
       ]);

/// working on the sales summary
/// deleting the invoice details

DB::table('salessummaries')->where('invoiceno', $receiptno)->delete();

//// geting the receipt totals
$totalreceiptsales =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('linetotal');
$totalcostoftheinvoice =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('totalcost');
$totalreceiptprofit =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('lineprofit');
$totallineforreceipt =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('branch');
$totalvatonreceipt =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('vatamount');
$totalcost =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('totalcost');
$totalnetsaleswithoutvatreceipt =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('netsalewithoutvat');
$totalnetunitsalewithoutvatinvoice =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('netunitsalewithoutvat');
Salessummary::Create([
   
  'invoiceno' => $receiptno,
  'branch' => $branchsold,
  'invoicedate' => $datesold,  
  'totalcost' => $totalcostoftheinvoice,
    'lineprofit' => $totalreceiptprofit,
    'vatamount' => $totalvatonreceipt,
    'saletype' => 1,

   'invoiceamount' => $totalreceiptsales,  
   'actualprofit' => $totalreceiptprofit-$totalvatonreceipt, 
   'netinvoiceincome' => ($totalreceiptsales-$totalvatonreceipt),   
  // 'monthmade' => $monthmade, 
  // 'yearmade' => $yearmade,  
   'netsalewithoutvat' => $totalnetsaleswithoutvatreceipt,
   'netunitsalewithoutvat'=> $totalnetunitsalewithoutvatinvoice,
   'ucret' => $transuser,
          
        ]);        
    

   
     }
     
     
     
     
     
     
    
////


     /// updating the 
  //   DB::table('purchasessummaries')->where('supplierinvoiceno', $supplierinvoiceno)->update(array('expectedvat' => $newexpectedvat,'tendercost' => $newtendercost));
       
       // return['message' => 'user deleted'];

    }
}
