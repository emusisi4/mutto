<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Authenticatable
{
    use HasApiTokens, Notifiable;


   
    protected $fillable = [
      

        'productname', 'uracode', 'category', 'unitmeasure', 'rol', 'qty', 'ucret',
         'brand', 'description', 'unitcost', 'unitprice', 'del','salesturnover',
         'discountstatus','discountedprice'
       
    ];
    
    

    
    
    public function brandName(){
    
        return $this->belongsTo(Brand::class, 'brand'); 
    }
    
    public function productName(){
       
        return $this->hasMany(Purchase::class, 'id', 'productcode'); 
    }
    public function productName2(){
       
        return $this->hasMany(Productprice::class, 'id', 'productcode'); 
    }
    public function vnnnmmjjh(){
    
        return $this->hasMany(Shopingcat::class, 'productcode', 'id'); 
    }
    public function productCategory(){
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
