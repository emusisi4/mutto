<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Codereset;
use App\Currentmachinecode;
use App\Dailyreportcode;
class CurrentmacinecodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }
    public function index()
    {
        return   Codereset::with(['machinecoderesetMachinename','machinecoderesetBranchname'])->latest('id')
  //return   Codereset::latest('id')

     // ->where('del', 0)
     ->paginate(20);

    }

    
    
    public function store(Request $request)
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
        $this->validate($request,[
         'machinename'   => 'required | max:191',
         'branch'   => 'required | max:191',
         'code'   => 'required'

          ]);
        //  $userid =  auth('api')->user()->id;
         ///
         
         
         
         Codereset::Create([
            'machinecode'   => $request['code'],
            'machine'   => $request['machinename'],
            'branch'   => $request['branch'],
            'ucret' => $userid,
         
  
                
        ]);
         Currentmachinecode::Create([
            'machinecode'   => $request['code'],
            'machineno'   => $request['machinename'],
            'branch'   => $request['branch'],
            'datedone'   => $request['branch'],
            'ucret' => $userid,
         
  
                
        ]);
//id, datedone, branch, machineno, openningcode, closingcode, salescode, payoutcode, profitcode, floatcode, previoussalesfigure, previouspayoutfigure, 
//currentpayoutfigure, currentsalesfigure, totalcredits, totalcollection, resetstatus, ucret, created_at, updated_at, dorder, daysalesamount, daypayoutamount, monthmade, yearmade

        Dailyreportcode::Create([
            'branch'   => $request['branch'],

            'machineno'   => $request['machinename'],
            'openningcode'   => $request['openningcode'],
           
            'closingcode'   => $request['closingcode'],
            'previoussalesfigure'   => $request['previoussalescode'],
            'previouspayoutfigure'   => $request['previouspayoutcode'],
            'currentsalesfigure'   => $request['previoussalescode'],
            'currentpayoutfigure'   => $request['previouspayoutcode'],
            'salescode'   => $request['previoussalescode'],
            'payoutcode'   => $request['previouspayoutcode'],



            // 'previoussalesfigure'   => $request['previoussalescode'],
            // 'previouspayoutfigure'   => $request['previouspayoutcode'],

            // 'previoussalesfigure'   => $request['previoussalescode'],
            // 'previouspayoutfigure'   => $request['previouspayoutcode'],






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
        $user = Codereset::findOrfail($id);

        $this->validate($request,[
            'machinecode'   => 'required | max:191',
            'machine'   => 'required | max:191',
            'branch'   => 'required | max:191',
            'code'   => 'required'
        
            ]);
        
        
    $user->update($request->all());
       // return ['message' => 'Userd updated'];
    }

    
    
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
    }
}
