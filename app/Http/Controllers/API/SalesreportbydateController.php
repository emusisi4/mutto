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
use App\Madeexpense;
use App\Productsale;

class SalesreportbydateController extends Controller
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

     $startdat = DB::table('expensereporttoviews')->where('ucret', $userid)->value('startdate');
     $enddate = DB::table('expensereporttoviews')->where('ucret', $userid)->value('enddate');
     $branchto = DB::table('expensereporttoviews')->where('ucret', $userid)->value('branch');
     $reporyttype = DB::table('expensereporttoviews')->where('ucret', $userid)->value('reporttype');


     if($reporyttype == "salesdetailsbybranch" and $branchto != '900')
      {
        return   Productsale::with(['productName'])->orderBy('datesold', 'DESC')
      //  return   Productsale::orderBy('datesold', 'DESC')
        //  ->groupBy('datesold')->select('datesold')
         // ->sum(('linetotal'))
         ->where('branch', $branchto)
             ->whereBetween('datesold', [$startdat, $enddate])
             
               ->paginate(30);
      
      
      }

     


      if($reporyttype == "salesdetailsbybranch" and $branchto = '900')
      {
     //   return   Productsale::orderBy('datesold', 'DESC')
     return   Productsale::with(['productName'])->orderBy('datesold', 'DESC')
        //  ->groupBy('datesold')->select('datesold')
         // ->sum(('linetotal'))
             ->whereBetween('datesold', [$startdat, $enddate])
             
               ->paginate(30);
      
    }
      
    }

    public function store(Request $request)
    {
  
//$startdat = DB::table('incomereporttoviews')->where('ucret', $userid)->value('startdate');



       $this->validate($request,[
        'expense'   => 'required | String |max:191',
        'description'   => 'required',
        'amount'  => 'required',
        'datemade'  => 'required',
        'branch'  => 'required',
       // 'expensetype'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     //$hid = $id1+1;
     $exp = $request['expense'];
     $expcat = \DB::table('expenses')->where('expenseno', $exp )->value('expensecategory');
//$expcat =  Expense::where('id', $exp)->value('expensecategory');
     $exptyo = \DB::table('expenses')->where('expenseno', $exp)->value('expensetype');
     
  //       $dats = $id;
       return Madeexpense::Create([
      'expense' => $request['expense'],
     //'expenseno' => $hid,
      'description' => $request['description'],
      'amount' => $request['amount'],
      'datemade' => $request['datemade'],
      'branch' => $request['branch'],
      'category' => $expcat,
      'exptype' => $exptyo,
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
