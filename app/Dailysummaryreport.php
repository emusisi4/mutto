<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dailysummaryreport extends Authenticatable
{
    use HasApiTokens, Notifiable;
   
    protected $fillable = [
        'invoiceno','netinvoiceincome', 'branch','totalcost','lineprofit', 'invoiceamount',
         'invoicedate', 'ucret','vatamount', 'monthmade','yearmade','datedone','netsalewithoutvat','netunitsalewithoutvat'
       
    ];
    public function productName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Product::class, 'productcode'); 
    }
    
    public function branchName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
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
    


    protected $hidden = [
      //  'hid', 'id',
    ];
}
