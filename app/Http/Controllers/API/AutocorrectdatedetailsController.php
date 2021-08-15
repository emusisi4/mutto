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
class AutocorrectdatedetailsController extends Controller
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
     //  'product'   => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
///// working the dailysummary
$dateinact = $request['datedone'];
$yearmade = date('Y', strtotime($dateinact));
$monthmade = date('m', strtotime($dateinact));
$datedonessd = $request['datedone'];
// sales summary
$newsalesasummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->sum('daysalesamount');
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
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = branch::findOrfail($id);

$this->validate($request,[
  'branchname'   => 'required | String |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Shopbalancingrecord::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
