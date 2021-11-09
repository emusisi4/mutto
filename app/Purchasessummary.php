<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Purchasessummary extends Authenticatable
{
    use HasApiTokens, Notifiable;

    
   
    protected $fillable = [
        'purchaseno', 'tendercost', 'totalitems', 'ucret', 'del', 'finalcost', 'suppliername', 
        'supplierinvoiceno','invoicedate','totalvat','vatstatus','invoicelockstatus',
        'ordercostwithoutvat','deliverycostwithoutvat', 'totalinvoicewithvat'
       
    ];
    public function productName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Product::class, 'productcode'); 
    }
    public function supplierName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Customer::class, 'suppliername'); 
    }
    public function suppName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Customer::class, 'suppliername'); 
    }
    public function brandName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Brand::class, 'brand'); 
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
