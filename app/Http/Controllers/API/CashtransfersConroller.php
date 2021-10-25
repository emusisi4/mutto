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
use App\Cashtransfer;
use Carbon\Carbon;

class CashtransfersConroller extends Controller
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
    $mywallet =  auth('api')->user()->mywallet;
    $startdate = \DB::table('cashtransfertoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
    $transaction = \DB::table('cashtransfertoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('transaction');
    $enddate = \DB::table('cashtransfertoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
      
     


         if($userrole == '900' || $userrole == '100')
        {
         return  Cashtransfer::latest('id')
  
      //->where('accountinact', $mywallet)
 //     ->whereBetween('transerdate', [$startdate, $enddate])
      ->paginate(30);
    }
   
   
   
    if($userrole != '900' || $userrole != '100')
    {
      return Cashtransfer::latest('id')
      ->where('accountinact', $mywallet)
  //->where('transfertype', $transaction)
 // ->whereBetween('transerdate', [$startdate, $enddate])
 
   ->paginate(30);
}
       
    }

  
    public function store(Request $request)
    {
       
        

       $this->validate($request,[
       'cashdestination'   => 'required',
       //'cashsource' => 'required',
        'description'   => 'required',
        'amount'  => 'required',
        'daterecieved'  => 'required',
     ]);


     $userid =  auth('api')->user()->id;
     $dateinact = $request['daterecieved'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));
    
    $transactionno = Str::random(40);
     ////////////////////
     /////////////////////////////////////// transfer out 
        Cashtransfer::Create([
      'transerdate' =>  $request['daterecieved'],
  
      'accountinact' => $request['id'],
      'destination' => $request['cashdestination'],

      'amount' => $request['amount'],
      'transfertype' => 1,
      'ucret' => $userid,
      'yeardone' => $yearmade,
      'description' => 'Account Debited',
      'monthdone' => $monthmade,
      'transactionno' => $transactionno,
      
    
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
    public function detetethetransaction($id)
    {
        //
     //   $this->authorize('isAdmin'); 
     $userid =  auth('api')->user()->id;
$datenow = Carbon::now();
        $user = Cashtransfer::findOrFail($id);
        $transactionid = \DB::table('cashtransfers')->where('id', $id)->value('transactionno');
       return  DB::table('cashtransfers')->where('transactionno', $transactionid)->delete();

}
   
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 
     $userid =  auth('api')->user()->id;
$datenow = Carbon::now();
        $user = Cashtransfer::findOrFail($id);
        $transactionid = \DB::table('cashtransfers')->where('id', $id)->value('transactionno');
        $transamount = \DB::table('cashtransfers')->where('id', $id)->value('amount');
        $transdate = \DB::table('cashtransfers')->where('id', $id)->value('transerdate');
        $transactiontype = \DB::table('cashtransfers')->where('id', $id)->value('transfertype');
        $walletinaction = \DB::table('cashtransfers')->where('id', $id)->value('accountinact');
        /// getting the giving account 
        $givacct = \DB::table('cashtransfers')->where('transactionno', $transactionid)->where('transfertype', 1)->value('accountinact');
     /// recieving account
        $currentaccountbalancerecieving = \DB::table('expensewalets')->where('id', $walletinaction)->value('bal');
        $newwalletamountrecieving = $transamount+$currentaccountbalancerecieving;
   /// giving account
        $currentaccountbalancegiving = \DB::table('expensewalets')->where('id', $givacct)->value('bal');
        $newwalletamountgiving = $currentaccountbalancegiving-$transamount;
            // $user->delete();
/// Updating the balance
        $updatingthegivingaccount = \DB::table('expensewalets')->where('id', $givacct)->update(['bal' =>  $newwalletamountgiving]);
        $updatingthegettingaccount = \DB::table('expensewalets')->where('id', $walletinaction)->update(['bal' =>  $newwalletamountrecieving]);
        $result2 = \DB::table('cashtransfers')->where('transactionno', $transactionid)->update(['status' =>  1]);

        $result2 = \DB::table('cashtransfers')->where('transactionno', $transactionid)->update(['comptime' =>  $datenow]);


          $result3 = \DB::table('cashtransfers')->where('transactionno', $transactionid)->update(['ucomplete'=>  $userid]);






















/// creating the transaction logs
///id, incomesource, daterecieved, amount, ucret, status, created_at, updated_at, approvedat, approvedby, description, yearmade, monthmade
// $datedone = \DB::table('companyincomes')->where('id', $id)->value('daterecieved');
// $transactionamount = \DB::table('companyincomes')->where('id', $id)->value('amount');
// $yearmade = \DB::table('companyincomes')->where('id', $id)->value('yearmade');
// $monthmade = \DB::table('companyincomes')->where('id', $id)->value('monthmade');
/// id, transactiondate, transactiontype, amount, ucret, walletinaction, accountresult, created_at, updated_at
$userid =  auth('api')->user()->id;
//// updating the credit
Accounttransaction::Create([
    'transactiondate' => $transdate,

    'transactiontype' => 2,
    'amount' => $transamount,
    'walletinaction' => $walletinaction,
    'accountresult'=> $newwalletamountrecieving,
    'ucret' => $userid,
    'description' => 'Cash Recieved',
    //'yearmade' => $yearmade,
   // 'monthmade' => $monthmade,
    
  
]);

//// updating the debit
Accounttransaction::Create([
  'transactiondate' => $transdate,

  'transactiontype' => 1,
  'amount' => $transamount,
  'walletinaction' => $givacct,
  'accountresult'=> $newwalletamountgiving,
  'ucret' => $userid,
  'description' => 'Cash given out',
  //'yearmade' => $yearmade,
 // 'monthmade' => $monthmade,
  

]);

}
}
