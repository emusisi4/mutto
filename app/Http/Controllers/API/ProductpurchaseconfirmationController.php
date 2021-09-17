<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Productprice;
use App\Branch;
use App\Purchase;

class ProductpurchaseconfirmationController extends Controller
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
    
      return   Unitmeasure::latest('id')->paginate(20);
      }


    
      
    }

       public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
     'unitname'   => 'required  |max:191',
     //'rop'   => 'required  |max:191',
     'shotcode'   => 'required  |max:5'
       // 'iconclass'   => 'required',
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];

$dateinq =  $request['datedone'];


       return Unitmeasure::Create([
    

      'unitname' => $request['unitname'],
    //  'rop' => $request['rop'],
      'shotcode' => $request['shotcode'],
     
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
     ///   $user = Unitmeasure::findOrfail($id);

     $this->validate($request,[
        'unitprice'   => 'required  |max:191',
        'qtydelivered'   => 'required  |max:191',
        'unitsellingprice'   => 'required  |max:191',
        'deliverydate'   => 'required'
        
      
          ]);
      





$qtydelivered = $request['qtydelivered'];
$newsellingprice = $request['unitsellingprice'];
$datedelivered = $request['deliverydate'];
     $recordinquestion = $id;
/// getting the invoice DEtails
$userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $supplierinvoiceno = \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
/// GEtting the product in question
$productnumber = \DB::table('purchases')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('productcode');
$purchasecostforunit = \DB::table('purchases')->where('id', '=', $id)->value('unitprice');
$oldinvoicevat =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('totalvat');



$oldinvoicetotal =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('finalcost');
$newamounttoaddtoinvoice = $qtydelivered*$purchasecostforunit;
$newconfirmedinvoicetotal = $oldinvoicetotal+$newamounttoaddtoinvoice;


/// Vat calculation on deliveries
$vatstat = \DB::table('purchases')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('vatstatus');
if($vatstat == '1')
{
  $vattotalcurrentbasedonquantitydelivered = 0;
}
if($vatstat != '1')
{
  $vattotalcurrentbasedonquantitydelivered = ($qtydelivered)*($purchasecostforunit*0.18);
}
$newinvoicevat =  $vattotalcurrentbasedonquantitydelivered+$oldinvoicevat;
/// checking if the product exists in the products that can be sold
$productexistanceinsellingproducts = \DB::table('productprices')->where('productcode', '=', $productnumber)->count();
/// working on the costprice

if($productexistanceinsellingproducts > 0)
{
    $oldcostprice = \DB::table('productprices')->where('productcode', '=', $productnumber)->value('unitcost');
    $oldsellingprice = \DB::table('productprices')->where('productcode', '=', $productnumber)->value('unitprice');
    $oldquantityavailable = \DB::table('productprices')->where('productcode', '=', $productnumber)->value('qtyavailable');
   //echo round(3.6, 0);      // 4

    
    $newcostprice =     round((($purchasecostforunit+$oldcostprice)/2),0);
    $newquantity = $oldquantityavailable+$qtydelivered;
}
if($productexistanceinsellingproducts < 1)
{
    $oldcostprice = 0;
    $oldsellingprice = 0;
    $oldquantityavailable = 0;
    $newcostprice = ($purchasecostforunit);
    $newquantity = $oldquantityavailable+$qtydelivered;
}

      /// Getting the Current Stock quantity
/// updating the samaries
 ///// Updating the product prices for the Pos

 if($productexistanceinsellingproducts > 0)
 {
     DB::table('productprices')->where('productcode', $productnumber)
             ->update(array(
                 'unitcost' => $newcostprice,
                 'qtyavailable' => $newquantity,
                 'lineprofit' => $newsellingprice-$newcostprice,
                 'profitperc' => (($newsellingprice-$newcostprice)/($newcostprice)*100),
                 'unitprice' =>  $newsellingprice
             ));
         }
  
      

    ///// Updating the product prices for the Pos

if($productexistanceinsellingproducts < 1)
{
    DB::table('productprices')
            ->where('productcode', $productnumber)
            ->update(array(
                'unitcost' => $newcostprice,
                'qtyavailable' => $newquantity,
                'lineprofit' => $newsellingprice-$newcostprice,
                'profitperc' => (($newsellingprice-$newcostprice)/($newcostprice)*100),
                'unitprice' =>  $newsellingprice
            
            
            
            ));


            Productprice::Create([
       'productcode' => $productnumber,
       'unitcost' => $newcostprice,
        'qtyavailable' => $newquantity,
        'lineprofit' => $newsellingprice-$newcostprice,
        'profitperc' => (($newsellingprice-$newcostprice)/($newcostprice)*100),
        'unitprice' => $newsellingprice,
         'ucret' => $userid,
            
          ]);
        }
  
//////
//updating the vat wallet for vat input vat
// getting the current input vat
$currentinputvat = \DB::table('expensewalets')->where('walletno', '=', 5)->value('bal');
$newinputvat =  $vattotalcurrentbasedonquantitydelivered;
$updatedinputtotal = $currentinputvat+$newinputvat;
DB::table('expensewalets')->where('walletno', 5)->update(array('bal' => $updatedinputtotal));

////
//////////////////////////////////////////////////////////////////////////// Purchase summaries
 DB::table('purchasessummaries')->where('supplierinvoiceno', $supplierinvoiceno)->update(array('totalvat' => $newinvoicevat,'finalcost' => $newconfirmedinvoicetotal));
//////////////////////////////////////////////////////////////////////////// Product quantity
DB::table('products')->where('id', $productnumber)->update(array('qty' => $newquantity));
//////////////////////////////////////////////////////////////////////////// Purchases
DB::table('purchases')->where('id', $id)->update(array('status' => 1,'qtydelivered' => $qtydelivered,'datedelivered' => $datedelivered,
'ucretconfirmeddelivery' => $userid,'linecostdelivery' => $purchasecostforunit,'totalcostdelivery'=> $purchasecostforunit*$qtydelivered));

        
    }

  
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

     /// getting the product details
     
     $productid =\DB::table('purchases')->where('id', '=', $id)->value('productcode');
     $supplierinvoiceno =\DB::table('purchases')->where('id', '=', $id)->value('supplierinvoiceno');
     
     $vattotal =\DB::table('purchases')->where('id', '=', $id)->value('vattotal');
     $tendecostproduct =\DB::table('purchases')->where('id', '=', $id)->value('grandtotal');

     $expectedvat =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('expectedvat');
     $tendercost =\DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $supplierinvoiceno)->value('tendercost');
     $newtendercost = $tendercost-$tendecostproduct;
     $newexpectedvat = $expectedvat - $vattotal;
////


     /// updating the 
     DB::table('purchasessummaries')->where('supplierinvoiceno', $supplierinvoiceno)->update(array('expectedvat' => $newexpectedvat,'tendercost' => $newtendercost));
        $user = Purchase::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
