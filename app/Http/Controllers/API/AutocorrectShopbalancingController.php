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
$fishsales = \DB::table('dailyreportcodes')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->value('daysalesamount');
$fishpayout = \DB::table('dailyreportcodes')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->value('daypayoutamount');
$virtualsales = \DB::table('dailyreportcodes')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->value('virtualsales');
$virtualpayout = \DB::table('dailyreportcodes')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->value('virtualpayout');
$virtualprofit = \DB::table('dailyreportcodes')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->value('virtualprofit');
$virtualcancelled = \DB::table('dailyreportcodes')->where('datedone', '=', $dateinuse)->where('branch', '=', $branchinuse)->value('virtualcancelled');


















// ///// working the dailysummary

// // sales summary

// $newpayoutsummaryfortheday = \DB::table('dailyreportcodes')
// ->where('datedone', '=', $datedonessd)
// ->sum('daypayoutamount');

// ///////// working on the virtual sales 
// $newvirtualsalessummaryfortheday = \DB::table('dailyreportcodes')
// ->where('datedone', '=', $datedonessd)
// ->sum('virtualsales'); 
// $newvirtualcancelledsummaryfortheday = \DB::table('dailyreportcodes')
// ->where('datedone', '=', $datedonessd)
// ->sum('virtualcancelled'); 

// $newvirtualpayoutsummaryfortheday = \DB::table('dailyreportcodes')
// ->where('datedone', '=', $datedonessd)
// ->sum('virtualpayout'); 
// $newvirtualprofitsummaryfortheday = \DB::table('dailyreportcodes')
// ->where('datedone', '=', $datedonessd)
// ->sum('virtualprofit'); 
// ///
$totalsales = $fishsales+$virtualsales-$virtualcancelled;
$totalpayout = $virtualpayout+$fishpayout;
$totalcancelled = $virtualcancelled;
$totalprofit = $totalsales-$totalpayout;






$update = \DB::table('dailyreportcodes') 
->where('datedone', $dateinuse) 
->where('branch', $branchinuse) 
->update( [ 'totalsales' => $totalsales,
            'totalpayout' => $totalpayout,
            'totalcancelled' => $totalcancelled,
            'totalprofit' => $totalprofit,
            'virtualprofit' => ($virtualsales-$virtualcancelled)-($virtualpayout)
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
