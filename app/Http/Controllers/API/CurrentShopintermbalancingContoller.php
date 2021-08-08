<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Dailyreportcode;
use App\Interimshopbalancing;
use App\Salesdetail;
use App\Currentmachinecode;
use App\Mlyrpt;

  use App\Daysummarry;

class CurrentShopintermbalancingContoller extends Controller
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

      if($userrole == '101')
      {
      return   Interimshopbalancing::with(['userbalancingBranch','branchinBalance'])->orderBy('datedone', 'Desc')
      
      // return   Interimshopbalancing::latest('id')
       //  return   Branchpayout::latest('id')
        ->where('ucret', $userid)
        ->paginate(40);
      }


      if($userrole != '101')
      {
      
      
      return   Interimshopbalancing::with(['userbalancingBranch','branchinBalance'])->orderBy('datedone', 'Desc')
      
      // return   Interimshopbalancing::latest('id')
       //  return   Branchpayout::latest('id')
         ->where('del', 0)
        ->paginate(40);
      
    }
    if($userrole == '103')
    {
    
    
    return   Interimshopbalancing::with(['userbalancingBranch','branchinBalance'])->orderBy('datedone', 'Desc')
    
    // return   Interimshopbalancing::latest('id')
     //  return   Branchpayout::latest('id')
     ->where('ucret', $userid)
      ->paginate(40);
    
  }
    }

   
    public function store(Request $request)
    {
      ////checking if the branch has fish
      $fishgame = 'fish';
      $soccer = 'soccer';
      $virtual = 'virtual';


      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $branchforaction = $request['branchnametobalance'];

    ////////////////////////////////////////////////////////


$doesthebranchhavefish = \DB::table('branchandproducts')->where('branch', $branchforaction )->where('sysname', $fishgame )->count();
$doesthebranchhavesoccer = \DB::table('branchandproducts')->where('branch', $branchforaction )->where('sysname', $soccer )->count();
$doesthebranchhavevirtual = \DB::table('branchandproducts')->where('branch', $branchforaction )->where('sysname', $virtual )->count();

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if($doesthebranchhavefish > 0 && $doesthebranchhavesoccer < 1 && $doesthebranchhavevirtual < 1)
{

/// total fish
        $branchforaction = $request['branchnametobalance'];
        $totalfishmacinesinthebranch = \DB::table('branchesandmachines')->where('branchname', '=', $branchforaction)->count();

        if($totalfishmacinesinthebranch = 1)
        {
          $this->validate($request,[
            'datedone'   => 'required  |max:191',
            'branchnametobalance'   => 'required',
          //  'reportedcash' => 'required',
        //    'bio' => 'required',
            'machineonecurrentcode'  => 'required',
            'machineonesales'  => 'required',
            'machineonepayout'  => 'required',
          //  'machineonefloat'  => 'required'
          
           ]);

           $userid =  auth('api')->user()->id;
                  $datepaid = date('Y-m-d');
                  $inpbranch = $request['branchnametobalance'];
                  $dateinq =  $request['datedone'];

  /// checking if the machine was reset
  $machineresetstatus = \DB::table('machineresets')->where('branch', $inpbranch)->where('machine', '101')->orderBy('id', 'Desc')->limit(1)->value('resetdate');
 
 
 
  if( $machineresetstatus  != $dateinq)
{

            /// getting the expenses
            $totalexpense = \DB::table('madeexpenses')->where('datemade', '=', $dateinq)->where('branch', '=', $inpbranch)->where('explevel', '=', 1)
            ->where('approvalstate', '=', 1)
            ->sum('amount');
     
        /// getting the cashin
           $totalcashin = \DB::table('couttransfers')->where('transferdate', '=', $dateinq)->where('branchto', '=', $inpbranch)->where('status', '=', 1)
     ->sum('amount');
      /// getting the cashout
            $totalcashout = \DB::table('cintransfers')->where('transferdate', '=', $dateinq)->where('branchto', '=', $inpbranch)->where('status', '=', 1)->sum('amount');
     
      /// getting the payout
            $totalpayout = \DB::table('branchpayouts')->where('datepaid', '=', $dateinq)->where('branch', '=', $inpbranch)->sum('amount');
     
     
      /// checking if a record exists for balancing
             $branchinbalanced  = \DB::table('shopbalancingrecords')->where('branch', '=', $inpbranch) ->count();
     
     ///getting the openning balance
     if($branchinbalanced > 0)
     {
     $openningbalance  = Interimshopbalancing::where('branch', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('clcash');
     }
     if($branchinbalanced < 1)
     {
     $openningbalance  = Branch::where('branchno', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('openningbalance');
     }
   
     /// working on fish sales and codes
     //gitting the days code from sles and payout

     $dateinact = $request['datedone'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));

    $machineoneopenningcode = \DB::table('currentmachinecodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('machinecode');
      







    $machineonecurrentcode = $request['machineonecurrentcode'];
    $machineonesales = $request['machineonesales'];
    $machineonepayout = $request['machineonepayout'];
    $machineonefloat = $request['machineonefloat'];
    
    
     $machineoneclosingcode = $machineonecurrentcode;
     $fishincome = ($machineoneclosingcode - $machineoneopenningcode)*500;
     $closingbalance = $openningbalance + $fishincome + $totalcashin - $totalcashout -$totalexpense -$totalpayout;
$bxn = $request['branchnametobalance'];
     /// working on todays saes and payout 
     $latestsalescode = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('salescode');
     $latestpayoutcode = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('payoutcode');
     $todayssales = $machineonesales - $latestsalescode;
     $todayspayout = $machineonepayout - $latestpayoutcode;
     DB::table('interimshopbalancings')->where('branch', $bxn)->delete();
     $colf = $fishincome + $totalcashin;
    Interimshopbalancing::Create([
           'fishincome' => $fishincome,
           'fishsales' => $todayssales,
           'fishpayout' => $todayspayout,
           'datedone' => $request['datedone'],
           'branch' => $request['branchnametobalance'],
           'scpayout' => 0,
           'scsales' =>0,
           'sctkts' => 0,
           'vsales' => 0,
           'vcan' => 0,
           'vprof' => 0,
           'vpay' => 0,
           'vtkts' => 0,
           'comment' => 'check',
           'expenses' => $totalexpense,
           'cashin'    => $totalcashin,
           'cashout'   => $totalcashout,
           'opbalance'    => $openningbalance,
           'clcash'    => $closingbalance,
           'reportedcash'   =>'0',
           'collection'   =>$colf,
           'comment'    => '0',
         
           'ucret' => $userid,
         
       ]);
     
           
      
    
}
        }}



      
    }// store close




      
 
    public function show($id)
    {
        //
    }
   
  
    
    public function update(Request $request, $id)
    {
        //
        $user = branch::findOrfail($id);

$this->validate($request,[
  'branchname'   => 'required | String |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

  
    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 
     $bxn = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('branch');
     $datedonessd = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('datedone');

        $user = Interimshopbalancing::findOrFail($id);
        $user->delete();

        // $bxn = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('branch');
        // $datedonessd = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('datedone');
       
       
//         /// deleting from the daily record
//     
DB::table('dailyreportcodes')->where('branch', $bxn)->where('datedone', $datedonessd)->delete();
DB::table('currentmachinecodes')->where('branch', $bxn)->where('datedone', $datedonessd)->delete();


    }
}
