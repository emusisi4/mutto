<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customerpayment extends Authenticatable
{
    use HasApiTokens, Notifiable;


    
   
    protected $fillable = [
       'customername', 'amountpaid', 'datepaid', 'reccievedby', 'description','mop', 'ucret','receiptno','accountdebited','accountcredited'
    ];
    
    public function customerName(){
      // creating a relationship between the students model 
      return $this->hasMany(Branchanduser::class, 'customername', 'id'); 
  }

    public function cusName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Customer::class, 'customername'); 
    }
    public function branfName(){
      // creating a relationship between the students model 
      return $this->belongsTo(Branch::class, 'branchname'); 
  }
  public function transUser(){
    // creating a relationship between the students model 
    return $this->belongsTo(User::class, 'ucret'); 
}

public function debitAccoubt(){
  // creating a relationship between the students model 
  return $this->belongsTo(Expensewalet::class, 'accountdebited'); 
}
public function creditAccoubt(){
  // creating a relationship between the students model 
  return $this->belongsTo(Expensewalet::class, 'accountcredited'); 
}
  
    public function supplierCompany(){
      // creating a relationship between the students model 
      return $this->belongsTo(Company::class, 'company'); 
  }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      //  'hid', 'id',
    ];
}
