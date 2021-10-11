<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Madeexpense;
use App\Expmothlyexpensereport;
use App\Generalexpensereportsummarry;
use App\Expmonthlyexpensesreportbycategory;
use App\Expmonthlyexpensesreportbywallet;
use App\Expdailyreport;
use App\Expmonthlyexpensesreportbytype;
use App\Incomestatementminirecord;
class MadeexpensesofficeConroller extends Controller
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
    $userrole =  auth('api')->user()->mmaderole;
     
     $branchinb = \DB::table('expenserecordtoselects')->where('ucret', $userid )->value('branch');
     $expensename = \DB::table('expenserecordtoselects')->where('ucret', $userid )->value('expensename');
     $displaynumber = \DB::table('expenserecordtoselects')->where('ucret', $userid )->value('displaynumber');

    //  if($userrole == '101')
    //   {
      
    //      return   Madeexpense::with(['branchName','expenseName'])->latest('datemade')
    //   // return   Madeexpense::latest('id')
    //     ->where('del', 0)
    //     ->where('branch', $userbranch)
    //    ->paginate(20);
    //   }
     
      
      if($branchinb != '900' && $expensename != '900')
      
     {   return   Madeexpense::with(['branchName','expenseName'])->latest('datemade')
        
      ->where('expense', $expensename)
       ->where('branch', $branchinb)
       ->paginate($displaynumber);
      }// all branches
      if($branchinb == '900' && $expensename == '900')
      
      {   return   Madeexpense::with(['branchName','expenseName'])->latest('datemade')
         
   //    ->where('expense', $expensename)
     //   ->where('branch', $branchinb)
        ->paginate($displaynumber);
       }// all branches
       if($branchinb == '900' && $expensename != '900')
      
       {   return   Madeexpense::with(['branchName','expenseName'])->latest('datemade')
          
    ->where('expense', $expensename)
      //   ->where('branch', $branchinb)
         ->paginate($displaynumber);
        }// all branches
   
        if($branchinb != '900' && $expensename == '900')
      
        {   return   Madeexpense::with(['branchName','expenseName'])->latest('datemade')
           
   //  ->where('expense', $expensename)
         ->where('branch', $branchinb)
          ->paginate($displaynumber);
         }// all branches
      
    }

 
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
      //  'expensename'   => 'required | String |max:191',
        'description'   => 'required',
        'amount'  => 'required',
        'expense'  => 'required',
        'datemade'  => 'required',
        'branch'  => 'required',
       // 'expensetype'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     //$hid = $id1+1;

  
     
     $generalnum1 = random_int(100, 999);
     $generalnum2 = random_int(100, 999);

$reference = $generalnum1.$generalnum2;
  //       $dats = $id;
  $exp = $request['expense'];
  $expcat = DB::table('expenses')->where('expenseno', $exp )->value('expensecategory');
  $exptyo = \DB::table('expenses')->where('expenseno', $exp)->value('expensetype');
  $dateinact = $request['datemade'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));
       Madeexpense::Create([
      'expense' => $request['expense'],
      'approvalstate' => 0,
      'description' => $request['description'],
      'amount' => $request['amount'],
      'datemade' => $request['datemade'],
      'branch' => $request['branch'],
      'walletexpense' => $request['walletexpense'],
      'explevel' => 2,
      'category' => $expcat,
      'exptype' => $exptyo,
      'yearmade' => $yearmade,
      'monthmade' => $monthmade,
      'incomerefrenceid'=> $reference,
      'ucret' => $userid,
    
  ]);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

















//DB::table('expmonthlyexpensesreportbycategories')->where('monthname', $monthmade)->where('yearname', $yearmade)->where('yearname', $yearmade)->delete();

// DB::table('generalexpensereportsummarries')->insert([
//   [
//     'amount' => $newexpensesmonthandyear,
//     'monthname'=> $monthmade,
//     'yearname' => $yearmade

  
//   ],
  
// ]);















    }

    
    public function show($id)
    {
        //
    }
   
 
    
    public function update(Request $request, $id)
    {
        //
        $user = Madeexpense::findOrfail($id);

$this->validate($request,[
    'expense'   => 'required | String |max:191',
    'description'   => 'required',
    'amount'  => 'required',
    'datemade'  => 'required',
    'branch'  => 'required'
]);

 
     
$user->update($request->all());
    }

  
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 







     $userid =  auth('api')->user()->id;
   
   
     $approvalstate = \DB::table('madeexpenses')->where('id', $id )->value('approvalstate');
     $walletofexpense = \DB::table('madeexpenses')->where('id', $id )->value('walletexpense');
   
   
  
     $transamount = \DB::table('madeexpenses')->where('id', $id)->value('amount');
     $currentaccountbalancespending = \DB::table('expensewalets')->where('id', $walletofexpense)->value('bal');

