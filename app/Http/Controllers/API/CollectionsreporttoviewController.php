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
use App\Branchpayout;
use App\Branchtobalance;
use App\Branchtocollect;
use App\Incomereporttoview;
use App\Collectionreporttoview;
use App\Fishreportselection;
use App\Dailyreportcode;
use App\Cintransfer;
use App\Couttransfer;

class CollectionsreporttoviewController extends Controller
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
     //   if($userrole = 1)


     //if($userrole == '101')
     // {
      //FishreporttoviewController
      // $id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
      
      $startdate = \DB::table('collectionreporttoviews')->where('ucret', '=', $userid)->value('startdate');
      $enddate = \DB::table('collectionreporttoviews')->where('ucret', '=', $userid)->value('enddate');
      $reporttype = \DB::table('collectionreporttoviews')->where('ucret', '=', $userid)->value('reporttype');
      $branch = \DB::table('collectionreporttoviews')->where('ucret', '=', $userid)->value('branch');
     if($reporttype == "1")
     {
        if($branch != "900")
        {
    //  return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderBy('dorder', 'Asc')
     return   Cintransfer::with(['branchName'])->orderBy('transferdate', 'DESC')
     // return   Cintransfer::latest('id') 
       // ->where('del', 0)
      ->where('branchto', $branch)

      ->whereBetween('transferdate', [$startdate, $enddate])
       ->paginate(100);
        }
        if($branch == "900")
        {
    //  return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderBy('dorder', 'Asc')
       return   Cintransfer::with(['branchName'])->orderBy('transferdate', 'DESC')
    //  return   Cintransfer::latest('id') 
      //  // ->where('del', 0)
      //  ->where('branch', $userbranch)

      ->whereBetween('transferdate', [$startdate, $enddate])
       ->paginate(40);
        }
      }
     
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($reporttype == "2")
     {
        if($branch != "900")
        {
    //  return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderBy('dorder', 'Asc')
     return   Couttransfer::with(['branchName'])->orderBy('transferdate', 'DESC')
     // return   Cintransfer::latest('id') 
       // ->where('del', 0)
      ->where('branchto', $branch)

      ->whereBetween('transferdate', [$startdate, $enddate])
       ->paginate(100);
        }
        if($branch == "900")
        {
    //  return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderBy('dorder', 'Asc')
       return   Couttransfer::with(['branchName'])->orderBy('transferdate', 'DESC')
    //  return   Cintransfer::latest('id') 
      //  // ->where('del', 0)
      //  ->where('branch', $userbranch)

      ->whereBetween('transferdate', [$startdate, $enddate])
       ->paginate(40);
        }
      }


      
    }


    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];


       $this->validate($request,[
        //'branchnametobalance'   => 'required | String |max:191',
        'startdate'   => 'required',
        'reporttype' => 'required',
         'enddate'   => 'required'
     ]);


     $userid =  auth('api')->user()->id;
   //  $userbranch =  auth('api')->user()->branch;
   //  $id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
   //  $hid = $id1+1;
   $reptov = $request['actionaid'];
  // DB::table('expensereporttoviews')->where('ucret', $userid)->where('reporttype',$reptov)->delete();
  DB::table('collectionreporttoviews')->where('ucret', $userid)->delete();
  $datepaid = date('Y-m-d');
     
  //       $dats = $id;




     return Collectionreporttoview::Create([
    'branch' => $request['branchname'],
    'startdate' => $request['startdate'],
    'reporttype' => $request['reporttype'],
    'enddate' => $request['enddate'],

    'ucret' => $userid,
   
  
]);






    }
///////////////////////////////////////////////////////////////////////























    public function show($id)
    {
        //
    }
   
    
    public function update(Request $request, $id)
    {
        //
        $user = Branchpayout::findOrfail($id);

        $this->validate($request,[
            'receiptno'   => 'required | String |max:191',
            'datemade'   => 'required',
            'branch'  => 'required',
            'amount'  => 'required'
    ]);

 
     
$user->update($request->all());
    }

   
    
    
     public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Branchpayout::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
