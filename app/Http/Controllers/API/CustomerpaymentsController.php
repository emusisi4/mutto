<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Customer;
use App\Customersreporttoview;
use App\Customerstatement;
use App\Customerpayment;
class CustomerpaymentsController extends Controller
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
    //  return   Product::with(['userbalancingBranch','branchinBalance'])->latest('id')
   // return   Productcategory::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
      return   Customer::latest('id')
       //  return   Branchpayout::latest('id')
        // ->where('branch', $userbranch)
        ->paginate(20);
      }


    
      
    }

 
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
    //   'customername'   => 'required  |max:191',
       'narration'   => 'required  |max:225',
       'dop' => 'required',
       'mop' => 'required',
       'recievingwallet' =>'required',
       'amountpaid'   => 'required'
     //  'dorder'   => 'sometimes |min:0'
     ]);



$walletrecieving =  $request['recievingwallet'];



     $userid =  auth('api')->user()->id;
$currentcustomerbalance = $request['bal'];
  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];

$currentwalletinactionbalance = \DB::table('expensewalets')->where('id', $walletrecieving )->value('bal');
Customerpayment::Create([
     'customername' => $request['id'],
     'amountpaid'=> $request['amountpaid'],
      'datepaid' => $request['dop'],
      'description' => $request['narration'],
      'reccievedby' => $userid,
      'mop' => $request['mop'],
      'ucret' => $userid, 
  ]);

/// Updating the customer Statement
Customerstatement::Create([
   'customername' =>  $request['id'],
    'openningbal' => $currentcustomerbalance,
   'transactiontype' => 2,
    'transactiondate' =>$request['dop'],  
    'description'=> 'Customer Payment',
    'debitamount'=> $request['amountpaid'],
  
    'resultatantbalance' => $currentcustomerbalance - $request['amountpaid'],
   
              'ucret' => $userid,
            
          ]);
          $bec = $request['amountpaid'];
$newwalbal = $currentwalletinactionbalance+$bec;

          /// Updatint the Custoomer balance
  DB::table('customers')->where('id', $request['id'])->update(['bal' =>  $currentcustomerbalance - $request['amountpaid']]);
  /// Updating the collection wallet
  DB::table('expensewalets')->where('id', $walletrecieving)->update(['bal' =>  $newwalbal]);

    }
//     public function customerstamento(){
   
//       $userid =  auth('api')->user()->id;
//       $userbranch =  auth('api')->user()->branch;
//       $userrole =  auth('api')->user()->type;
//       $existanceinthetable = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->count();
     
     
     
//       if($existanceinthetable < 1 )
//       { Customersreporttoview::Create([
//         //  'branch', 'ucret','startdate','enddate',
//           //    'productcode' => $request['productcode'],
//               'customername' => $request['customername'],
//               // 'enddate' => $request['enddate'],
//               // 'supplier' => $request['suppliername'],
//               'ucret' => $userid,
            
//           ]);
// }
// if($existanceinthetable > 0 )
// { 
//   Customersreporttoview::Create([
//   //  'branch', 'ucret','startdate','enddate',
//     //    'productcode' => $request['productcode'],
//         'startdate' => $request['startdate'],
//         'enddate' => $request['enddate'],
//         'supplier' => $request['suppliername'],
//         'ucret' => $userid,
      
//     ]);
// }
// }
       
public function customerstatementrecords()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $productcategory = \DB::table('productdetailsfilters')->where('ucret', $userid )->value('productcategory');
  $startdate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('salesreporttoviews')->where('ucret', $userid )->value('enddate');

 return   Customerstatement::with(['customerName','createdbyName'])->orderBy('transactiondate', 'Asc')
 /// return   Customerstatement::orderBy('id', 'Desc')
//  ->whereBetween('datesold', [$startdate, $enddate])
  
//  ->where('brand', $productbrand)
//   ->where('del', 0)
    ->paginate(90);





  
}

    public function customerstamento(){
   
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $existanceinthetable = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->count();
       
       
       
        if($existanceinthetable < 1 )
        { Customersreporttoview::Create([
          //  'branch', 'ucret','startdate','enddate',
            //    'productcode' => $request['productcode'],
                'customername' => $request['customername'],
                // 'enddate' => $request['enddate'],
                // 'supplier' => $request['suppliername'],
                'ucret' => $userid,
              
            ]);
}
if($existanceinthetable > 0 )
{ 
  $result = DB::table('customersreporttoviews')
  ->where('ucret', $userid)
  ->update([
    'customername' => $request['customername']
  ]);
}
}
    public function show($id)
    {
        //
    }
  
    
    public function update(Request $request, $id)
    {
        //
        $user = Customer::findOrfail($id);

$this->validate($request,[
  'customername'   => 'required  |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

 
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Customer::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
