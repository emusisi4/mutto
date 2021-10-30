<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Productsale extends Authenticatable
{
    use HasApiTokens, Notifiable;


   
    protected $fillable = [
       'vatamount','linevat','netinvoiceincome', 'productcode','quantity','unitcost','totalcost','lineprofit',
        'datesold', 'status','ucret','branch','linetotal','unitprice','supplier','unitmeasure','invoiceno',
        'netunitsalewithoutvat','netsalewithoutvat','itemreceiptno','monthmade','yearmade','saletype'
       
    ];
    public function productName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Product::class, 'productcode'); 
    }
    public function unitmeasureProductssold(){
        // creating a relationship between the students model 
        return $this->belongsTo(Unitmeasure::class, 'unitmeasure'); 
    }
  
    public function productSaleuser(){
        // creating a relationship between the students model 
        return $this->belongsTo(User::class, 'ucret'); 
    }

    public function branchName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
    }


    public function brandName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Brand::class, 'brand'); 
    }
    public function productCategory(){
        // creating a relationship between the students model 
        return $this->belongsTo(Productcategory::class, 'category'); 
    }
    
    public function unitMeasuresproductsales(){
        
        return $this->belongsTo(Unitmeasure::class, 'unitmeasure'); 
    }
    public function unitMeasure(){
        
        return $this->belongsTo(Unitmeasure::class, 'unitmeasure'); 
    }
    public function productSupplier(){
        
        return $this->belongsTo(Supplier::class, 'supplier'); 
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
