<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Expense extends Authenticatable
{
    use HasApiTokens, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expensename', 'expensecategory', 'expenseno','ucret','expensetype','description','approvaltype'
    ];
    

    public function ExpenseTypeconnect(){
        // creating a relationship between the students model 
        return $this->belongsTo(Expensetype::class, 'expensetype'); 
    }
    
    public function expenseWallet(){
     
         return $this->hasMany(Madeexpense::class, 'walletexpense', 'id'); 
     //   return $this->belongsTo(Expensewalet::class, 'walletexpense');
      }
    public function expenseName(){
        // creating a relationship between the students model 
        return $this->hasMany(Madeexpense::class, 'expense', 'id'); 
    }
    public function expenseCategory(){
        // creating a relationship between the students model 
        return $this->belongsTo(Expensescategory::class, 'expensecategory'); 
    }



   
    protected $hidden = [
      //  'hid', 'id',
    ];
}
