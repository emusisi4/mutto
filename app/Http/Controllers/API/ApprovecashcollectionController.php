<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Cintransfer;
use App\Branchcashstanding;
use Illuminate\Support\Str;
use App\Accounttransaction;
use App\Anewccounttransaction;
class ApprovecashcollectionController extends Controller
{
    
    
    public function __construct()
    {
       $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }

    public function index()
    {
      //$userid =  auth('api')->user()->id;
     // $userbranch =  auth('api')->user()->branch;
      //$userrole =  auth('api')->user()->type;
     //   if($userrole = 1)





       // return Student::all();
     //  return   Submheader::with(['maincomponentSubmenus'])->latest('id')
       // return   MainmenuList::latest('id')
     //    ->where('del', 0)
         //->paginate(15)
     //    ->get();


      
        return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails'])->latest('id')
       //  return   Cintransfer::latest('id')
      // return   Madeexpense::latest('id')
        ->where('del', 0)
       ->paginate(13);

       //  return Submheader::latest()
         //  -> where('ucret', $userid)
           

    //   return   Cintransfer::get()->count();








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



       $this->validate($request,[
        'branchnametobalance'   => 'required | String |max:191',
        'description'   => 'required',
        'amount'  => 'required',
        'transferdate'  => 'required',
      
       // 'expensetype'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     //$hid = $id1+1;



    ////
  
     
  //       $dats = $id;
       return Cintransfer::Create([
      'branchto' => $request['branchnametobalance'],
      'branchfrom' => $userbranch,
      'description' => $request['description'],
      'amount' => $request['amount'],
      'transferdate' => $request['transferdate'],
      
 
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
      $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch; 
      
 //       $mywallet =  auth('api')->user()->mywallet;
/////// checking if the branch exists in the cash details

$currentdate = date("Y-m-d H:i:s");

$walletincollection = \DB::table('cashtransfers')->where('id', '=', $id)->value('accountinact');
$recievingwallet = \DB::table('cashtransfers')->where('id', '=', $id)->value('destination');
$transactionamount = \DB::table('cashtransfers')->where('id', '=', $id)->value('amount');
$newtrans = \DB::table('cashtransfers')->where('id', '=', $id)->value('transactionno');
$transactiondate  = \DB::table('cashtransfers')->where('id', '=', $id)->value('transerdate');

$monthmade = \DB::table('cashtransfers')->where('id', '=', $id)->value('monthdone');
$yearmade  = \DB::table('cashtransfers')->where('id', '=', $id)->value('yeardone');


/// getting the branch with that wallet
$branchwithwalletcollection = \DB::table('expensewalets')->where('id', '=', $walletincollection)->value('branchname');
$branchwithwalletrecieving = \DB::table('expensewalets')->where('id', '=', $recievingwallet)->value('branchname');
/// getting the current balances

$currentstandingithwalletcollection = \DB::table('expensewalets')->where('id', '=', $walletincollection)->value('bal');
$currentstandingwithwalletrecieving = \DB::table('expensewalets')->where('id', '=', $recievingwallet)->value('bal');

/// checking the rtransaction status 
$transactionstatus = \DB::table('cashtransfers')->where('id', '=', $id)->value('status');

$cantransactionprocess = $currentstandingithwalletcollection - $transactionamount;

$collectionaccountaccountbalance = $currentstandingithwalletcollection - $transactionamount;
$recievingaccountaccountbalance = $currentstandingwithwalletrecieving+$transactionamount;
if($transactionstatus == 0 && $cantransactionprocess >= 0)
{
  DB::table('cashtransfers')
->where('id', $id)
->update(['status' => '1', 'comptime' => $currentdate, 'ucomplete' => $userid]);

/// Updating the wallet balance for releasing account
DB::table('expensewalets')
->where('id', $walletincollection)
->update(['bal' => $collectionaccountaccountbalance]);
/// Updating the wallet balance for recieving account
DB::table('expensewalets')
->where('id', $recievingwallet)
->update(['bal' => $recievingaccountaccountbalance]);


// branch standing 
/// Updating the wallet balance for releasing account
DB::table('branchcashstandings')->where('branch', $branchwithwalletcollection)->update(['outstanding' => $collectionaccountaccountbalance]);
/// Updating the wallet balance for recieving account
DB::table('branchcashstandings')->where('branch', $branchwithwalletrecieving)->update(['outstanding' => $recievingaccountaccountbalance]);

///// TRansaction Statement Update
/// Updating for releasing account
Anewccounttransaction::Create([
  'transactiondate' => $transactiondate,
  'transactionno' => $newtrans,
  'transactiontype' => 1,
  'amount' => $transactionamount,
  'walletinaction' => $walletincollection,
  'accountresult'=> $collectionaccountaccountbalance,
  'ucret' => $userid,
  'monthmade' => $monthmade,
  'yearmade'=> $yearmade,
  'description' => 'Cash collection done',
]);
//// Working on the credit section
Anewccounttransaction::Create([
  'transactiondate' => $transactiondate,
  'transactionno' => $newtrans,
  'transactiontype' => 2,
  'amount' => $transactionamount,
  'walletinaction' => $recievingwallet,
  'accountresult'=> $recievingaccountaccountbalance,
  'ucret' => $userid,
  'monthmade' => $monthmade,
  'yearmade'=> $yearmade,
  'description' => 'Cash Credited from Collection',
]);
}
 }




    

    
}
