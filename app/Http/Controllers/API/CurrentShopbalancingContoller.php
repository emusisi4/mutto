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
use App\Shopbalancingrecord;
use App\Salesdetail;
use App\Branchandcode;
use App\Currentmachinecode;
use App\Mlyrpt;

  use App\Daysummarry;

class CurrentShopbalancingContoller extends Controller
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
      return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->orderBy('datedone', 'Desc')
      
      // return   Shopbalancingrecord::latest('id')
       //  return   Branchpayout::latest('id')
        ->where('ucret', $userid)
        ->paginate(40);
      }


      if($userrole != '101')
      {
      
      
      return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->orderBy('datedone', 'Desc')
      
      // return   Shopbalancingrecord::latest('id')
       //  return   Branchpayout::latest('id')
         ->where('del', 0)
        ->paginate(40);
      
    }
    if($userrole == '103')
    {
    
    
    return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->orderBy('datedone', 'Desc')
    
    // return   Shopbalancingrecord::latest('id')
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


      /// checking if the branch has a machine code set for it
      $doesthebranchhaveacdelock = \DB::table('branchandcodes')->where('branch', $branchforaction )->count();
if($doesthebranchhaveacdelock > 0)
     {
$machinefloatcodelastloaded  = Branchandcode::where('branch', $branchforaction)->orderBy('id', 'Desc')->limit(1)->value('floatcode');
} 
if($doesthebranchhaveacdelock < 1) 
{
  $machinefloatcodelastloaded = '-';
}    //     
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
            'reportedcash' => 'required',
            'bio' => 'required',
            'machineonecurrentcode'  => 'required',
            'machineonesales'  => 'required',
            'machineonepayout'  => 'required',
            'machineonefloat'  => 'required'
          
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
     $openningbalance  = Shopbalancingrecord::where('branch', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('clcash');
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
      
///// Getting the machine multiplier
$multiplier = \DB::table('branchesandmachines')->where('branchname', $inpbranch)->where('machinename', '101')->orderBy('id', 'Desc')->limit(1)->value('machinmultiplier');






    $machineonecurrentcode = $request['machineonecurrentcode'];
    $machineonesales = $request['machineonesales'];
    $machineonepayout = $request['machineonepayout'];
    $machineonefloat = $request['machineonefloat'];
    
    
     $machineoneclosingcode = $machineonecurrentcode;
     $fishincome = ($machineoneclosingcode - $machineoneopenningcode)*$multiplier;
     $closingbalance = $openningbalance + $fishincome + $totalcashin - $totalcashout -$totalexpense -$totalpayout;

     /// working on todays saes and payout 
     $latestsalescode = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('salescode');
     $latestpayoutcode = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('payoutcode');
     $todayssales = $machineonesales - $latestsalescode;
     $todayspayout = $machineonepayout - $latestpayoutcode;
    Shopbalancingrecord::Create([
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
           'comment' => $request['comment'],
           'expenses' => $totalexpense,
           'cashin'    => $totalcashin,
           'cashout'   => $totalcashout,
           'opbalance'    => $openningbalance,
           'clcash'    => $closingbalance,
           'reportedcash'    => $request['reportedcash'],
           'comment'    => $request['bio'],
           'multiplier' => $multiplier,
           'ucret' => $userid,
         
       ]);
       //// Saving the current machinecodes
       Currentmachinecode::Create([
        'machineno' => '101',
        'datedone' => $request['datedone'],
        'branch' => $request['branchnametobalance'],
        'machinecode' => $machineoneclosingcode,
        'ucret' => $userid,
      
    ]);
    //ooooooooooooooooooooooooooooooooooooooooooooooooooooooo
/// working and Updating the daily Codes
    /////////////////////////////////////////// checking if there is a sale or payout
    $existpreviouswork = \DB::table('dailyreportcodes')->where('branch', '=', $inpbranch)->where('machineno', '=', 101)->count();
   //  //latest sales
   
   //    $resetcodestatus = \DB::table('dailyreportcodes')->where('branch', '=', $inpbranch)
   //      ->where('machineno', '=', 101)
   //      ->where('resetstatus', '=', 1)
   //      ->count();
       if($existpreviouswork > 0)
       {
      $previoussalesfigure = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('salescode');
      $previouspayoutfigure = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('payoutcode');
       }
       if($existpreviouswork < 1)
       {
         $previoussalesfigure = 0;
         $previouspayoutfigure = 0;
       }
   //      if($resetcodestatus > 0)
   //        $previoussalesfigure = 0;
   //    $previouspayoutfigure = 0;
 
    
   //  if($existpreviouswork < 1)
   //  {
   //    $previoussalesfigure = 0;
   //    $previouspayoutfigure = 0;
    
   //  }
    //00000000000000000000000000000000000000000000000000000000000000000


/// calculating the current or dayz sales and payout
$todayssaes1 = $machineonesales - $previoussalesfigure;
$todayspayout11 = $machineonepayout - $previouspayoutfigure;
if($todayssaes1 >= 0)
{
$todayssaes = $todayssaes1;
}
if($todayssaes1 < 0)
{
$todayssaes = $machineonesales;
}
//
if($todayspayout11 >= 0)
{
$todayspayout = $todayspayout11;
}
if($todayspayout11 < 0)
{
$todayspayout = $machineonepayout;
}
///// getting the branch order
$dorder = \DB::table('branches')->where('id', '=', $userbranch)->count('dorder');
/// deleting the existing record
$bxn = $request['branchnametobalance'];
$datedonessd = $request['datedone'];
DB::table('dailyreportcodes')->where('branch', $bxn)->where('datedone', $datedonessd)->where('machineno', 101)->delete();
// $totalcollection = \DB::table('cintransfers')
   
//     ->where('branchto', '=', $bxn)
//     ->where('transferdate', '=', $datedonessd)
//     ->where('status', '=', 1)
   
//     ->sum('amount');
     
//     ////
//     $totalcredits = \DB::table('couttransfers')
   
//     ->where('branchto', '=', $bxn)
//     ->where('transferdate', '=', $datedonessd)
//     ->where('status', '=', 1)
   
//     ->sum('amount');

    /// working and Updating the daily Codes
    Dailyreportcode::Create([
      'machineno'    => '101',
      'datedone'     => $request['datedone'],
      'branch'       => $request['branchnametobalance'],
      'closingcode'  => $machineoneclosingcode,
      'floatcode'    => $request['machineonefloat'],
      'openningcode' =>    $machineoneopenningcode,
      'salescode'    =>    $machineonesales,
      'payoutcode'   =>    $machineonepayout,
      'profitcode'   =>    $machineonesales-$machineonepayout,
      'previoussalesfigure'  =>    $previoussalesfigure,
      'previouspayoutfigure' =>    $previouspayoutfigure,
      'currentpayoutfigure'  =>    $todayspayout,
      'currentsalesfigure'   =>    $todayssaes,
      'dorder'  =>    $dorder,
      'ucret'   => $userid,
      'totalcollection' => $totalcashout,
      'totalcredits'=> $totalcashin,
      'daysalesamount' => $todayssaes*$multiplier,
      'daypayoutamount' => $todayspayout*$multiplier,
      'monthmade'    => $monthmade,
      'multiplier' => $multiplier,
      'machineunlockcode' => $machinefloatcodelastloaded,
      'yearmade'     => $yearmade,
    
    ]);

//// checking if the branch exists in the monthlyreport view
// //$branchinmonthlyreport = \DB::table('mlyrpts')->where('branch', $branchforaction)->where('yeardone', $yearmade)->where('monthdone', $monthmade)->count();
// //if($branchinmonthlyreport > 0)
// {
// /// update query
// $brancchssjh = $request['branchnametobalance'];

// // extracting the new sales figure for the  month
// $newsalesfigure = \DB::table('dailyreportcodes')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branch', '=', $brancchssjh)
// ->sum('daysalesamount');
// /// new payout figure
// $newspayoutfigure = \DB::table('dailyreportcodes')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branch', '=', $brancchssjh)
// ->sum('daypayoutamount');

// /// new collections figure
// $newcollectionsfigure = \DB::table('cintransfers')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branchto', '=', $brancchssjh)
// ->where('status', '=', 1)
// ->sum('amount');
// /// new credits figure
// $newcreditsfigure = \DB::table('couttransfers')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branchto', '=', $brancchssjh)
// ->where('status', '=', 1)
// ->sum('amount');
// /// new expenses figure
// $newexpensesfigure = \DB::table('madeexpenses')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branchto', '=', $brancchssjh)
// ->where('status', '=', 1)
// ->sum('amount');
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

// }

//if($branchinmonthlyreport < 1)
{
  // //$branchinmonthlyreport = \DB::table('mlyrpts')->where('branch', $branchforaction)->where('yeardone', $yearmade)->where('monthdone', $monthmade)->count();

  $brancchssjh = $request['branchnametobalance'];
  DB::table('mlyrpts')->where('branch', $brancchssjh)->where('yeardone', $yearmade)->where('monthdone', $monthmade)->delete();
  // extracting the new sales figure for the  month
$newsalesfigure = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('daysalesamount');
/// new payout figure
$newspayoutfigure = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('daypayoutamount');

/// new collections figure
$newcollectionsfigure = \DB::table('cintransfers')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branchto', '=', $brancchssjh)
->where('status', '=', 1)
->sum('amount');
/// new credits figure
$newcreditsfigure = \DB::table('couttransfers')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branchto', '=', $brancchssjh)
->where('status', '=', 1)
->sum('amount');
/// new expenses figure
$newexpensesfigure = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->where('approvalstate', '=', 1)
->sum('amount');


  // insertion query
  Mlyrpt::Create([

    'branch'       => $brancchssjh,
 
    'dorder'  =>    $dorder,
    'ucret'   => $userid,
    'sales' => $newsalesfigure,
    'payout'=> $newspayoutfigure,
    'collections' => $newcollectionsfigure,
    'credits' => $newcreditsfigure,
    'expenses' => $newexpensesfigure,
    'profit' => $newsalesfigure-$newspayoutfigure,
    'ntrevenue'  => $newsalesfigure-$newspayoutfigure-$newexpensesfigure,
    'monthdone'    => $monthmade,
    'yeardone'     => $yearmade,
  
  ]);


}

///// working the dailysummary
$datedonessd = $request['datedone'];
// sales summary
$newsalesasummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('daysalesamount');
$newpayoutsummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('daypayoutamount');
//////////////////////////////////////////////////////////////////////////////
DB::table('daysummarries')->where('datedone', $datedonessd)->delete();
    
Daysummarry::Create([
  'salesamount'      => $newsalesasummaryfortheday,
  'datedone'       => $datedonessd,
  'payoutamount'         => $newpayoutsummaryfortheday,
  'yeardone'         => $monthmade,
  'monthdone'         => $yearmade,
    
  'ucret' => $userid,

]);





    ///// Updating the collection and credits 


    
    DB::table('salesdetails')->where('branch', $bxn)->where('datedone', $datedonessd)->where('machineno', 101)->delete();
    
    Salesdetail::Create([
      'machineno'      => '101',
      'datedone'       => $request['datedone'],
      'branch'         => $request['branchnametobalance'],
      
      'previoussalesfigure' => $previoussalesfigure,
      'previouspayoutfigure' => $previouspayoutfigure,
    
      'currentsalesfigure'   =>    $machineonesales,
      'currentpayoutfigure'   =>   $machineonepayout,
    
      'salesamount'    =>    ($machineonesales - $machineonepayout)*$multiplier,
      'salesfigure'    =>    $machineonesales - $machineonepayout,
      //'payoutamount'    =>    ($machineonepayout - $machineonepayout)*500,
      'monthmade'    => $monthmade,
      'yearmade'    => $yearmade,
      'daysalesamount' => $todayssaes*$multiplier,
      'daypayoutamount' => $todayspayout*$multiplier,
      
      
      'ucret' => $userid,
    
    ]);
//// updatind the branch statement 
// $currentclosingbalance = \DB::table('branchstatements')->where('branchname', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('closingbalance');
// Salesdetail::Create([
 
//   'datedone'       => $request['datedone'],
//   'branchname'         => $request['branchnametobalance'],
  
//   'previoussalesfigure' => $previoussalesfigure,
//   'previouspayoutfigure' => $previouspayoutfigure,

//   'currentsalesfigure'   =>    $machineonesales,
//   'currentpayoutfigure'   =>   $machineonepayout,

//   'salesamount'    =>    ($machineonesales - $machineonepayout)*500,
//   'salesfigure'    =>    $machineonesales - $machineonepayout,

//   'monthmade'    => $monthmade,
//   'yearmade'    => $yearmade,
  
  
//   'ucret' => $userid,

// ]);
}// closing if the machine was not reset 

        }/// closing if its one Machine

}//closing if the branch sales a product fish only

