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
use App\Sortlistreportaccess;

class SalesreporttoviewController extends Controller
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
      {
      
      //   return   Dailyreportcode::with(['branchName','expenseName'])->latest('id')
      return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderby('daysalesamount', 'Dec')
       //return   Dailyreportcode::orderBy('daysalesamount', 'Desc')
       // ->where('del', 0)
      //  ->where('branch', $userbranch)
      //  ->where('explevel', 1)
       ->paginate(35);
      }
     


       // return Student::all();
     //  return   Submheader::with(['maincomponentSubmenus'])->latest('id')
       // return   MainmenuList::latest('id')
     //    ->where('del', 0)
         //->paginate(15)
     //    ->get();

   //   return   Branchpayout::with(['ExpenseTypeconnect','expenseCategory','payingUserdetails'])->latest('id')
     //  return   Branchpayout::latest('id')
     //   ->where('del', 0)
     //  ->paginate(13);

       //  return Submheader::latest()
         //  -> where('ucret', $userid)
           










       // {
      // return Submheader::latest()
      //  -> where('ucret', $userid)
    //    ->paginate(15);
      //  }

      
    }


    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];


       $this->validate($request,[
   //    'branchnametobalance'   => 'required | String |max:191',
        'startdate'   => 'required',
        'enddate'   => 'required'
     //    'sortby'   => 'required'
     ]);


     $userid =  auth('api')->user()->id;
     
   $reptov = $request['actionaidsalesreportbydate'];
  // DB::table('expensereporttoviews')->where('ucret', $userid)->where('reporttype',$reptov)->delete();
  DB::table('sortlistreportaccesses')->where('ucret', $userid)->delete();
  $datepaid = date('Y-m-d');
     
  //       $dats = $id;




  if($reptov == "salesreportbydate")
  {
       return Sortlistreportaccess::Create([
    //  'branch' => $request['branchnametobalance'],
      'startdate' => $request['startdate'],
      'reporttype' => $request['actionaidsalesreportbydate'],
      'sortname' => $request['sortby'],
      'enddate' => $request['enddate'],
 'branch'=> $request['branchname'],
      'ucret' => $userid,
     
    
  ]);
}///


if($reptov == "salesdetailsbybranch")
{
     return Fishreportselection::Create([
    'branch' => $request['branchnametobalance'],
    'startdate' => $request['startdate'],
    'reporttype' => $request['actionaid'],
   // 'enddate' => $request['enddate'],

    'ucret' => $userid,
   
  
]);
}///


if($reptov == "expreportbywallet")
{
     return Expensereporttoview::Create([
    'branch' => $request['branchnametobalance'],
    'startdate' => $request['startdate'],
    'reporttype' => $request['actionaid'],
    'enddate' => $request['enddate'],

    'ucret' => $userid,
   
  
]);
}///









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