if($approvalstate == 0 )
{
   if($currentaccountbalancespending >= $transamount)
   {
    $newwalletamountrecieving = $currentaccountbalancespending-$transamount;
    $updatingthegivingaccount = \DB::table('expensewalets')->where('id', $walletofexpense)->update(['bal' =>  $newwalletamountrecieving]);
    $updatingthestatus = \DB::table('madeexpenses')->where('id', $id)->update(['approvalstate' => 1]);

//// working on the monthly expenses report

$branchinact = \DB::table('madeexpenses')->where('id', $id)->value('branch');
$monthmade = \DB::table('madeexpenses')->where('id', $id)->value('monthmade');
$yearmade = \DB::table('madeexpenses')->where('id', $id)->value('yearmade');
$datemade = \DB::table('madeexpenses')->where('id', $id)->value('datemade');
$category = \DB::table('madeexpenses')->where('id', $id)->value('category');
$exptype = \DB::table('madeexpenses')->where('id', $id)->value('exptype');
$walletofexpense = \DB::table('madeexpenses')->where('id', $id)->value('walletexpense');
///
$totalbranchexpensesfotthemonth = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $branchinact)
->where('approvalstate', '=', 1)
->sum('amount');
/// deleting the record
DB::table('expmothlyexpensereports')->where('branch', $branchinact)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
/// inserting back the record
Expmothlyexpensereport::Create([
  'branch'      => $branchinact,
  
  'amount'         => $totalbranchexpensesfotthemonth,
  'monthname'         => $monthmade,
  'yearname'         => $yearmade,
    
  'ucret' => $userid,

]);
/////
$totalbranchexpensesfotthemonthcategory = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('category', '=', $category)
->where('approvalstate', '=', 1)
->sum('amount');
/// deleting the record
DB::table('expmonthlyexpensesreportbycategories')->where('expensecategory', $category)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
/// inserting back the record
Expmonthlyexpensesreportbycategory::Create([
  'expensecategory'      => $category,
  // 'branch'      => $branchinact,
  'amount'         => $totalbranchexpensesfotthemonthcategory,
  'monthname'         => $monthmade,
  'yearname'         => $yearmade,
    
  'ucret' => $userid,

]);
$totalbranchexpensesfotthemonthtypes = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('exptype', '=', $exptype)
->where('approvalstate', '=', 1)
->sum('amount');
/// deleting the record
DB::table('expmonthlyexpensesreportbytypes')->where('expensetype', $exptype)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
/// inserting back the record
Expmonthlyexpensesreportbytype::Create([
  'expensetype'      => $exptype,
  // 'branch'      => $branchinact,
  'amount'         => $totalbranchexpensesfotthemonthtypes,
  'monthname'         => $monthmade,
  'yearname'         => $yearmade,
    
  'ucret' => $userid,

]);

$newexpensebywallettotal = \DB::table('madeexpenses')
->where('datemade', '=', $datemade)
//->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
->where('walletexpense', '=', $walletofexpense)
->where('approvalstate', '=', 1)
->sum('amount');
DB::table('expmonthlyexpensesreportbywallets')->where('datedone', $datemade)->where('walletname', $walletofexpense)->delete();
Expmonthlyexpensesreportbywallet::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensebywallettotal,
  'datedone'=> $datemade,
  'monthname'    => $monthmade,
  'walletname'    => $walletofexpense,
  'yearname'     => $yearmade,
]);
////////////////////////////////////////
$newexpensedailytotal = \DB::table('madeexpenses')
->where('datemade', '=', $datemade)
//->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
//->where('walletexpense', '=', $walletofexpense)
->where('approvalstate', '=', 1)
->sum('amount');
DB::table('expdailyreports')->where('datedone', $datemade)->delete();
Expdailyreport::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensedailytotal,
  'datedone'=> $datemade,
  // // 'monthname'    => $monthmade,
  // // 'walletname'    => $walletofexpense,
  // 'yearname'     => $yearmade,
]);
/////////////////////////////////////////////////////////////////////////
$transactionrefrence = \DB::table('madeexpenses')->where('id', $id)->value('incomerefrenceid');

$ggetrsummaryincome = \DB::table('incomestatementsummaries')->where('statementdate', '=', $datemade)->count();
if($ggetrsummaryincome > 0)
{
  //// getting the expenses, and other incomes
  /// expenses 
  $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datemade)->where('approvalstate', '=', 1)->sum('amount');
  $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datemade)->where('status', '=', 1)->sum('amount');

$incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netinvoiceincome');
$incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('totalcost');
$incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netsalewithoutvat');

  DB::table('incomestatementsummaries')
->where('statementdate', $datemade)
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
    $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datemade)->where('approvalstate', '=', 1)->sum('amount');
    $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datemade)->where('status', '=', 1)->sum('amount');
  
  $incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netinvoiceincome');
  $incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('totalcost');
  $incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netsalewithoutvat');
Incomestatementsummary::Create([
   
  'statementdate' => $datedone,

 'totalcost' => $incomestatementtotalcost,
  'totalsales' =>$incomestatementtotalsales,  
  'otherincomes'=> $incomestatementotherincomes,
  'expenses'=> $incomestatementexpenses,

  'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses,
    
  
   


            'ucret' => $userid,
          
        ]);
}
Incomestatementminirecord::Create([
   
    'incomerefrenceid' => $transactionrefrence,
    // 'branch' => $user->branch,
    'dateoftransaction' => $datemade,  
    'sourceoftransaction' => 4,
    'typeoftransaction'=> 2,
    'descriptionoftransaction'=> 'Expense Made',
     'transactionamount' => ($transamount),   
    'incomesourcedescription' =>  'Expense made by the company',   
      'ucret' => $userid,
            
          ]);

}


















   }/// closing if there is enough balance 
}     ///// closing its not 0
   


    
}