/////////////////////////////////////////tttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt/////////////////////////////
// if($doesthebranchhavefish = 1 && $doesthebranchhavesoccer = 1 && $doesthebranchhavevirtual = 1)
// {

// /// total fish
//         $branchforaction = $request['branchnametobalance'];
//         $totalfishmacinesinthebranch = \DB::table('branchesandmachines')->where('branchname', '=', $branchforaction)->count();

//         if($totalfishmacinesinthebranch = 1)
//         {
//           $this->validate($request,[
            
//             'datedone'   => 'required  |max:191',
//             'branchnametobalance'   => 'required',
//             'reportedcash' => 'required',
//             'bio' => 'required',
//             'machineonecurrentcode'  => 'required',
//             'machineonesales'  => 'required',
//             'machineonepayout'  => 'required',
//             'machineonefloat'  => 'required'
          
//            ]);

//            $userid =  auth('api')->user()->id;
//                   $datepaid = date('Y-m-d');
//                   $inpbranch = $request['branchnametobalance'];
//                   $dateinq =  $request['datedone'];

//   /// checking if the machine was reset
//   $machineresetstatus = \DB::table('machineresets')->where('branch', $inpbranch)->where('machine', '101')->orderBy('id', 'Desc')->limit(1)->value('resetdate');
//   if( $machineresetstatus  != $dateinq)
// {

