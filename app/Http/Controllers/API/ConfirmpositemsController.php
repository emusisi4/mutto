<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Branchpayout;
use App\Shopingcat;
use App\Productsale;
use App\Orderdetail;
use App\Salessummary;
use App\Dailysummaryreport;
use App\Incomestatementrecord;
use App\Incomestatementminirecord;
use App\Incomestatementsummary;
class ConfirmpositemsController extends Controller
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
     //   if($userrole = 1)





       // return Student::all();
     //  return   Submheader::with(['maincomponentSubmenus'])->latest('id')
       // return   MainmenuList::latest('id')
     //    ->where('del', 0)
         //->paginate(15)
     //    ->get();

    //  return   Branchpayout::with(['ExpenseTypeconnect','expenseCategory','payingUserdetails'])->latest('id')
       return   Orderssummary::latest('id')
       // ->where('del', 0)
       ->paginate(13);

       //  return Submheader::latest()
         //  -> where('ucret', $userid)
           










       // {
      // return Submheader::latest()
      //  -> where('ucret', $userid)
    //    ->paginate(15);
      //  }

      
    }

    
    public function store(Request $request)
    {
          //
       // return ['message' => 'i have data'];
      $userid =  auth('api')->user()->id;
      $branch =  auth('api')->user()->branch;
   $datepaid = date('Y-m-d');
 
   
   $users = DB::table('shopingcats')->where('ucret', $userid)->get();
     //getting the total invoice
     $totallineforinvoice = \DB::table('shopingcats')->where('ucret', '=', $userid)->sum('linetotal');

     /// getting the total cost
     $totalcostoftheinvoice = \DB::table('shopingcats')->where('ucret', '=', $userid)->sum('totalcostprice');
     $totalprofitoninvoice = \DB::table('shopingcats')->where('ucret', '=', $userid)->sum('lineprofit');
     $totalvatoninvoice = \DB::table('shopingcats')->where('ucret', '=', $userid)->sum('vatamount');
///neteters
$totalnetsaleswithoutvatinvoice = \DB::table('shopingcats')->where('ucret', '=', $userid)->sum('netsalewithoutvat');
$totalnetunitsalewithoutvatinvoice = \DB::table('shopingcats')->where('ucret', '=', $userid)->sum('netunitsalewithoutvat');


     //// getting the invoice number
     $dto = date('ymd');
///////////////////////////////////////////////////////////////////////////////// getting the branch balance
$userbranchbalance  = \DB::table('branchcashstandings')->where('branch', '=', $branch)->sum('outstanding');
$newshopbalance = $userbranchbalance+$totallineforinvoice;
/// counting the existance of invoice number
$currentinvoicenumber = \DB::table('salessummaries')->count();
if($currentinvoicenumber > 0)
{
    
$invoiceno1  = \DB::table('salessummaries')->orderBy('id', 'Desc')->limit(1)->value('id');
$inv = $invoiceno1+1;
$invoiceno = $inv.$dto;

}
if($currentinvoicenumber < 1)
{
    $inv =1;
//$invoiceno1  = \DB::table('salessummaries')->orderBy('id', 'Desc')->limit(1)->value('id');
$invoiceno = $inv.$dto;

}










   foreach ($users as $user) {
     
    Productsale::Create([
     'productcode' => $user->productcode,
     'unitprice' => $user->unitprice,
     'invoiceno' => $invoiceno,
     'quantity' => $user->quantity,
     'datesold' => $user->datesold,
     'vatamount'=> $user->vatamount, 
     'linevat'=> $user->linevat, 
     'branch' => $user->branch, 
     'linetotal' => $user->linetotal,
     'unitcost' => $user->unitcost,
    'totalcost' => $user->totalcostprice,
     'lineprofit' => $user->lineprofit,
     'netsalewithoutvat' => $user->netsalewithoutvat,
     'netunitsalewithoutvat'=> $user->netunitsalewithoutvat,
     'status' => 10,  
      
              'ucret' => $userid,
            
          ]);
$ppcode = $user->productcode;
$soldqty = $user->quantity;
$qtynow   = \DB::table('products')->where('id', $ppcode)->limit(1)->value('qty');
          //// Updatind the quantity
          $upd = $qtynow-$soldqty;
         
         
          // DB::table('products')
          // ->where('id', $ppcode)
          // ->update(['qty' => $upd]);
          // DB::table('productprices')
          // ->where('productcode', $ppcode)
          // ->update(['qtyavailable' => $upd]);
      
 }

 /// getting the vat out 
 $currentvatout    = \DB::table('expensewalets')->where('walletno', 6)->value('bal');
 $newvatout = $currentvatout+$totalvatoninvoice;
//  $poy =  $user->productcode;
//           foreach ($poy as $poz) {
//             $ronn = DB::table('products')->update(['qty' => 1000 ]);

//           }

DB::table('expensewalets')
->where('walletno', 6)
->update(['bal' => $newvatout]);

/// updating the branch balance
DB::table('expensewalets')
->where('branchname', $branch)
->update(['bal' => $newshopbalance]);


/// updating the branch balance
DB::table('branchcashstandings')
->where('branch', $branch)
->update(['outstanding' => $newshopbalance]);


$dto88 = date('Y-m-d');
 /// Saving the Sales Summary
 $dateandmonth = $user->datesold;
 $yearmade = date('Y', strtotime($dateandmonth));
  $monthmade = date('m', strtotime($dateandmonth));
  ///$totalnetsaleswithoutvatinvoice = \DB::table('shopingcats')->where('ucret', '=', $userid)->sum('netsalewithoutvat');
//$totalnetunitsalewithoutvatinvoice = \DB::table('shopingcats')->where('ucret', '=', $userid)->sum('netunitsalewithoutvat');
 Salessummary::Create([
   
   'invoiceno' => $invoiceno,
   'branch' => $user->branch,
   'invoicedate' => $user->datesold,  
   'totalcost' => $totalcostoftheinvoice,
     'lineprofit' => $totalprofitoninvoice,
     'vatamount' => $totalvatoninvoice,
    'invoiceamount' => $totallineforinvoice,  
    'actualprofit' => $totalprofitoninvoice-$totalvatoninvoice, 
    'netinvoiceincome' => ($totallineforinvoice-$totalvatoninvoice),   
    'monthmade' => $monthmade, 
    'yearmade' => $yearmade,  
    'netsalewithoutvat' => $totalnetsaleswithoutvatinvoice,
    'netunitsalewithoutvat'=> $totalnetunitsalewithoutvatinvoice,

             'ucret' => $userid,
           
         ]);
         $ddddtt4 = $user->datesold;
         $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $ddddtt4)->where('approvalstate', '=', 1)->sum('amount');
         $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $ddddtt4)->where('status', '=', 1)->sum('amount');
         Incomestatementrecord::Create([
   
          'incomerefrenceid' => $invoiceno,
          // 'branch' => $user->branch,
          'incomestatementdate' => $user->datesold,  
          'totalcost' => $totalcostoftheinvoice,
          'otherincomes'=> $incomestatementotherincomes,
          'expenses'=> $incomestatementexpenses,
           'totalsales' => ($totallineforinvoice-$totalvatoninvoice),   
          'incomesourcedescription' =>  'From Sales Made',   
           'grossprofit' => $totalnetsaleswithoutvatinvoice,

           



       
       
                    'ucret' => $userid,
                  
                ]);

