<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mlyrpt extends Authenticatable
{
    use HasApiTokens, Notifiable;

   
   
    protected $fillable = [
    'branch','ucret','sales',
   
    'payout','collections',
    'credits','profit',
    'expenses','dorder','monthdone','yeardone','ntrevenue',
  'virtualsales',
  'virtualcancelled',
  'virtualpayout',
  'virtualprofit',
    ];
    //public function maincomponentSubmenus(){
        // creating a relationship between the students model 
      //  return $this->belongsTo(Mainmenucomponent::class, 'mainheadercategory'); 
 //   }

    protected $hidden = [
      //  'hid', 'id',
    ];
    public function branchnameDailycodes(){
      // creating a relationship between the students model 
      return $this->belongsTo(Branch::class, 'branch'); 
  }
}
