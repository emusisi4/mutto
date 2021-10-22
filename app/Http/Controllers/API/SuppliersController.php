<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Supplier;
use App\Supplierstatement;
class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
return   Supplier::with(['supplierCompany'])->latest('id')

///return   Supplier::latest('id')
//       //  return   Branchpayout::latest('id')
        // ->where('branch', $userbranch)
        ->paginate(20);
      }


     // if($userrole == '100')
      {
      
      
     // return   Product::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Product::latest('id')
       //  return   Branchpayout::latest('id')
    //     ->where('del', 0)
     //   ->paginate(20);
      
    }
      
    }

    
    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
   //   'company'   => 'required  |max:191',
   //id, suppname, description, created_at, 
   //updated_at, ucret, contact, location, company, contactofcontact, companycontactperson, del, companyemailaddress, tinnumber, bal
      'suppname'   => 'required',
      'tinnumber'   => 'required' ,
      'contact'   => 'required',
      'location'   => 'required',
      'description' => 'required'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];

$dateinq =  $request['datedone'];


       return Supplier::Create([
    
  //    'productcode' => $request['productcode'],
      'suppname' => $request['suppname'],
      'tinnumber' => $request['tinnumber'],
      'contact' => $request['contact'],
      'location' => $request['location'],
      'description' => $request['description'],
      // 'companycontactperson' => $request['companycontactperson'],
      // 'contact' => $request['contact'],
      // 'companyemailaddress' =>$request['companyemailaddress'],
      'ucret' => $userid,
    
  ]);
    }

  
    
    public function show($id)
    {
        //
    }
   //////////////////////////////////////////////////////////////////////////////////////


   public function softdelete(Request $request, $id)
   {
       //
       $user = Supplier::findOrfail($id);

$this->validate($request,[
//'productcode'   => 'required',
 //'unitprice'   => 'required',
// 'quantity'   => 'required'

   ]);

   $user->update([
       'del' => 1,
      
   ]);
    
///$user->update($request->all());
   }


 
   public function supplierstatementrecords()
   {
     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     $userrole =  auth('api')->user()->type;
     $customername = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('customername');
     $startdate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('startdate');
     $enddate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('enddate');
   
    return   Supplierstatement::with(['supplierName','createdbyName'])->orderBy('transactiondate', 'Asc')
    /// return   Customerstatement::orderBy('id', 'Desc')
     ->whereBetween('transactiondate', [$startdate, $enddate])
     
    ->where('suppliername', $customername)
   //   ->where('del', 0)
       ->paginate(90);
   
   
   
   
   
     
   }
   













    public function update(Request $request, $id)
    {
        //
        $user = Supplier::findOrfail($id);

$this->validate($request,[
  //'branchname'   => 'required | String |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

  
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Supplier::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
