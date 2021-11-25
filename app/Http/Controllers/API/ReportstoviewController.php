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
use App\Expensereporttoview;
use App\Fishreportselection;
use App\Dailyreportcode;
use App\Monthlyreporttoview;
use App\Expenserecordtoselect;
use App\Salesreporttoview;
class ReportstoviewController extends Controller
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

     //   $reporttype = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('reporttype');
        $monthtodisplay = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('monthname');
        $yeartodisplay = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('yearname');
        $branch = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('branchname');
        
  
      //   return   Dailyreportcode::with(['branchName','expenseName'])->latest('id')
      return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderby('datedone', 'Asc')
      
        ->where('monthmade', $monthtodisplay)
        ->where('branch', $branch)
        ->where('yearmade', $yeartodisplay)
        ->paginate(35);
    
    

      
    }
    public function setdatestoviewdailyreport()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $existanceinthetable = \DB::table('salesreporttoviews')->where('ucret', '=', $userid)->count();
       
       
       
        if($existanceinthetable < 1 )
        { Salesreporttoview::Create([
          //  'branch', 'ucret','startdate','enddate',
            //    'productcode' => $request['productcode'],
                'startdate' => $request['startdate'],
                'enddate' => $request['enddate'],
                'supplier' => $request['suppliername'],
             
                'ucret' => $userid,
              
            ]);
}
if($existanceinthetable > 0 )
{ 
    Salesreporttoview::Create([
  //  'branch', 'ucret','startdate','enddate',
    //    'productcode' => $request['productcode'],
        'startdate' => $request['startdate'],
        'enddate' => $request['enddate'],
        'supplier' => $request['suppliername'],
        
        'ucret' => $userid,
      
    ]);
}
   
    

      
    }

    public function store(Request $request)
    {
       
        $userid =  auth('api')->user()->id;

        $this->validate($request,[
           // 'branchname'   => 'required',
        //    'monthname'   => 'required',
          //  'yearname'   => 'required',
         
           //  'reporttype'   => 'required'
         ]);      
        /// checking if there exists a record
        $existanceinthetable = \DB::table('salesreporttoviews')->where('ucret', '=', $userid)->count();
        if($existanceinthetable < 1 )
        { Salesreporttoview::Create([
          //  'branch', 'ucret','startdate','enddate',
            //    'productcode' => $request['productcode'],
                'startdate' => $request['startdate'],
                'enddate' => $request['enddate'],
                'supplier' => $request['suppliername'],
                'cashiersold' => $request['cashiersold'],
                'ucret' => $userid,
              
            ]);
}
if($existanceinthetable > 0 )
{ 
    $stdate = $request['startdate'];
    $startdate = strlen($stdate);
    $endate = $request['enddate'];
    $enddate = strlen($endate);
    $upp = $request['suppliername'];
    $suppliername = strlen($upp);

    $cashier = $request['cashiersold'];
    $cashname = strlen($cashier);
    if($cashname > 0)

    {
         DB::table('salesreporttoviews')
 ->where('ucret', $userid)
 ->update(['cashiersold' => $request['cashiersold']
     
     ]);
    
 }/////
    if($suppliername > 0)

   {
        DB::table('salesreporttoviews')
->where('ucret', $userid)
->update(['supplier' => $request['suppliername']
    
    ]);
   
}/////
if($startdate > 0)

{
     DB::table('salesreporttoviews')
->where('ucret', $userid)
->update(['startdate' => $request['startdate']
 
 ]);

}/////
if($enddate > 0)

{
     DB::table('salesreporttoviews')
->where('ucret', $userid)
->update(['enddate' => $request['enddate']
 
 ]);

}/////
}
    }
///////////////////////////////////////////////////////////////////////



    public function show($id)
    {
        //
    }
    public function Branchtotalsd()
    {
        //getSinglebranchpayoutdaily
        $ed = '0';
      //  return Branchpayout::where('del',0)->sum('amount');
      return   Branchpayout::latest('id')
      //  return   Branchpayout::latest('id')
         ->where('del', 0);
     //  ->paginate(13);
 
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