//             /// getting the expenses
//             $totalexpense = \DB::table('madeexpenses')->where('datemade', '=', $dateinq)->where('branch', '=', $inpbranch)->where('explevel', '=', 1)
//             ->where('approvalstate', '=', 1)
//             ->sum('amount');
     
//         /// getting the cashin
//            $totalcashin = \DB::table('couttransfers')->where('transferdate', '=', $dateinq)->where('branchinact', '=', $inpbranch)->where('status', '=', 1)
//      ->sum('amount');
//       /// getting the cashout
//             $totalcashout = \DB::table('cintransfers')->where('transferdate', '=', $dateinq)->where('branchinact', '=', $inpbranch)->where('status', '=', 1)->sum('amount');
     
//       /// getting the payout
//             $totalpayout = \DB::table('branchpayouts')->where('datepaid', '=', $dateinq)->where('branch', '=', $inpbranch)->sum('amount');
     
     
//       /// checking if a record exists for balancing
//              $branchinbalanced  = \DB::table('shopbalancingrecords')->where('branch', '=', $inpbranch) ->count();
     
//      ///getting the openning balance
//      if($branchinbalanced > 0)
//      {
//      $openningbalance  = Shopbalancingrecord::where('branch', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('clcash');
//      }
//      if($branchinbalanced < 1)
//      {
//      $openningbalance  = Branch::where('branchno', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('openningbalance');
//      }
   
//      /// working on fish sales and codes
//      //gitting the days code from sles and payout

//      $dateinact = $request['datedone'];
//      $yearmade = date('Y', strtotime($dateinact));
//      $monthmade = date('m', strtotime($dateinact));

//     $machineoneopenningcode = \DB::table('currentmachinecodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('machinecode');
      







//     $machineonecurrentcode = $request['machineonecurrentcode'];
//     $machineonesales = $request['machineonesales'];
//     $machineonepayout = $request['machineonepayout'];
//     $machineonefloat = $request['machineonefloat'];
    
    
//      $machineoneclosingcode = $machineonecurrentcode;
//      $fishincome = ($machineoneclosingcode - $machineoneopenningcode)*500;
//      $closingbalance = $openningbalance + $fishincome + $totalcashin - $totalcashout -$totalexpense -$totalpayout;
//     Shopbalancingrecord::Create([
//            'fishincome' => $fishincome,
//            'fishsales' => $machineonesales,
//            'fishpayout' => $machineonepayout,
//            'datedone' => $request['datedone'],
//            'branch' => $request['branchnametobalance'],
//            'scpayout' => 0,
//            'scsales' =>0,
//            'sctkts' => 0,
//            'vsales' => 0,
//            'vcan' => 0,
//            'vprof' => 0,
//            'vpay' => 0,
//            'vtkts' => 0,
//            'comment' => $request['comment'],
//            'expenses' => $totalexpense,
//            'cashin'    => $totalcashin,
//            'cashout'   => $totalcashout,
//            'opbalance'    => $openningbalance,
//            'clcash'    => $closingbalance,
//            'reportedcash'    => $request['reportedcash'],
//            'comment'    => $request['bio'],
         
//            'ucret' => $userid,
         
//        ]);
//        //// Saving the current machinecodes
//        Currentmachinecode::Create([
//         'machineno' => '101',
//         'datedone' => $request['datedone'],
//         'branch' => $request['branchnametobalance'],
//         'machinecode' => $machineoneclosingcode,
//         'ucret' => $userid,
      
//     ]);
//     //ooooooooooooooooooooooooooooooooooooooooooooooooooooooo
// /// working and Updating the daily Codes
//     /////////////////////////////////////////// checking if there is a sale or payout
//     $existpreviouswork = \DB::table('dailyreportcodes')->where('branch', '=', $inpbranch)->where('machineno', '=', 101)->count();
//    //  //latest sales
   
