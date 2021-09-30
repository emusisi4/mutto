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
      'ucret' => $userid,
    
  ]);
$walletofexpense = $request['walletexpense'];
  /// updating the Monthly Expenses 
  $brancchssjh = $request['branch'];
  DB::table('expmothlyexpensereports')->where('branch', $brancchssjh)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
  // extracting the new sales figure for the  month
$newexpensesamount = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('amount');

 // insertion query
 Expmothlyexpensereport::Create([

  'branch'       => $brancchssjh,

  'ucret'   => $userid,
 
  'amount'=> $newexpensesamount,
 
  'monthname'    => $monthmade,
  'yearname'     => $yearmade,

]);
/////////////////////////////////////////////////////////////////////////////
$datedonessd = $request['datemade'];
$dateinact = $request['datemade'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));
/////month and year report
$newexpensesmonthandyear = \DB::table('madeexpenses')
///->where('datemade', '=', $datedonessd)
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
//->where('category', '=', $expcat)
->where('approvalstate', '=', 1)
->sum('amount');








$newexpensesbycategoryformonthandyear = \DB::table('madeexpenses')
->where('datemade', '=', $datedonessd)
//->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
->where('category', '=', $expcat)
->where('approvalstate', '=', 1)
->sum('amount');



$newexpensesbytypeformonthandyear = \DB::table('madeexpenses')
// ->where('datemade', '=', $datedonessd)
->where('datemade', '=', $datedonessd)
////->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
->where('exptype', '=', $exptyo)
->where('approvalstate', '=', 1)
->sum('amount');

$newexpensesbywalletformonthandyear = \DB::table('madeexpenses')
//->where('datemade', '=', $datedonessd)
//->where('walletofexpense', '=', $walletofexpense)
->where('approvalstate', '=', 1)
->sum('amount');



$newexpensebywallettotal = \DB::table('madeexpenses')
->where('datemade', '=', $datedonessd)
//->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
->where('walletexpense', '=', $walletofexpense)
->where('approvalstate', '=', 1)
->sum('amount');





$newexpensedailytotal = \DB::table('madeexpenses')
->where('datemade', '=', $datedonessd)
//->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
//->where('walletexpense', '=', $walletofexpense)
//->where('approvalstate', '=', 1)
->sum('amount');




















//////////////////////////////////////////////////////////////////////////////
/// General Expenses Summary
DB::table('generalexpensereportsummarries')->where('monthname', $monthmade)->where('yearname', $yearmade)->delete();
Generalexpensereportsummarry::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensesmonthandyear,
  'monthname'    => $monthmade,
  'yearname'     => $yearmade,
]);
///id, expensecategory, monthname, yearname, ucret, created_at, updated_at, amount, datedone
/// Daily expenses and category
/// CategoryGeneral Expenses Summary
DB::table('expmonthlyexpensesreportbycategories')->where('datedone', $datedonessd)->where('expensecategory', $expcat)->delete();
Expmonthlyexpensesreportbycategory::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensesbycategoryformonthandyear,
  'datedone'=> $datedonessd,
  'monthname'    => $monthmade,
  'expensecategory'    => $expcat,
  'yearname'     => $yearmade,
]);


///////////////////
DB::table('expmonthlyexpensesreportbytypes')->where('datedone', $datedonessd)->where('expensetype', $exptyo)->delete();
Expmonthlyexpensesreportbytype::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensesbytypeformonthandyear,
  'datedone'=> $datedonessd,
  'monthname'    => $monthmade,
  'expensetype'    => $exptyo,
  'yearname'     => $yearmade,
]);
//////////////////
DB::table('expmonthlyexpensesreportbywallets')->where('datedone', $datedonessd)->where('walletname', $walletofexpense)->delete();
Expmonthlyexpensesreportbywallet::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensebywallettotal,
  'datedone'=> $datedonessd,
  'monthname'    => $monthmade,
  'walletname'    => $walletofexpense,
  'yearname'     => $yearmade,
]);
////////////////////////////////////////
DB::table('expdailyreports')->where('datedone', $datedonessd)->delete();
Expdailyreport::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensedailytotal,
  'datedone'=> $datedonessd,
  // // 'monthname'    => $monthmade,
  // // 'walletname'    => $walletofexpense,
  // 'yearname'     => $yearmade,
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
//->where('approvalstate', '=', 1)
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

   }/// closing if there is enough balance 
}     ///// closing its not 0
   

















      //   $user = Madeexpense::findOrFail($id);
      //   $user->delete();
      //  // return['message' => 'user deleted'];



    }
}
