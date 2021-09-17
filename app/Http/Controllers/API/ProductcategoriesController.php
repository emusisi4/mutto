<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Productcategory;

class ProductcategoriesController extends Controller
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
/// Getting the Selection

     $productcategory = \DB::table('productcategoriesfilters')->where('ucret', $userid )->value('productcategory');
     $displaynumber = \DB::table('productcategoriesfilters')->where('ucret', $userid )->value('displaynumber');
      if($userrole != '900')
      {
  
      return   Productcategory::latest('id')
      
       ->where('del', 0)
      
        ->paginate($displaynumber);
      }

      if($userrole == '900')
      {
    
        return   Productcategory::latest('id')
   
      // ->where('del', 0)
        ->paginate($displaynumber);
      }

      
    }

    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
       'catname'   => 'required', 
       'description'   => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];

$dateinq =  $request['datedone'];


       return Productcategory::Create([
    

      'catname' => $request['catname'],
     
      'description' => $request['description'],
     
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
        $user = Productcategory::findOrfail($id);

$this->validate($request,[
  'catname'   => 'required  |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

  
    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Productcategory::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
