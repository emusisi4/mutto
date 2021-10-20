<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supplier extends Authenticatable
{
    use HasApiTokens, Notifiable;



   
    protected $fillable = [
       
      'suppname', 'description', 'ucret', 'contact', 'location', 'company', 'contactofcontact', 'companycontactperson', 'del', 'companyemailaddress', 'tinnumber', 'bal'       
    ];
    

    public function supplierCompany(){
        // creating a relationship between the students model 
        return $this->belongsTo(Company::class, 'company'); 
    }
    public function supplierName(){
      // creating a relationship between the students model 
      return $this->hasMany(Purchase::class, 'id', 'suppliername'); 
  }


   
    protected $hidden = [
      //  'hid', 'id',
    ];
}
