<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cashtransfer extends Authenticatable
{
    use HasApiTokens, Notifiable;


  
    
    protected $fillable = ['transerdate','transferfrom','transferto','yeardone','amount','description',
        'ucret','monthdone', 'transactionno','accountinact','transfertype','destination'
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
public function accountTransferfrom(){
    // creating a relationship between the students model 
    return $this->belongsTo(Expensewalet::class, 'accountinact'); 
}
public function accountTransferto(){
    // creating a relationship between the students model 
    return $this->belongsTo(Expensewalet::class, 'destination'); 
}

public function transferingUser(){
    // creating a relationship between the students model 
    return $this->belongsTo(User::class, 'ucret'); 
}
public function acceptinguserUser(){
    // creating a relationship between the students model 
    return $this->belongsTo(User::class, 'ucomplete'); 
}
    protected $hidden = [
      //  'hid', 'id',
    ];
}
