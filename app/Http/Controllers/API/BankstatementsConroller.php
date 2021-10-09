<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Madeexpense;
use App\Companyincome;
use App\Accounttransaction;
use App\Incomestatementminirecord;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class BankstatementsConroller extends Controller
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
    
        
        //  return   Accounttransaction::with(['branchName','expenseName'])->latest('id')
        return   Accounttransaction::latest('id')
  
        ->where('walletinaction', 4)
       // ->where('branch', $userbranch)
      //  ->where('explevel', 1)
       ->paginate(30);
    
       
    }

  
    public function store(Request $request)
    {
       
        

       $this->validate($request,[
        'incomesource'   => 'required',
        'description'   => 'required',
        'amount'  => 'required',
        'recievingwallet'  => 'required',
        'daterecieved'  => 'required',
     ]);


     $userid =  auth('api')->user()->id;
     $dateinact = $request['daterecieved'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));


     $generalnum1 = random_int(100, 999);
     $generalnum2 = random_int(100, 999);

$reference = $generalnum1.$generalnum2;


     ////////////////////
       return Companyincome::Create([
      'incomesource' => $request['incomesource'],
       'incomereference' => $reference,
      'description' => $request['description'],
      'recievingwallet' => $request['recievingwallet'],
      'amount' => $request['amount'],
      'daterecieved' => $request['daterecieved'],
      'ucret' => $userid,
      'yearmade' => $yearmade,
      'monthmade' => $monthmade,
     
      
    
  ]);

  //// updating the shop balance

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

        $user = Companyincome::findOrFail($id);
        $addingamounton = \DB::table('companyincomes')->where('id', $id)->value('amount');
        $walletinaction = \DB::table('companyincomes')->where('id', $id)->value('recievingwallet');
        $transactionrefrence = \DB::table('companyincomes')->where('id', $id)->value('incomereference');
        $currentwalletbalanceforbank = \DB::table('expensewalets')->where('id', $walletinaction)->value('bal');
        $newwalletamount = $addingamounton+$currentwalletbalanceforbank;

       // $user->delete();
/// Updating the balance
$result = \DB::table('expensewalets')->where('id', $walletinaction)->update(['bal' =>  $newwalletamount]);
$result2 = \DB::table('companyincomes')->where('id', $id)->update(['status' =>  1]);
/// creating the transaction logs
///id, incomesource, daterecieved, amount, ucret, status, created_at, updated_at, approvedat, approvedby, description, yearmade, monthmade
$datedone = \DB::table('companyincomes')->where('id', $id)->value('daterecieved');
$transactionamount = \DB::table('companyincomes')->where('id', $id)->value('amount');
$yearmade = \DB::table('companyincomes')->where('id', $id)->value('yearmade');
$monthmade = \DB::table('companyincomes')->where('id', $id)->value('monthmade');
/// id, transactiondate, transactiontype, amount, ucret, walletinaction, accountresult, created_at, updated_at
$userid =  auth('api')->user()->id;
$transactionno = Str::random(40);


Accounttransaction::Create([
    'transactiondate' => $datedone,

    'transactiontype' => 2,
    'amount' => $addingamounton,
    'walletinaction' => $walletinaction,
    'accountresult'=> $newwalletamount,
    'ucret' => $userid,
    'description' => 'Company Cashi in',
    'yearmade' => $yearmade,
    'monthmade' => $monthmade,
    'transactionno' => $transactionno,
  
]);

$ggetrsummaryincome = \DB::table('incomestatementsummaries')->where('statementdate', '=', $datedone)->count();
if($ggetrsummaryincome > 0)
{
  //// getting the expenses, and other incomes
  /// expenses 
  $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datedone)->where('approvalstate', '=', 1)->sum('amount');
  $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datedone)->where('status', '=', 1)->sum('amount');

$incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datedone)->sum('netinvoiceincome');
$incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datedone)->sum('totalcost');
$incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datedone)->sum('netsalewithoutvat');

  DB::table('incomestatementsummaries')
->where('statementdate', $datedone)
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
    $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datedone)->where('approvalstate', '=', 1)->sum('amount');
    $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datedone)->where('status', '=', 1)->sum('amount');
  
  $incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datedone)->sum('netinvoiceincome');
  $incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datedone)->sum('totalcost');
  $incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datedone)->sum('netsalewithoutvat');
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
    'dateoftransaction' => $datedone,  
    'sourceoftransaction' => 3,
    'typeoftransaction'=> 1,
    'descriptionoftransaction'=> 'Income Recieved',
     'transactionamount' => ($addingamounton),   
    'incomesourcedescription' =>  'Money from other sources',   
      'ucret' => $userid,
            
          ]);

}

//// INCOME STATEMENT
}