/// creating the sales statement Total salss - 1, totalcost = 2, incomefromothersources = 3 expenses = 4
                Incomestatementminirecord::Create([
   
                  'incomerefrenceid' => $invoiceno,
                  // 'branch' => $user->branch,
                  'dateoftransaction' => $ddddtt4,  
                  'sourceoftransaction' => '1',
                  'typeoftransaction'=> '1',
                  'descriptionoftransaction'=> 'Item Sales',
                   'transactionamount' => ($totallineforinvoice-$totalvatoninvoice),   

                        'ucret' => $userid,
                          
                        ]);

                        //// creating the totalcost Transaction
                        /// creating the sales statement Total salss - 1, totalcost = 2, incomefromothersources = 3 expenses = 4
                Incomestatementminirecord::Create([
   
                  'incomerefrenceid' => $invoiceno,
                  // 'branch' => $user->branch,
                  'dateoftransaction' => $ddddtt4,  
                  'sourceoftransaction' => '2',
                  'typeoftransaction'=> '2',
                  'descriptionoftransaction'=> 'Purcase of items',
                   'transactionamount' => ($totalcostoftheinvoice),   
                   'ucret' => $userid,
                          
                        ]);


         //// Working on the Daily Sales Summary 
  /// selecting the records
  ///  
  $ddddtt = $user->datesold;
  $ubranch = $user->branch;

  
  $totalnetunitsalewithoutvat = \DB::table('salessummaries')->where('invoicedate', '=', $ddddtt)->where('branch', '=', $ubranch)->sum('netunitsalewithoutvat');  
  $totalnetsalewithoutvat = \DB::table('salessummaries')->where('invoicedate', '=', $ddddtt)->where('branch', '=', $ubranch)->sum('netsalewithoutvat');  