//    //    $resetcodestatus = \DB::table('dailyreportcodes')->where('branch', '=', $inpbranch)
//    //      ->where('machineno', '=', 101)
//    //      ->where('resetstatus', '=', 1)
//    //      ->count();
//        if($existpreviouswork > 0)
//        {
//       $previoussalesfigure = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('salescode');
//       $previouspayoutfigure = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('payoutcode');
//        }
//        if($existpreviouswork < 1)
//        {
//          $previoussalesfigure = 0;
//          $previouspayoutfigure = 0;
//        }
//    //      if($resetcodestatus > 0)
//    //        $previoussalesfigure = 0;
//    //    $previouspayoutfigure = 0;
 
    
//    //  if($existpreviouswork < 1)
//    //  {
//    //    $previoussalesfigure = 0;
//    //    $previouspayoutfigure = 0;
    
//    //  }
//     //00000000000000000000000000000000000000000000000000000000000000000


// /// calculating the current or dayz sales and payout
// $todayssaes1 = $machineonesales - $previoussalesfigure;
// $todayspayout11 = $machineonepayout - $previouspayoutfigure;
// if($todayssaes1 >= 0)
// {
// $todayssaes = $todayssaes1;
// }
// if($todayssaes1 < 0)
// {
// $todayssaes = $machineonesales;
// }
// //
// if($todayspayout11 >= 0)
// {
// $todayspayout = $todayspayout11;
// }
// if($todayspayout11 < 0)
// {
// $todayspayout = $machineonepayout;
// }
// ///// getting the branch order
// $dorder = \DB::table('branches')->where('id', '=', $userbranch)->count('dorder');
// /// deleting the existing record
// $bxn = $request['branchnametobalance'];
// $datedonessd = $request['datedone'];
// DB::table('dailyreportcodes')->where('branch', $bxn)->where('datedone', $datedonessd)->where('machineno', 101)->delete();


//     /// working and Updating the daily Codes
//     Dailyreportcode::Create([
//       'machineno'    => '101',
//       'datedone'     => $request['datedone'],
//       'branch'       => $request['branchnametobalance'],
//       'closingcode'  => $machineoneclosingcode,
    
//       'openningcode' =>    $machineoneopenningcode,
//       'salescode'    =>    $machineonesales,
//       'payoutcode'   =>    $machineonepayout,
//       'profitcode'   =>    $machineonesales-$machineonepayout,
//       'previoussalesfigure'  =>    $previoussalesfigure,
//       'previouspayoutfigure' =>    $previouspayoutfigure,
//       'currentpayoutfigure'  =>    $todayspayout,
//       'currentsalesfigure'   =>    $todayssaes,
//       'dorder'  =>    $dorder,
//       'ucret'   => $userid,
//       'monthmade'    => $monthmade,
//       'yearmade'     => $yearmade,
    
//     ]);
    
   
    
//     Salesdetail::Create([
//       'machineno'      => '101',
//       'datedone'       => $request['datedone'],
//       'branch'         => $request['branchnametobalance'],
      
//       'previoussalesfigure' => $previoussalesfigure,
//       'previouspayoutfigure' => $previouspayoutfigure,
    
//       'currentsalesfigure'   =>    $machineonesales,
//       'currentpayoutfigure'   =>   $machineonepayout,
    
//       'salesamount'    =>    ($machineonesales - $machineonepayout)*500,
//       'salesfigure'    =>    $machineonesales - $machineonepayout,
    
//       'monthmade'    => $monthmade,
//       'yearmade'    => $yearmade,
      
      
//       'ucret' => $userid,
    
//     ]);
// //// updatind the branch statement 
// // $currentclosingbalance = \DB::table('branchstatements')->where('branchname', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('closingbalance');
// // Salesdetail::Create([
 
// //   'datedone'       => $request['datedone'],
// //   'branchname'         => $request['branchnametobalance'],
  
// //   'previoussalesfigure' => $previoussalesfigure,
// //   'previouspayoutfigure' => $previouspayoutfigure,

// //   'currentsalesfigure'   =>    $machineonesales,
// //   'currentpayoutfigure'   =>   $machineonepayout,

// //   'salesamount'    =>    ($machineonesales - $machineonepayout)*500,
// //   'salesfigure'    =>    $machineonesales - $machineonepayout,

// //   'monthmade'    => $monthmade,
// //   'yearmade'    => $yearmade,
  
  
// //   'ucret' => $userid,

// // ]);
// }// closing if the machine was not reset 

//         }/// closing if its one Machine

// }//closing if the branch sales a product fish only


////////////////////// fish an virtual

