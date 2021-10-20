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


class InvoicenumberinactionController extends Controller
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
        $supplierinvoiceno = \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
       
  
      
    //   return   Purchase::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderby('datedone', 'Asc')
   // return   Purchase::latest('id')
    return   Purchase::with(['productName','supplierName'])->orderBy('id', 'Desc')  
        ->where('supplierinvoiceno', $supplierinvoiceno)
      
        ->paginate(35);
    
    

      
    }


    public function store(Request $request)
    {
       
        $userid =  auth('api')->user()->id;

       
//         /// checking if there exists a record
//          $numbero = \DB::table('productdetailsfilters')->where('ucret', '=', $userid)->count();
//          $productcategory = $request['iteminquestion'];
// $brand = $request['brandname'];

// $displaynumber = $request['displaynumber'];
// $productcategory2 = strlen($productcategory);
// $brand2 = strlen($brand);
// $displaynumber2 = strlen($displaynumber);

        
// if($numbero > 0)


/// Updating an existing record for the user


$invoiceinaction = $request['invoiceinaction'];



        // if($brand2 > 0)
        // {
        //     DB::table('productdetailsfilters')
        //             ->where('ucret', $userid)
        //             ->update(array(
        //                 'productbrand' => $request['brandname']
        //               //  'expensename' =>  $request['expensename']
                    
                    
                    
        //             ));
        //         }
         
        // if($displaynumber2 > 0)
        // {
        //     DB::table('productdetailsfilters')
        //             ->where('ucret', $userid)
        //             ->update(array(
        //                 'displaynumber' => $request['displaynumber']
        //               //  'expensename' =>  $request['expensename']
                    
                    
                    
        //             ));
        //         }
              

        // }/// end of update




/// creating a new record for Non Existance
        
  $datepaid = date('Y-m-d');
    
//   if($numbero < 1){
//       {
//           if($productcategory2 > 0)
//        return Productdetailsfilter::Create([
      
//        'productcategory' => $request['iteminquestion'],
//       // 'expensename' => $request['branchname'],
//        'ucret' => $userid,
     
    
//   ]);
// }
{
    DB::table('invoicetoviews')->where('ucret', $userid)->delete();

 return Invoicetoview::Create([

 'invoiceno' => $request['invoiceinaction'],

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

       // $user = Branchpayout::findOrFail($id);
       // $user->delete();
     //   return['message' => 'user deleted'];
     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     $userrole =  auth('api')->user()->type;
     $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
     $doccumentno =    \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoiceno)->value('purchaseno');
     /// getting the suppplier ig
     $supplieridno =    \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoiceno)->value('suppliername');

     DB::table('purchasessummaries')
     ->where('supplierinvoiceno', $invoiceno)
     ->update(array(
         'invoicelockstatus' => 1
       //  'expensename' =>  $request['expensename']
     
     
     
     ));
     DB::table('purchases')
     ->where('supplierinvoiceno', $invoiceno)
     ->update(array(
         'invoicelockstatus' => 1
       //  'expensename' =>  $request['expensename']
     
     
     
     ));

     /// getting the current supplier balance
     $doccumentno =    \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoiceno)->value('purchaseno');
 

    }
}
