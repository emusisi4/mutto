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
use App\Productcategoriesfilter;

class ProductrecordsFilterController extends Controller
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

       
        /// checking if there exists a record
         $numbero = \DB::table('productcategoriesfilters')->where('ucret', '=', $userid)->count();
        
if($numbero > 0)
{

/// Updating an existing record for the user


$productcategory = $request['iteminquestion'];

$displaynumber = $request['displaynumber'];
$productcategory2 = strlen($productcategory);
$displaynumber2 = strlen($displaynumber);

if($productcategory2 > 0)
{
    DB::table('productcategoriesfilters')
            ->where('ucret', $userid)
            ->update(array(
                'productcategory' => $request['iteminquestion']
              //  'expensename' =>  $request['expensename']
            
            
            
            ));
        }
 
        if($displaynumber2 > 0)
        {
            DB::table('productcategoriesfilters')
                    ->where('ucret', $userid)
                    ->update(array(
                        'displaynumber' => $request['displaynumber']
                      //  'expensename' =>  $request['expensename']
                    
                    
                    
                    ));
                }
              

        }/// end of update




/// creating a new record for Non Existance
        
  $datepaid = date('Y-m-d');
    
  if($numbero < 1){
       return Productcategoriesfilter::Create([
      
       'productcategory' => $request['iteminquestion'],
      // 'expensename' => $request['branchname'],
       'ucret' => $userid,
     
    
  ]);
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
