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
use Illuminate\Support\Str;
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








     ////////////////////
       return Companyincome::Create([
      'incomesource' => $request['incomesource'],
  
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

        $currentwalletbalanceforbank = \DB::table('expensewalets')->where('id', 4)->value('bal');
        $newwalletamount = $addingamounton+$currentwalletbalanceforbank;

       // $user->delete();
/// Updating the balance
$result = \DB::table('expensewalets')->where('id', 4)->update(['bal' =>  $newwalletamount]);
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
    'walletinaction' => 4,
    'accountresult'=> $newwalletamount,
    'ucret' => $userid,
    'description' => 'Company Cashi in',
    'yearmade' => $yearmade,
    'monthmade' => $monthmade,
    'transactionno' => $transactionno,
  
]);

}
}
