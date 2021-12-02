<?php

namespace App\Http\Controllers\API;
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
use App\Salessummary;
use App\Dailysummaryreport;
use App\Incomestatementrecord;
use App\Incomestatementsummary;
use Illuminate\Support\Facades\DB;
class NewdeletesaleconfController extends Controller
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
        ->paginate(50);
      }


    
      
    }

 
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
       'invoiceno'   => 'required  |max:191',
       'id'   => 'required  |max:191',
       'description'   => 'required  |max:225'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
$reasonforcouncelling = $request['description'];
$invoice = $request['invoiceno'];
$id = $request['id'];
// /////////////////////////////////////////////////////////
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
$systemreference =\DB::table('productsales')->where('id', '=', $id)->value('invoiceno');
$typeofsale =\DB::table('productsales')->where('id', '=', $id)->value('saletype');
/// getting the current balance for the wallet
$walletinactionone =\DB::table('expensewalets')->where('branchname', '=', $branchsold)->value('id');
$walletbalance =\DB::table('expensewalets')->where('id', '=', $walletinactionone)->value('bal');
$newwalletbalance = $walletbalance-$totalamountsold;




///////////////getting the total sale on the invoice
$totallllllsaleontheinvoice =\DB::table('salessummaries')->where('invoiceno', '=', $receiptno)->value('invoiceamount');
////////////////////
if($newwalletbalance >= 0)
{
    // updating the wallet balance
    if($typeofsale == '1')
    {
    DB::table('expensewalets')->where('id', $walletinactionone)->update(array('bal' => $newwalletbalance));
    DB::table('branchcashstandings')->where('branch', $branchsold)->update(array('outstanding' => $newwalletbalance));
}
    // working on vat 
    $currentvatamount =\DB::table('expensewalets')->where('id', '=', 6)->value('bal');
    $newvatinamount = $currentvatamount- $totlvatin;
    DB::table('expensewalets')->where('id', 6)->update(array('bal' => $newvatinamount));

    /// working on the product quantities
    $currentproductquantity =\DB::table('products')->where('id', '=', $productoinquestion)->value('qty');
    $newproductquantity = $currentproductquantity+$quantitysold;
    DB::table('products')->where('id', $productoinquestion)->update(array('qty' => $newproductquantity));

    /// checking the daily sales record 

    DB::table('productsales')->where('id', $id)->delete();
    $totalsalesamount = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('linetotal');
    $totalnetunitsalewithoutvat= \DB::table('productsales')->where('datesold', '=', $datesold)->sum('netunitsalewithoutvat');
    $totalnetsalewithoutvat = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('netsalewithoutvat');
    $totalcostoftheday = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('totalcost');

    $lineprofitdaily = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('lineprofit');

    $totaldailyvat = \DB::table('productsales')->where('datesold', '=', $datesold)->sum('vatamount');
    $netinvoiceincome = $totalsalesamount-$totaldailyvat;
///neteters



//////////////////////





/// working on the sales summary
/// deleting the invoice details

//DB::table('salessummaries')->where('invoiceno', $receiptno)->delete();

//// geting the receipt totals
$totalreceiptsales =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('linetotal');
$totalcostoftheinvoice =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('totalcost');
$totalreceiptprofit =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('lineprofit');
$totallineforreceipt =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('branch');
$totalvatonreceipt =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('vatamount');
$totalcost =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('totalcost');
$totalnetsaleswithoutvatreceipt =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('netsalewithoutvat');
$totalnetunitsalewithoutvatinvoice =\DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('netunitsalewithoutvat');

DB::table('salessummaries')->where('invoiceno', $receiptno)->delete();
DB::table('salessummaries')->where('invoiceamount', 0)->delete();
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



// DB::table('dailysummaryreports')->where('branch', $branchsold)->where('datedone', $datesold)->delete();
DB::table('dailysummaryreports')->where('datedone', $datesold)->delete();

/// Inserting a fresh record

Dailysummaryreport::Create([
'datedone' => $datesold,
'branch' => $branchsold, 

'netunitsalewithoutvat' => $totalnetunitsalewithoutvat,
'netsalewithoutvat' => $totalnetsalewithoutvat,

'saletype' => $typeofsale,
'invoiceamount' => $totalsalesamount,
'totalcost' => $totalcostoftheday,
'netinvoiceincome' => $netinvoiceincome,
'lineprofit' => $lineprofitdaily,
'vatamount'=> $totaldailyvat, 
// 'monthmade'=> $monthmade, 
// 'yearmade' => $yearmade,
    
  ]);



  /// working on the Income statement



//    $users = DB::table('productsales')->where('ucret', $userid)->get();
  //getting the total invoice
  $totallineforinvoice = \DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('linetotal');
//  $totalcostoftheinvoice = \DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('totalcostprice');
  $totalprofitoninvoice = \DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('lineprofit');
  $totalvatoninvoice = \DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('vatamount');
///neteters
$totalnetsaleswithoutvatinvoice = \DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('netsalewithoutvat');
$totalnetunitsalewithoutvatinvoice = \DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('netunitsalewithoutvat');


DB::table('incomestatementsummaries')->where('statementdate', $datesold)->delete();




  $ddddtt4 = $datesold;
  $ddddtt = $datesold;
  $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $ddddtt4)->where('approvalstate', '=', 1)->sum('amount');
  $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $ddddtt4)->where('status', '=', 1)->sum('amount');






  Incomestatementrecord::Create([

   'incomerefrenceid' => $receiptno,
   'incomestatementdate' => $datesold,  
   'totalcost' => $totalcostoftheinvoice,
   'otherincomes'=> $incomestatementotherincomes,
   'expenses'=> $incomestatementexpenses,
 //  'monthmade'=> $monthmade,
//   'yearmade'=> $yearmade,
    'totalsales' => ($totallineforinvoice-$totalvatoninvoice),   
   'incomesourcedescription' =>  'Sales',   
    'grossprofit' => $totalnetsaleswithoutvatinvoice,
     'ucret' => $userid,
           
         ]);

}

