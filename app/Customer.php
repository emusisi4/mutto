<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasApiTokens, Notifiable;


    
   
    protected $fillable = [
    'customername', 'contact', 'location', 'del',  'ucret', 'bal', 'status', 'description','customertype'      
    ];
    
    public function customerName(){
      // creating a relationship between the students model 
      return $this->hasMany(Branchanduser::class, 'customername', 'id'); 
  }
  public function cusName(){
    // creating a relationship between the students model 
    return $this->hasMany(Customerpayment::class, 'customername', 'id'); 
}
  public function suppName(){
    // creating a relationship between the students model 
    return $this->hasMany(Purchase::class, 'suppliername', 'id'); 
}

    public function supplierCompany(){
        // creating a relationship between the students model 
        return $this->belongsTo(Company::class, 'company'); 
    }
    

    protected $hidden = [
      //  'hid', 'id',
    ];
}
