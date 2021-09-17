<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Productprice extends Authenticatable
{
    use HasApiTokens, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

   
    protected $fillable = [
        'productcode','lineprofit', 'unitcost', 'unitprice','ucret','profitperc','qtyavailable'
       
    ];
    
    public function brandName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Brand::class, 'brand'); 
    }
    public function productName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Product::class, 'productcode'); 
    }
    public function SupplierName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Supplier::class, 'suppliername'); 
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
