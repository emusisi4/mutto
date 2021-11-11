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
use App\Customersreporttoview;
use App\Customerstatement;

class MystatementtoviewController extends Controller
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


    public function store(Request $request)
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $existanceinthetable = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->count();
       
       
       
        if($existanceinthetable < 1 )
        { Customersreporttoview::Create([
          //  'branch', 'ucret','startdate','enddate',
                'startdate' => $request['startdate'],
                'customername' => $request['customername'],
                'enddate' => $request['enddate'],
                // 'supplier' => $request['suppliername'],
                'ucret' => $userid,
              
            ]);
}
if($existanceinthetable > 0 )
{ 
  $startdate =  $request['startdate'];
  $start = strlen($startdate);
 
  $enddate =  $request['enddate'];
  $end = strlen($startdate);


  $customername =  $request['customername'];
  $customer = strlen($customername);
  
  if($start > 0)
  {
    $result = DB::table('customersreporttoviews')
  ->where('ucret', $userid)
  ->update([
    'startdate' => $request['startdate']
  ]);
}
if($enddate > 0)
  {
    $result = DB::table('customersreporttoviews')
  ->where('ucret', $userid)
  ->update([
    'enddate' => $request['enddate']
  ]);
}

if($customer > 0)
  {
    $result = DB::table('customersreporttoviews')
  ->where('ucret', $userid)
  ->update([
    'customername' => $request['customername']
  ]);
}

}


    }
///////////////////////////////////////////////////////////////////////



    public function show($id)
    {
        //
    }
   
    
  
    public function update(Request $request, $id)
    {

      $ids =  $id;
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;

      $result = DB::table('customersreporttoviews')->where('ucret', $userid)->update(['customername' => $ids]);
      
    
      
    }

  
    
    
     public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        // $user = Branchpayout::findOrFail($id);
        // $user->delete();
       // return['message' => 'user deleted'];

    }
}
