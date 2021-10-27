<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Madeexpense extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'expense','explevel','walletexpense','category','exptype', 'amount', 
        'datemade','ucret','branch','description','approvalstate','monthmade','yearmade','approvaltype'
    ];
    

    public function expenseName(){
        
        return $this->belongsTo(Expense::class, 'expense'); 
    }

   
    public function branchName(){
      
        return $this->belongsTo(Branch::class, 'branch'); 
    }
    public function branchnameDailycodes(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
    }
    public function ExpenseTypeconnect(){
     
        return $this->belongsTo(ExpenseType::class, 'expensetype'); 
    }
    public function expenseCategory(){
      
        return $this->belongsTo(Expensescategory::class, 'expensecategory'); 
    }
    public function expenseWallet(){
      
        return $this->belongsTo(Expensewalet::class, 'walletexpense'); 
    }
    public function expenseCategoryrpt(){
        // creating a relationship between the students model 
        return $this->belongsTo(Expensescategory::class, 'category'); 
      }

      public function expenseTyperpt(){
        return $this->belongsTo(Expensetype::class, 'exptype');
      }
   
    protected $hidden = [
      //  'hid', 'id',
    ];
}
