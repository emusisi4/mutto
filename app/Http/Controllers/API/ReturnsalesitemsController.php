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
use App\Productsale;
use App\Receipttoreturnitem;
class ReturnsalesitemsController extends Controller
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
    public function returnreceiptdetails()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
      
     
     $receiptno = DB::table('receipttoreturnitems')->where('ucret', $userid)->value('receiptid');
   
            return   Productsale::with(['productName'])->orderBy('id', 'Desc')
           ->where('invoiceno', $receiptno)
            //  ->where('brand', $productbrand)
        //    ->where('del', 0)
                  ->paginate(10);
        
    

      
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
        DB::table('receipttoreturnitems')->where('ucret', $userid)->delete();
        // $existanceinthetable = \DB::table('salesreporttoviews')->where('ucret', '=', $userid)->count();
        // if($existanceinthetable < 1 )
         Receipttoreturnitem::Create([
          'receiptid' => $request['receiptid'],
            
                'ucret' => $userid,
              
            ]);

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
