<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branchandproduct;
use App\Daysummarry;
use App\Branchesandmachine;
use App\Branchinaction;

class AutocorrectShopbalancingController extends Controller
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

    //  if($userrole == '101')
      {
    //  return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->latest('id')
    $roleto  = Branchinaction::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
    return    Branchesandmachine::with(['branchnameBranchmachines','machinenameBranchmachines'])->latest('id')
  // return   Branchesandmachine::latest('id')
        //  ->where('branch', $roleto)
        ->paginate(30);
      }

      
    }

 
    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
       'datedone'   => 'required',
       'branchtoupdate'   => 'required',
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');



  $dateinuse = $request['datedone'];
  $branchinuse = $request['branchtoupdate'];


  $dateinact = $request['datedone'];
  $yearmade = date('Y', strtotime($dateinact));
  $monthmade = date('m', strtotime($dateinact));
  $datedonessd = $request['datedone'];





/// getting the totals from shop balancing
$fishincome = \DB::table('shopbalancingrecords')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->sum('fishincome');
$fishpayoutcode = \DB::table('shopbalancingrecords')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->sum('fishpayout');
$fishsalescode = \DB::table('shopbalancingrecords')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->sum('fishsales');
$machinemultiplier= \DB::table('shopbalancingrecords')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->sum('multiplier');
$fishprofitcode = \DB::table('shopbalancingrecords')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->sum('fishsales');

















///// working the dailysummary

// sales summary

$newpayoutsummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('daypayoutamount');

///////// working on the virtual sales 
$newvirtualsalessummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('virtualsales'); 
$newvirtualcancelledsummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('virtualcancelled'); 

$newvirtualpayoutsummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('virtualpayout'); 
$newvirtualprofitsummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('virtualprofit'); 
///
$totalsales = $newvirtualsalessummaryfortheday+$newsalesasummaryfortheday-$newvirtualcancelledsummaryfortheday;
$totalpayout = $newvirtualpayoutsummaryfortheday+$newpayoutsummaryfortheday;
$totalcancelled = $newvirtualcancelledsummaryfortheday;
$totalprofit = $totalsales-$totalpayout;
$virtualcancelled = $newvirtualcancelledsummaryfortheday;
// virtualsales, virtualcancelled, virtualpayout, virtualprofit, totalsales, totalcancelled, totalpayout, totalprofit
//////////////////////////////////////////////////////////////////////////////
DB::table('daysummarries')->where('datedone', $datedonessd)->delete();
//id, datedone, salesamount, payoutamount, ucret, created_at, updated_at, yeardone, monthdone,
// virtualsales, virtualprofit, virtualcancelled, virtualpayout, totalcancelled, totalsales, totalpayout, totalprofit
Daysummarry::Create([
  'salesamount'    => $newsalesasummaryfortheday,
  'datedone'       => $datedonessd,
  'payoutamount'   => $newpayoutsummaryfortheday,
  'yeardone'       => $monthmade,
  'monthdone'      => $yearmade,
  'virtualsales'   => $newvirtualsalessummaryfortheday-$newvirtualcancelledsummaryfortheday,
  'virtualprofit'       => $newvirtualsalessummaryfortheday-$newvirtualcancelledsummaryfortheday -$newvirtualpayoutsummaryfortheday ,
  'virtualcancelled'      => $newvirtualcancelledsummaryfortheday,

  'virtualpayout'   => $newvirtualpayoutsummaryfortheday,
  'totalcancelled'       => $virtualcancelled,
  'totalsales'      => $totalsales,
  'totalpayout'   => $totalpayout,
  'totalprofit'       => $totalprofit,
  
  'ucret' => $userid,

]);


    }
////////////////////////////////////////////////////////////////////
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

        $user = Shopbalancingrecord::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
