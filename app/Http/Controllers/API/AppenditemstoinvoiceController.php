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
use App\Purchase;
use App\Invoicetoview;
use App\Productdetailsfilter;


class AppenditemstoinvoiceController extends Controller
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

/// Getting the active invoice
      //  $supplierinvoiceno = \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
       
  
      
    //   return   Purchase::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderby('datedone', 'Asc')
    return   Purchase::latest('id')
      
     //   ->where('supplierinvoiceno', $supplierinvoiceno)
      
        ->paginate(35);
    
    

      
    }


    public function store(Request $request)
    {
       
        $userid =  auth('api')->user()->id;
// Getting the Invoice to work on 
$this->validate($request,[
     'productonpurchase'   => 'required |max:191',
       'vatinclussive'   => 'required',

      // 'dorder'   => 'sometimes |min:0'
    ]);
$supplierinvoiceno = \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
$suppliername = \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('suppliername');
$invoiceno = \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('purchaseno');
$dateordered = \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('invoicedate');
$currentinvoivetax = \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('expectedvat');
       ////getting the current invoice total

$currentinvoicetotal = \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->sum('tendercost');
$currentinvoicevat = \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->sum('expectedvat');
$newamount = $request['totalcost'];
$vatstatus = $request['vatinclussive'];
$newtotalinvoiceamount = $currentinvoicetotal+$newamount;
$ttpc = $request['totalcost'];
$newtotalinvoiceamount = $currentinvoicetotal+$newamount;
//////////
$givenunitcost = $request['unitcost'];
$qtttty = $request['quantity'];

// calculating the vat amount

//// calculating vat total
if($vatstatus == '2')
{
    $vatamount = ($request['totalcost'])*(0.18);
    $totalproductcost = $ttpc-$vatamount;
    $exactunitcost = $givenunitcost-($vatamount/$qtttty);
    $unitvat = $vatamount/$qtttty;
    $lineproductcost = $exactunitcost+$unitvat;
}
if($vatstatus == '1')
{
    $vatamount = 0;
    $totalproductcost = $ttpc;
    $exactunitcost = $givenunitcost;
    $unitvat = 0;
    $lineproductcost = $exactunitcost+$unitvat;
}
if($vatstatus == '3')
{
    $vatamount = ($request['totalcost'])*(0.18);
    $totalproductcost = $ttpc;
    $exactunitcost = $givenunitcost;
    $unitvat = $vatamount/$qtttty;
    $lineproductcost = $exactunitcost+$unitvat;
}

$newinvoicetotalvat = $currentinvoivetax+$vatamount;   
  $datepaid = date('Y-m-d');
  

  //  DB::table('invoicetoviews')->where('ucret', $userid)->delete();
//   id, productcode, unitprice, quantity, dateordered, ucret, status,
//    created_at, updated_at, branch, 
//    mainunitmeasure, smallunitmeasure, grandtotal, linetotal, invoiceno, suppliername, supplierinvoiceno
 Purchase::Create([

 'productcode' => $request['productonpurchase'],
 'unitprice' => $exactunitcost,
 'quantity' => $request['quantity'],
 'dateordered' => $dateordered,
 'invoiceno' => $invoiceno,
 'suppliername' => $suppliername,
 'supplierinvoiceno'=> $supplierinvoiceno,
 'linetotal'=>$totalproductcost,
 'vatstatus'=>$vatstatus,
 'grandtotal'=>$totalproductcost+$vatamount,
 'vattotal'=>$vatamount,
 'unitvat' => $unitvat,
 'lineproductcost' => $lineproductcost,
 'ucret' => $userid,


]);

      
             DB::table('purchasessummaries')
                   ->where('supplierinvoiceno', $supplierinvoiceno)
               ->update(array(
                       'tendercost' => $newtotalinvoiceamount,
                      'expectedvat' =>  $newinvoicetotalvat
                    
                    
                    
                   ));
        //         }
         
      












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
