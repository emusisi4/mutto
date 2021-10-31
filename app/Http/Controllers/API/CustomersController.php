<?php

namespace App\Http\Controllers\API;
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
class CustomersController extends Controller
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
        ->paginate(50);
      }


    
      
    }

 
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
       'customername'   => 'required  |max:191',
       'description'   => 'required  |max:225',
       'location' => 'required',
       'customertype' => 'required',
       'contact'   => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];



       return Customer::Create([
    

      'customername' => $request['customername'],
     'location'=> $request['location'],
      'contact' => $request['contact'],
      'customertype' => $request['customertype'],
      'description' => $request['description'],
      'bal' => $request['balance'],
      'ucret' => $userid,
    
  ]);
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
  $customername = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('customername');
  $startdate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('enddate');

 return   Customerstatement::with(['customerName','createdbyName'])->orderBy('transactiondate', 'Asc')
 /// return   Customerstatement::orderBy('id', 'Desc')
  ->whereBetween('transactiondate', [$startdate, $enddate])
  
 ->where('customername', $customername)
//   ->where('del', 0)
    ->paginate(90);





  
}

    public function satecustomerstatementtoview(){
   
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
