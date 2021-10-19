<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Itemtransitdetail extends Authenticatable
{
    use HasApiTokens, Notifiable;


  
    
    protected $fillable = [
       'itemfrom', 'qtyfrom', 'unitmeasurefrom', 'itemto', 'qtyto', 'unitmeasureto', 'transactiondate', 'ucret', 'status'
    ];
    //public function maincomponentSubmenus(){
        // creating a relationship between the students model 
      //  return $this->belongsTo(Mainmenucomponent::class, 'mainheadercategory'); 
 //   }

 public function usernameTransferfrom(){
    // creating a relationship between the students model 
    return $this->belongsTo(User::class, 'transferfrom'); 
}
public function usernameTransferto(){
    // creating a relationship between the students model 
    return $this->belongsTo(User::class, 'transferto'); 
}

    protected $hidden = [
      //  'hid', 'id',
    ];
}