if($doesthebranchhavefish > 0 && $doesthebranchhavesoccer < 1 && $doesthebranchhavevirtual > 0)
{

/// total fish
        $branchforaction = $request['branchnametobalance'];
        $totalfishmacinesinthebranch = \DB::table('branchesandmachines')->where('branchname', '=', $branchforaction)->count();

        if($totalfishmacinesinthebranch = 1)
        {
          $this->validate($request,[
            'datedone'   => 'required  |max:191',
            'branchnametobalance'   => 'required',
            'reportedcash' => 'required',
            'bio' => 'required',
            'machineonecurrentcode'  => 'required',
            'machineonesales'  => 'required',
            'machineonepayout'  => 'required',
            'vpay'  => 'required',
            'vsales'  => 'required',
            'vcan'  => 'required',
            'machineonefloat'  => 'required'
          
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
     $openningbalance  = Shopbalancingrecord::where('branch', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('clcash');
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
      
///// Getting the machine multiplier
$multiplier = \DB::table('branchesandmachines')->where('branchname', $inpbranch)->where('machinename', '101')->orderBy('id', 'Desc')->limit(1)->value('machinmultiplier');






    $machineonecurrentcode = $request['machineonecurrentcode'];
    $machineonesales = $request['machineonesales'];
    $machineonepayout = $request['machineonepayout'];
    $machineonefloat = $request['machineonefloat'];
    
    
     $machineoneclosingcode = $machineonecurrentcode;
     $fishincome = ($machineoneclosingcode - $machineoneopenningcode)*$multiplier;






/// working on the virual 
$virtualsales = $request['vsales'];
$virtualcancelled = $request['vcan'];
$virtualpayout = $request['vpay'];
$virtualtickets = $request['vtkts'];
$netvirtualprofit = $virtualsales - $virtualcancelled - $virtualpayout;







     $closingbalance = $openningbalance + $netvirtualprofit + $fishincome + $totalcashin - $totalcashout -$totalexpense -$totalpayout;

     /// working on todays saes and payout 
     $latestsalescode = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('salescode');
     $latestpayoutcode = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('payoutcode');
     $todayssales = $machineonesales - $latestsalescode;
     $todayspayout = $machineonepayout - $latestpayoutcode;
    Shopbalancingrecord::Create([
           'fishincome' => $fishincome,
           'fishsales' => $todayssales,
           'fishpayout' => $todayspayout,
           'datedone' => $request['datedone'],
           'branch' => $request['branchnametobalance'],
           'scpayout' => 0,
           'scsales' =>0,
           'sctkts' => 0,
           'vsales' => $virtualsales,
           'vcan' => $virtualcancelled,
           'vprof' => $netvirtualprofit,
           'vpay' => $virtualpayout,
           'vtkts' => $virtualtickets,
           'comment' => $request['comment'],
           'expenses' => $totalexpense,
           'cashin'    => $totalcashin,
           'cashout'   => $totalcashout,
           'opbalance'    => $openningbalance,
           'clcash'    => $closingbalance,
           'reportedcash'    => $request['reportedcash'],
           'comment'    => $request['bio'],
           'multiplier' => $multiplier,
           'totalsales' => $virtualsales-$virtualcancelled+($todayssales*$multiplier),
          'totalpayout' => $virtualpayout+($todayspayout*$multiplier),
          'totalcancelled' => $virtualcancelled,
          'totalprofit' => $fishincome+$netvirtualprofit,
           'ucret' => $userid,
         
       ]);
       //// Saving the current machinecodes
       Currentmachinecode::Create([
        'machineno' => '101',
        'datedone' => $request['datedone'],
        'branch' => $request['branchnametobalance'],
        'machinecode' => $machineoneclosingcode,
        'ucret' => $userid,
      
    ]);
    //ooooooooooooooooooooooooooooooooooooooooooooooooooooooo
/// working and Updating the daily Codes
    /////////////////////////////////////////// checking if there is a sale or payout
    $existpreviouswork = \DB::table('dailyreportcodes')->where('branch', '=', $inpbranch)->where('machineno', '=', 101)->count();
   //  //latest sales
   
   //    $resetcodestatus = \DB::table('dailyreportcodes')->where('branch', '=', $inpbranch)
   //      ->where('machineno', '=', 101)
   //      ->where('resetstatus', '=', 1)
   //      ->count();
       if($existpreviouswork > 0)
       {
      $previoussalesfigure = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('salescode');
      $previouspayoutfigure = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('payoutcode');
       }
       if($existpreviouswork < 1)
       {
         $previoussalesfigure = 0;
         $previouspayoutfigure = 0;
       }
   //      if($resetcodestatus > 0)
   //        $previoussalesfigure = 0;
   //    $previouspayoutfigure = 0;
 
    
   //  if($existpreviouswork < 1)
   //  {
   //    $previoussalesfigure = 0;
   //    $previouspayoutfigure = 0;
    
   //  }
    //00000000000000000000000000000000000000000000000000000000000000000


/// calculating the current or dayz sales and payout
$todayssaes1 = $machineonesales - $previoussalesfigure;
$todayspayout11 = $machineonepayout - $previouspayoutfigure;
if($todayssaes1 >= 0)
{
$todayssaes = $todayssaes1;
}
if($todayssaes1 < 0)
{
$todayssaes = $machineonesales;
}
//
if($todayspayout11 >= 0)
{
$todayspayout = $todayspayout11;
}
if($todayspayout11 < 0)
{
$todayspayout = $machineonepayout;
}
///// getting the branch order
$dorder = \DB::table('branches')->where('id', '=', $userbranch)->count('dorder');
/// deleting the existing record
$bxn = $request['branchnametobalance'];
$datedonessd = $request['datedone'];
DB::table('dailyreportcodes')->where('branch', $bxn)->where('datedone', $datedonessd)->where('machineno', 101)->delete();
// $totalcollection = \DB::table('cintransfers')
   
//     ->where('branchto', '=', $bxn)
//     ->where('transferdate', '=', $datedonessd)
//     ->where('status', '=', 1)
   
//     ->sum('amount');
     
//     ////
//     $totalcredits = \DB::table('couttransfers')
   
//     ->where('branchto', '=', $bxn)
//     ->where('transferdate', '=', $datedonessd)
//     ->where('status', '=', 1)
   
//     ->sum('amount');

    /// working and Updating the daily Codes
    Dailyreportcode::Create([
      'machineno'    => '101',
      'datedone'     => $request['datedone'],
      'branch'       => $request['branchnametobalance'],
      'closingcode'  => $machineoneclosingcode,
      'floatcode'    => $request['machineonefloat'],
      'openningcode' =>    $machineoneopenningcode,
      'salescode'    =>    $machineonesales,
      'payoutcode'   =>    $machineonepayout,
      'profitcode'   =>    $machineonesales-$machineonepayout,
      'previoussalesfigure'  =>    $previoussalesfigure,
      'previouspayoutfigure' =>    $previouspayoutfigure,
      'currentpayoutfigure'  =>    $todayspayout,
      'currentsalesfigure'   =>    $todayssaes,
      'dorder'  =>    $dorder,
      'ucret'   => $userid,
      'totalcollection' => $totalcashout,
      'totalcredits'=> $totalcashin,
      'daysalesamount' => $todayssaes*$multiplier,
      'daypayoutamount' => $todayspayout*$multiplier,
      'monthmade'    => $monthmade,
      'multiplier' => $multiplier,
      'yearmade'     => $yearmade,

      'virtualsales'    => $virtualsales,
      'virtualcancelled' => $virtualcancelled,
      'virtualpayout'     => $virtualpayout,
      'virtualprofit'     => $netvirtualprofit,

      
      'totalsales' => $virtualsales-$virtualcancelled+($todayssaes*$multiplier),
          'totalpayout' => $virtualpayout+$todayspayout,
          'totalcancelled' => $virtualcancelled,
          'totalprofit' => $fishincome+$netvirtualprofit,
    
    ]);

//// checking if the branch exists in the monthlyreport view
// //$branchinmonthlyreport = \DB::table('mlyrpts')->where('branch', $branchforaction)->where('yeardone', $yearmade)->where('monthdone', $monthmade)->count();
// //if($branchinmonthlyreport > 0)
// {
// /// update query
// $brancchssjh = $request['branchnametobalance'];

// // extracting the new sales figure for the  month
// $newsalesfigure = \DB::table('dailyreportcodes')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branch', '=', $brancchssjh)
// ->sum('daysalesamount');
// /// new payout figure
// $newspayoutfigure = \DB::table('dailyreportcodes')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branch', '=', $brancchssjh)
// ->sum('daypayoutamount');

// /// new collections figure
// $newcollectionsfigure = \DB::table('cintransfers')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branchto', '=', $brancchssjh)
// ->where('status', '=', 1)
// ->sum('amount');
// /// new credits figure
// $newcreditsfigure = \DB::table('couttransfers')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branchto', '=', $brancchssjh)
// ->where('status', '=', 1)
// ->sum('amount');
// /// new expenses figure
// $newexpensesfigure = \DB::table('madeexpenses')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branchto', '=', $brancchssjh)
// ->where('status', '=', 1)
// ->sum('amount');
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

// }

//if($branchinmonthlyreport < 1)
{
  // //$branchinmonthlyreport = \DB::table('mlyrpts')->where('branch', $branchforaction)->where('yeardone', $yearmade)->where('monthdone', $monthmade)->count();

  $brancchssjh = $request['branchnametobalance'];
  DB::table('mlyrpts')->where('branch', $brancchssjh)->where('yeardone', $yearmade)->where('monthdone', $monthmade)->delete();
  // extracting the new sales figure for the  month
$newsalesfigure = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('daysalesamount');
/// new payout figure
$newspayoutfigure = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('daypayoutamount');

/// new collections figure
$newcollectionsfigure = \DB::table('cintransfers')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branchto', '=', $brancchssjh)
->where('status', '=', 1)
->sum('amount');
/// new credits figure
$newcreditsfigure = \DB::table('couttransfers')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branchto', '=', $brancchssjh)
->where('status', '=', 1)
->sum('amount');
/// new expenses figure
$newexpensesfigure = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->where('approvalstate', '=', 1)
->sum('amount');
//////////////////////////////////////// Working on virtual
$newvirtualsalesfigure = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('virtualsales');

$newvirtualcancelled = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('virtualcancelled');


$newvirtualpayout = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('virtualpayout');

$newvirtualprofit = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('virtualprofit');

  // insertion query
  Mlyrpt::Create([

    'branch'       => $brancchssjh,
 
    'dorder'  =>    $dorder,
    'ucret'   => $userid,
    'sales' => $newsalesfigure,
    'payout'=> $newspayoutfigure,
    'collections' => $newcollectionsfigure,
    'credits' => $newcreditsfigure,
    'expenses' => $newexpensesfigure,
    'profit' => $newsalesfigure-$newspayoutfigure,
    'ntrevenue'  => $newsalesfigure +$newvirtualsalesfigure-$newvirtualcancelled-$newspayoutfigure-$newvirtualpayout-$newexpensesfigure,
    'monthdone'    => $monthmade,
    'yeardone'     => $yearmade,

    'virtualsales' => $newvirtualsalesfigure,
    'virtualcancelled'=> $newvirtualcancelled,
    'virtualpayout' => $newvirtualpayout,
    'virtualprofit' => $newvirtualprofit,
  


    'totalsales' => $newvirtualsalesfigure+$newsalesfigure-$newvirtualcancelled,
    'totalpayout' => $newspayoutfigure+$newvirtualpayout,
    'totalcancelled' => $newvirtualcancelled,
    'totalprofit' => ($newsalesfigure-$newspayoutfigure)+($newvirtualprofit),
  ]);


}

///// working the dailysummary
$datedonessd = $request['datedone'];
// sales summary
$newsalesasummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('daysalesamount');
$newpayoutsummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('daypayoutamount');
///////////////
$newvirtualsalesdaily = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('virtualsales');

$newvirtualcancelleddaily = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('virtualcancelled');

$newvirtualpayoutdaily = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('virtualpayout');
$newvirtualprofitdaily = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('virtualprofit');
//////////////////////////////////////////////////////////////////////////////
DB::table('daysummarries')->where('datedone', $datedonessd)->delete();
    
Daysummarry::Create([
  'salesamount'      => $newsalesasummaryfortheday,
  'datedone'       => $datedonessd,
  'payoutamount'         => $newpayoutsummaryfortheday,
  'yeardone'         => $monthmade,
  'monthdone'         => $yearmade,
    
  'virtualsales' => $newvirtualsalesdaily,
  'virtualcancelled'=> $newvirtualcancelleddaily,
  'virtualpayout' => $newvirtualpayoutdaily,
  'virtualprofit' => $newvirtualprofitdaily,

  'totalsales' => $newsalesasummaryfortheday+$newvirtualsalesdaily-$newvirtualcancelleddaily,
  'totalpayout' => $newvirtualpayoutdaily+$newpayoutsummaryfortheday,
  'totalcancelled' => $newvirtualcancelleddaily,
  'totalprofit' => ($newsalesasummaryfortheday-$newpayoutsummaryfortheday)+($newvirtualprofitdaily),


  'ucret' => $userid,

]);





    ///// Updating the collection and credits 


    
    DB::table('salesdetails')->where('branch', $bxn)->where('datedone', $datedonessd)->where('machineno', 101)->delete();
    
    Salesdetail::Create([
      'machineno'      => '101',
      'datedone'       => $request['datedone'],
      'branch'         => $request['branchnametobalance'],
      
      'previoussalesfigure' => $previoussalesfigure,
      'previouspayoutfigure' => $previouspayoutfigure,
    
      'currentsalesfigure'   =>    $machineonesales,
      'currentpayoutfigure'   =>   $machineonepayout,
    
      'salesamount'    =>    ($machineonesales - $machineonepayout)*$multiplier,
      'salesfigure'    =>    $machineonesales - $machineonepayout,
      //'payoutamount'    =>    ($machineonepayout - $machineonepayout)*500,
      'monthmade'    => $monthmade,
      'yearmade'    => $yearmade,
      'daysalesamount' => $todayssaes*$multiplier,
      'daypayoutamount' => $todayspayout*$multiplier,
      
      
      'ucret' => $userid,
    
    ]);
//// updatind the branch statement 
// $currentclosingbalance = \DB::table('branchstatements')->where('branchname', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('closingbalance');
// Salesdetail::Create([
 
//   'datedone'       => $request['datedone'],
//   'branchname'         => $request['branchnametobalance'],
  
//   'previoussalesfigure' => $previoussalesfigure,
//   'previouspayoutfigure' => $previouspayoutfigure,

//   'currentsalesfigure'   =>    $machineonesales,
//   'currentpayoutfigure'   =>   $machineonepayout,

//   'salesamount'    =>    ($machineonesales - $machineonepayout)*500,
//   'salesfigure'    =>    $machineonesales - $machineonepayout,

//   'monthmade'    => $monthmade,
//   'yearmade'    => $yearmade,
  
  
//   'ucret' => $userid,

// ]);
}// closing if the machine was not reset 

        }/// closing if its one Machine

}//closing if the branch sales a product fish only

/////////////////////////////////////////tttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt/////////////////////////////
// if($doesthebranchhavefish = 1 && $doesthebranchhavesoccer = 1 && $doesthebranchhavevirtual = 1)
// {

// /// total fish
//         $branchforaction = $request['branchnametobalance'];
//         $totalfishmacinesinthebranch = \DB::table('branchesandmachines')->where('branchname', '=', $branchforaction)->count();

//         if($totalfishmacinesinthebranch = 1)
//         {
//           $this->validate($request,[
            
//             'datedone'   => 'required  |max:191',
//             'branchnametobalance'   => 'required',
//             'reportedcash' => 'required',
//             'bio' => 'required',
//             'machineonecurrentcode'  => 'required',
//             'machineonesales'  => 'required',
//             'machineonepayout'  => 'required',
//             'machineonefloat'  => 'required'
          
//            ]);

//            $userid =  auth('api')->user()->id;
//                   $datepaid = date('Y-m-d');
//                   $inpbranch = $request['branchnametobalance'];
//                   $dateinq =  $request['datedone'];

//   /// checking if the machine was reset
//   $machineresetstatus = \DB::table('machineresets')->where('branch', $inpbranch)->where('machine', '101')->orderBy('id', 'Desc')->limit(1)->value('resetdate');
//   if( $machineresetstatus  != $dateinq)
// {

//             /// getting the expenses
//             $totalexpense = \DB::table('madeexpenses')->where('datemade', '=', $dateinq)->where('branch', '=', $inpbranch)->where('explevel', '=', 1)
//             ->where('approvalstate', '=', 1)
//             ->sum('amount');
     
//         /// getting the cashin
//            $totalcashin = \DB::table('couttransfers')->where('transferdate', '=', $dateinq)->where('branchinact', '=', $inpbranch)->where('status', '=', 1)
//      ->sum('amount');
//       /// getting the cashout
//             $totalcashout = \DB::table('cintransfers')->where('transferdate', '=', $dateinq)->where('branchinact', '=', $inpbranch)->where('status', '=', 1)->sum('amount');
     
//       /// getting the payout
//             $totalpayout = \DB::table('branchpayouts')->where('datepaid', '=', $dateinq)->where('branch', '=', $inpbranch)->sum('amount');
     
     
//       /// checking if a record exists for balancing
//              $branchinbalanced  = \DB::table('shopbalancingrecords')->where('branch', '=', $inpbranch) ->count();
     
//      ///getting the openning balance
//      if($branchinbalanced > 0)
//      {
//      $openningbalance  = Shopbalancingrecord::where('branch', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('clcash');
//      }
//      if($branchinbalanced < 1)
//      {
//      $openningbalance  = Branch::where('branchno', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('openningbalance');
//      }
   
//      /// working on fish sales and codes
//      //gitting the days code from sles and payout

//      $dateinact = $request['datedone'];
//      $yearmade = date('Y', strtotime($dateinact));
//      $monthmade = date('m', strtotime($dateinact));

//     $machineoneopenningcode = \DB::table('currentmachinecodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('machinecode');
      







//     $machineonecurrentcode = $request['machineonecurrentcode'];
//     $machineonesales = $request['machineonesales'];
//     $machineonepayout = $request['machineonepayout'];
//     $machineonefloat = $request['machineonefloat'];
    
    
//      $machineoneclosingcode = $machineonecurrentcode;
//      $fishincome = ($machineoneclosingcode - $machineoneopenningcode)*500;
//      $closingbalance = $openningbalance + $fishincome + $totalcashin - $totalcashout -$totalexpense -$totalpayout;
//     Shopbalancingrecord::Create([
//            'fishincome' => $fishincome,
//            'fishsales' => $machineonesales,
//            'fishpayout' => $machineonepayout,
//            'datedone' => $request['datedone'],
//            'branch' => $request['branchnametobalance'],
//            'scpayout' => 0,
//            'scsales' =>0,
//            'sctkts' => 0,
//            'vsales' => 0,
//            'vcan' => 0,
//            'vprof' => 0,
//            'vpay' => 0,
//            'vtkts' => 0,
//            'comment' => $request['comment'],
//            'expenses' => $totalexpense,
//            'cashin'    => $totalcashin,
//            'cashout'   => $totalcashout,
//            'opbalance'    => $openningbalance,
//            'clcash'    => $closingbalance,
//            'reportedcash'    => $request['reportedcash'],
//            'comment'    => $request['bio'],
         
//            'ucret' => $userid,
         
//        ]);
//        //// Saving the current machinecodes
//        Currentmachinecode::Create([
//         'machineno' => '101',
//         'datedone' => $request['datedone'],
//         'branch' => $request['branchnametobalance'],
//         'machinecode' => $machineoneclosingcode,
//         'ucret' => $userid,
      
//     ]);
//     //ooooooooooooooooooooooooooooooooooooooooooooooooooooooo
// /// working and Updating the daily Codes
//     /////////////////////////////////////////// checking if there is a sale or payout
//     $existpreviouswork = \DB::table('dailyreportcodes')->where('branch', '=', $inpbranch)->where('machineno', '=', 101)->count();
//    //  //latest sales
   
//    //    $resetcodestatus = \DB::table('dailyreportcodes')->where('branch', '=', $inpbranch)
//    //      ->where('machineno', '=', 101)
//    //      ->where('resetstatus', '=', 1)
//    //      ->count();
//        if($existpreviouswork > 0)
//        {
//       $previoussalesfigure = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('salescode');
//       $previouspayoutfigure = \DB::table('dailyreportcodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('payoutcode');
//        }
//        if($existpreviouswork < 1)
//        {
//          $previoussalesfigure = 0;
//          $previouspayoutfigure = 0;
//        }
//    //      if($resetcodestatus > 0)
//    //        $previoussalesfigure = 0;
//    //    $previouspayoutfigure = 0;
 
    
//    //  if($existpreviouswork < 1)
//    //  {
//    //    $previoussalesfigure = 0;
//    //    $previouspayoutfigure = 0;
    
//    //  }
//     //00000000000000000000000000000000000000000000000000000000000000000


// /// calculating the current or dayz sales and payout
// $todayssaes1 = $machineonesales - $previoussalesfigure;
// $todayspayout11 = $machineonepayout - $previouspayoutfigure;
// if($todayssaes1 >= 0)
// {
// $todayssaes = $todayssaes1;
// }
// if($todayssaes1 < 0)
// {
// $todayssaes = $machineonesales;
// }
// //
// if($todayspayout11 >= 0)
// {
// $todayspayout = $todayspayout11;
// }
// if($todayspayout11 < 0)
// {
// $todayspayout = $machineonepayout;
// }
// ///// getting the branch order
// $dorder = \DB::table('branches')->where('id', '=', $userbranch)->count('dorder');
// /// deleting the existing record
// $bxn = $request['branchnametobalance'];
// $datedonessd = $request['datedone'];
// DB::table('dailyreportcodes')->where('branch', $bxn)->where('datedone', $datedonessd)->where('machineno', 101)->delete();


//     /// working and Updating the daily Codes
//     Dailyreportcode::Create([
//       'machineno'    => '101',
//       'datedone'     => $request['datedone'],
//       'branch'       => $request['branchnametobalance'],
//       'closingcode'  => $machineoneclosingcode,
    
//       'openningcode' =>    $machineoneopenningcode,
//       'salescode'    =>    $machineonesales,
//       'payoutcode'   =>    $machineonepayout,
//       'profitcode'   =>    $machineonesales-$machineonepayout,
//       'previoussalesfigure'  =>    $previoussalesfigure,
//       'previouspayoutfigure' =>    $previouspayoutfigure,
//       'currentpayoutfigure'  =>    $todayspayout,
//       'currentsalesfigure'   =>    $todayssaes,
//       'dorder'  =>    $dorder,
//       'ucret'   => $userid,
//       'monthmade'    => $monthmade,
//       'yearmade'     => $yearmade,
    
//     ]);
    
   
    
//     Salesdetail::Create([
//       'machineno'      => '101',
//       'datedone'       => $request['datedone'],
//       'branch'         => $request['branchnametobalance'],
      
//       'previoussalesfigure' => $previoussalesfigure,
//       'previouspayoutfigure' => $previouspayoutfigure,
    
//       'currentsalesfigure'   =>    $machineonesales,
//       'currentpayoutfigure'   =>   $machineonepayout,
    
//       'salesamount'    =>    ($machineonesales - $machineonepayout)*500,
//       'salesfigure'    =>    $machineonesales - $machineonepayout,
    
//       'monthmade'    => $monthmade,
//       'yearmade'    => $yearmade,
      
      
//       'ucret' => $userid,
    
//     ]);
// //// updatind the branch statement 
// // $currentclosingbalance = \DB::table('branchstatements')->where('branchname', $inpbranch)->orderBy('id', 'Desc')->limit(1)->value('closingbalance');
// // Salesdetail::Create([
 
// //   'datedone'       => $request['datedone'],
// //   'branchname'         => $request['branchnametobalance'],
  
// //   'previoussalesfigure' => $previoussalesfigure,
// //   'previouspayoutfigure' => $previouspayoutfigure,

// //   'currentsalesfigure'   =>    $machineonesales,
// //   'currentpayoutfigure'   =>   $machineonepayout,

// //   'salesamount'    =>    ($machineonesales - $machineonepayout)*500,
// //   'salesfigure'    =>    $machineonesales - $machineonepayout,

// //   'monthmade'    => $monthmade,
// //   'yearmade'    => $yearmade,
  
  
// //   'ucret' => $userid,

// // ]);
// }// closing if the machine was not reset 

//         }/// closing if its one Machine

// }//closing if the branch sales a product fish only




////////////////////////////////ttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt//////////////////////////////////





           
      
    
    
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

        $user = Shopbalancingrecord::findOrFail($id);
        $user->delete();

        // $bxn = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('branch');
        // $datedonessd = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('datedone');
       
       
//         /// deleting from the daily record
//     
DB::table('dailyreportcodes')->where('branch', $bxn)->where('datedone', $datedonessd)->delete();
DB::table('currentmachinecodes')->where('branch', $bxn)->where('datedone', $datedonessd)->delete();


    }
}
