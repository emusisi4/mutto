<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Dailyreportcode;
use App\Floatcodesperformance;

class DaillydailybranchfloatcodesperformancereportController extends Controller
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

     $startdat = DB::table('floatcodesperformances')->where('ucret', $userid)->value('startdate');
     $enddate = DB::table('floatcodesperformances')->where('ucret', $userid)->value('enddate');
     $branchto = DB::table('floatcodesperformances')->where('ucret', $userid)->value('branch');
     $reporyttype = DB::table('floatcodesperformances')->where('ucret', $userid)->value('reporttype');



     
      
       return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderby('datedone', 'Dec')
   //   return   Dailyreportcode::latest('id')
       // ->where('del', 0)
      //  ->where('branch', $branchto)
      //  ->whereBetween('datedone', [$startdat, $enddate])
    /// ->where('branchto', $branchto)
       ->paginate(22);
      


   



      
    }

  
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];
//// Getting the category
  
//$startdat = DB::table('incomereporttoviews')->where('ucret', $userid)->value('startdate');



       $this->validate($request,[
        // 'expense'   => 'required | String |max:191',
        // 'description'   => 'required',
        // 'amount'  => 'required',
        // 'datemade'  => 'required',
        // 'branch'  => 'required',
       // 'expensetype'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     
     
   
     DB::table('floatcodesperformances')->where('ucret', $userid)->delete();
     $datepaid = date('Y-m-d');
     /// getting the branch 
     $codeinuse = $request['codeinuse'];
     $branch = \DB::table('branchandcodes')->where('floatcode', $codeinuse )->value('branch');

  //       $dats = $id;
  return Floatcodesperformance::Create([
    'branch' => $branch,
    'codeinuse' => $request['codeinuse'],
    

    'ucret' => $userid,
   
    
  ]);
    }

   
    public function show($id)
    {
        //
    }
   
  
    public function update(Request $request, $id)
    {
        //
        $user = Madeexpense::findOrfail($id);

$this->validate($request,[
    'expense'   => 'required | String |max:191',
    'description'   => 'required',
    'amount'  => 'required',
    'datemade'  => 'required',
    'branch'  => 'required'
]);

 
     
$user->update($request->all());
    }

   
    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Madeexpense::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
