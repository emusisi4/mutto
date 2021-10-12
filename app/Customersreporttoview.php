<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customersreporttoview extends Authenticatable
{
    use HasApiTokens, Notifiable;


    
   
    protected $fillable = [
      'customername', 'ucret', 'startdate', 'enddate'
    ];
    
    public function customerName(){
      // creating a relationship between the students model 
      return $this->hasMany(Branchanduser::class, 'customername', 'id'); 
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
