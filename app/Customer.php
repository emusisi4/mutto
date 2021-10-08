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
    'customername', 'contact', 'location', 'del',  'ucret', 'bal', 'status', 'description'       
    ];
    

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
