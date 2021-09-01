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
use App\Cintransfer;
use App\Couttransfer;
use App\Madeexpense;
class CashCollectionController extends Controller
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
     
    
     if($userrole == '101')
     {      
      
        return   Couttransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName'])->latest('datedone')
       //  return   Cintransfer::latest('id')
      // return   Madeexpense::latest('id')
      ->where('branchto', $userbranch)
       ->paginate(20);
     }

     if($userrole == '103')
     {      
       
      $branch = DB::table('monthlyreporttoviews')->where('ucret', $userid)->value('branchname');
      if($branch == '900')
       { return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName'])->latest('id')
       //  return   Cintransfer::latest('id')
      // return   Madeexpense::latest('id')
      ->where('ucret', $userid)
       ->paginate(20);
      }
      if($branch != '900')
       { return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName'])->latest('id')
       //  return   Cintransfer::latest('id')
      // return   Madeexpense::latest('id')
      ->where('branchto', $branch)
       ->paginate(20);
      }
     }
     
     
     if($userrole != '101' && $userrole != '103')
     {      
        return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName'])->latest('id')
       //  return   Cintransfer::latest('id')
      // return   Madeexpense::latest('id')
      // ->where('branchto', $userbranch)
       ->paginate(25);





       $branch = DB::table('monthlyreporttoviews')->where('ucret', $userid)->value('branchname');
       if($branch == '900')
        { return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName'])->latest('id')
        //  return   Cintransfer::latest('id')
       // return   Madeexpense::latest('id')
      //  ->where('ucret', $userid)
        ->paginate(20);
       }
       if($branch != '900')
        { return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName'])->latest('id')
        //  return   Cintransfer::latest('id')
       // return   Madeexpense::latest('id')
       ->where('branchto', $branch)
        ->paginate(20);
       }

























     }
    
     

      
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

     $dateinact = $request['transferdate'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));


     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     //$hid = $id1+1;

  
     
  //       $dats = $id;
        Cintransfer::Create([
      'branchto' => $request['branchnametobalance'],
      'branchfrom' => $userbranch,
      'description' => $request['description'],
      'amount' => $request['amount'],
      'transferdate' => $request['transferdate'],
      'monthmade' =>  $monthmade,
      'yearmade' =>  $yearmade,
      
 
      'ucret' => $userid,

    
    
  ]);



  /////////////////////// adding the expensse
  ///id, expense, amount, datemade, ucret, branch, description, approvalstate, del, created_at, updated_at, explevel, walletexpense, category, exptype, monthmade, yearmade
  Madeexpense::Create([
    'branch' => $request['branchnametobalance'],
    'expense' => 34,
    'description' => 'Deposit Charge',
    'amount' => 1000,
    'datemade' => $request['transferdate'],
    'explevel' =>'2',
    'walletexpense'=> '1',
    'category'  => '8',
    'exptype'  => '2',
    'monthmade' =>  $monthmade,
    'yearmade' =>  $yearmade,
    

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
        //
     //   $this->authorize('isAdmin'); 

        $user = Cintransfer::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }



}
