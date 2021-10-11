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
use App\Salesdetail;
use App\Madeexpense;
use App\Expdailyreport;

class DailyexpensesreportsummaryController extends Controller
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
      //  id, startdate, enddate, branch, monthname, yearname, walletname, categoryname, typename, ucret, created_at, updated_at, sortby
      //  $reporttype = \DB::table('expensesreporttoviewdetails')->where('ucret', '=', $userid)->value('reporttype');
     //   $monthtodisplay = \DB::table('expensesreporttoviewdetails')->where('ucret', '=', $userid)->value('monthname');
       // $yeartodisplay = \DB::table('expensesreporttoviewdetails')->where('ucret', '=', $userid)->value('yearname');
       // $branch = \DB::table('expensesreporttoviewdetails')->where('ucret', '=', $userid)->value('branch');
        $startdat = \DB::table('expensereporttoviews')->where('ucret', '=', $userid)->value('startdate');
        $enddate = \DB::table('expensereporttoviews')->where('ucret', '=', $userid)->value('enddate');

      
       // return   Expdailyreport::with(['branchnameDailycodes','expenseName'])->orderby('amount', 'Desc')
        return   Expdailyreport::orderby('datedone', 'Desc')
        ->whereBetween('datedone', [$startdat, $enddate])
     //   ->whereBetween('datedone', [$startdat, $enddate])

            ->paginate(35);

      
    

      
    }


    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];

       
       $this->validate($request,[
       // 'branchname'   => 'required',
        'monthname'   => 'required',
        'yearname'   => 'required',
     
         'sortreportby'   => 'required'
     ]);


     $userid =  auth('api')->user()->id;
     
 //  $reptov = $request['actionaidsalesreportbydate'];
  // DB::table('expensereporttoviews')->where('ucret', $userid)->where('reporttype',$reptov)->delete();
  DB::table('monthlyreporttoviewallbranches')->where('ucret', $userid)->delete();
  $datepaid = date('Y-m-d');
    
       return Monthlyreporttoviewallbranch::Create([
      
       'monthmade' => $request['monthname'],
      'yearmade' => $request['yearname'],
    //   'branchname' => $request['branchname'],
      'reporttype' => $request['sortreportby'],
 
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
