<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Custinactionsprof extends Authenticatable
{
    use HasApiTokens, Notifiable;


  
   
    protected $fillable = [
    'customername', 'ucret', 'invoicesalesdate'       
    ];
    
    public function branchnameBranchmachines(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branchname'); 
    }
    public function machinenameBranchmachines(){
        // creating a relationship between the students model 
        return $this->belongsTo(Machine::class, 'machinename'); 
    }

    public function branchNamebettingproduct(){
        // creating a relationship between the students model 
        return $this->hasMany(Branchandproduct::class, 'id', 'product'); 
      }
    
    public function brandName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Brand::class, 'brand'); 
    }
     
    public function vnnnmmjjh(){
        // creating a relationship between the students model 
        return $this->hasMany(Shopingcat::class, 'productcode', 'id'); 
    }
    public function productCategory(){
        // creating a relationship between the students model 
        return $this->belongsTo(Productcategory::class, 'category'); 
    }
    public function unitMeasure(){
        
        return $this->belongsTo(Unitmeasure::class, 'unitmeasure'); 
    }
    public function productSupplier(){
        
        return $this->belongsTo(Supplier::class, 'supplier'); 
    }

  
  

    public function cbscde(){
      
        return $this->hasMany(Ordermaking::class, 'productname', 'id'); 
    }



    public function vvnhhgdd(){
      
        return $this->hasMany(Productsale::class, 'productcode', 'id'); 
    }






















    public function expenseCategory(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'bpaying'); 
    }
    public function payingUserdetails(){
        // creating a relationship between the students model 
        return $this->belongsTo(User::class, 'ucret'); 
    }
    public function userbalancingBranch(){
        // creating a relationship between the students model 
        return $this->belongsTo(User::class, 'ucret'); 
    }
    public function branchinBalance(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
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
