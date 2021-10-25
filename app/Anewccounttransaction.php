<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anewccounttransaction extends Authenticatable
{
    use HasApiTokens, Notifiable;


   
    protected $fillable = [
        'transactiondate', 'transactiontype','ucret','amount','walletinaction','accountresult','transactionno','yearmade','monthmade','transactionno'       
    ];
    

    public function students(){
   
        return $this->hasMany(Product::class, 'category', 'id'); 
    }
    public function expenseCategoryrpt(){
   
        return $this->hasMany(Madeexpense::class, 'category', 'id'); 
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