$totalsalesamount = \DB::table('salessummaries')->where('invoicedate', '=', $ddddtt)->where('branch', '=', $ubranch)->sum('invoiceamount');  
$totalvat = \DB::table('salessummaries')->where('invoicedate', '=', $ddddtt)->where('branch', '=', $ubranch)->sum('vatamount');     
$totalcost = \DB::table('salessummaries')->where('invoicedate', '=', $ddddtt)->where('branch', '=', $ubranch)->sum('totalcost');      
$netinvoiceincome = \DB::table('salessummaries')->where('invoicedate', '=', $ddddtt)->where('branch', '=', $ubranch)->sum('netinvoiceincome');      
$lineprofit = \DB::table('salessummaries')->where('invoicedate', '=', $ddddtt)->where('branch', '=', $ubranch)->sum('lineprofit');     
$monthmade = \DB::table('salessummaries')->where('invoicedate', '=', $ddddtt)->where('branch', '=', $ubranch)->sum('monthmade');    
$yearmade = \DB::table('salessummaries')->where('invoicedate', '=', $ddddtt)->where('branch', '=', $ubranch)->sum('yearmade');     



/// deleting the current record
DB::table('dailysummaryreports')->where('branch', $ubranch)->where('datedone', $ddddtt)->delete();
/// Inserting a fresh record
//id, datedone, branch, invoiceamount, totalcost, netinvoiceincome, lineprofit, vatamount, monthmade, yearmade
Dailysummaryreport::Create([
  'datedone' => $ddddtt,
  'branch' => $ubranch, 

  'netunitsalewithoutvat' => $totalnetunitsalewithoutvat,
  'netsalewithoutvat' => $totalnetsalewithoutvat,


  'invoiceamount' => $totalsalesamount,
  'totalcost' => $totalcost,
  'netinvoiceincome' => $netinvoiceincome,
  'lineprofit' => $lineprofit,
  'vatamount'=> $totalvat, 
  'monthmade'=> $monthmade, 
  'yearmade' => $yearmade,
         
       ]);
//// getting the day details for the income statement
/// sales without vat is netinvoiceincome
$incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $ddddtt)->sum('netinvoiceincome');
$incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $ddddtt)->sum('totalcost');
$incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $ddddtt)->sum('netsalewithoutvat');
//// checking if the day exists in the incomestatement summaru
$ggetrsummaryincome = \DB::table('incomestatementsummaries')->where('statementdate', '=', $ddddtt)->count();
if($ggetrsummaryincome > 0)
{
  //// getting the expenses, and other incomes
  /// expenses 
  $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $ddddtt)->where('approvalstate', '=', 1)->sum('amount');
  $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $ddddtt)->where('status', '=', 1)->sum('amount');
  DB::table('incomestatementsummaries')
->where('statementdate', $ddddtt)
->update([
'totalsales' => $incomestatementtotalsales,
'totalcost' => $incomestatementtotalcost,
'otherincomes'=> $incomestatementotherincomes,
'expenses'=> $incomestatementexpenses,
'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses
]);
}
//////////////
if($ggetrsummaryincome < 1)
{
  $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $ddddtt)->where('approvalstate', '=', 1)->sum('amount');
  $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $ddddtt)->where('status', '=', 1)->sum('amount');
Incomestatementsummary::Create([
   
  'statementdate' => $ddddtt,
 'totalcost' => $incomestatementtotalcost,
  'totalsales' =>$incomestatementtotalsales,  
  'otherincomes'=> $incomestatementotherincomes,
  'expenses'=> $incomestatementexpenses,

  'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses,
    
  
   


            'ucret' => $userid,
          
        ]);
}



//////
 DB::delete('delete from shopingcats where ucret = ?',[$userid]);
   
   
  
    }
///////////////////////////////////////////////////////////////////////






    public function show($id)
    {
        //
    }
   
    
    public function update(Request $request, $id)
    {
        //
        $user = Branchpayout::findOrfail($id);

        $this->validate($request,[
            'receiptno'   => 'required | String |max:191',
            'datemade'   => 'required',
            'branch'  => 'required',
            'amount'  => 'required'
    ]);

 
     
$user->update($request->all());
    }

   
    
    
    
     public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

       // $user = Shopingcat::findOrFail($id);
      //  $user->delete();
       // return['message' => 'user deleted'];
       $userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
       DB::delete('delete from shopingcats where ucret = ?',[$userid]);

    }
}