$ddddtt = $datesold;

////////
$incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $ddddtt)->sum('netinvoiceincome');
$incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $ddddtt)->sum('totalcost');
$incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $ddddtt)->sum('netsalewithoutvat');
//////////
$incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $ddddtt)->where('approvalstate', '=', 1)->sum('amount');
$incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $ddddtt)->where('status', '=', 1)->sum('amount');
Incomestatementsummary::Create([
 
'statementdate' => $ddddtt,
'totalcost' => $incomestatementtotalcost,
'totalsales' =>$incomestatementtotalsales,  
'otherincomes'=> $incomestatementotherincomes,
'expenses'=> $incomestatementexpenses,
//  'mothmade'=> $monthmade,
//   'yearmade' => ($yearmade),   
'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses,
  

 


          'ucret' => $userid,
        
      ]);




















//// if credit sale  proceed to customer statement 
if($typeofsale == '2')   
{
/// getting the sales summary on cerdit
// $credidsaleinvoice = \DB::table('creditsalessummarries')->where('invoiceno', '=', $receiptno)->value('netinvoiceincome');

//// selecting the invoicetotal 
$totallineforinvoice = \DB::table('productsales')->where('invoiceno', '=', $receiptno)->sum('linetotal');



DB::table('creditsalessummarries')->where('invoiceno', $receiptno)->update(array('invoiceamount' => $totallineforinvoice));

//// working on cusomer statement
/// Getting the Customer statement
$customerinquesnd = \DB::table('creditsalessummarries')->where('invoiceno', '=', $receiptno)->value('customername');
//getting the customerstatement
$customerstatementamount = \DB::table('customerstatements')->where('invoiceinaction', '=', $receiptno)->value('amount');


//getting the latest running balance
$latestrunningbalance  = \DB::table('customerstatements')->where('customername', '=', $customerinquesnd)->orderBy('id', 'Desc')->value('resultatantbalance');
$datenow = date('Y-m-d');
//// de\\
if($latestrunningbalance  < 1)
{
$resultbalance = $latestrunningbalance+$totalamountsold;
}
if($latestrunningbalance  >0)
{
$resultbalance = $latestrunningbalance+$totalamountsold;
}
Customerstatement::Create([

'customername' => $customerinquesnd,
'openningbal' => $latestrunningbalance,
'transactiontype' => 2,
'transactiondate' =>$datenow,  
'description'=> 'Adjusting : Goods sold on '.$datesold.' for a total of '.$totallllllsaleontheinvoice ,
'customerdescription'=> 'Error correction '.'Adjusting : Goods sold on '.$datesold.' for a total of '.$totallllllsaleontheinvoice ,
'debitamount'=> $totalamountsold,
'deletecomment' => $reasonforcouncelling,
'resultatantbalance' => $resultbalance,

       'ucret' => $userid,
     
   ]);

   DB::table('customers')->where('id', $customerinquesnd)->update(['bal' => $resultbalance]);
} 




















// ////////////////
    }


   
public function customerstatementrecords()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $customername = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('customername');
  $startdate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('enddate');

 return   Customerstatement::with(['customerName','createdbyName'])->orderBy('id', 'Asc')
 /// return   Customerstatement::orderBy('id', 'Desc')
  ->whereBetween('transactiondate', [$startdate, $enddate])
  
 ->where('customername', $customername)
//   ->where('del', 0)
    ->paginate(90);





  
}

    public function satecustomerstatementtoview(){
   
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
  //////////////////////////////////

  public function findcustomerlegeraccount(){
    if($search = \Request::get('q')){
      $users = Customer::where(function($query) use ($search){
        $query->where('customername', 'LIKE', "%$search%");
      //  ->where('uracode', 'LIKE', "%$search%");
      })
        -> paginate(30);
       return $users;
    }else{
      return   Customer::latest('id')
      //  ->where('brand', $productbrand)
        ->where('del', 0)
            ->paginate(20);
    }
    
  }

  ////////////////////
    
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
