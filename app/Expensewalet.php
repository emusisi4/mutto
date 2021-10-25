<?php


namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Expensewalet extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'walletno', 'name', 'ucret','amount','walletname'
    ];
    
    public function students(){
     return $this->hasMany(Expense::class, 'expensetype', 'id'); 
  }
  public function expenseWallet(){
    return $this->hasMany(Madeexpense::class, 'walletexpense', 'id'); 
}



  
    protected $hidden = [
      //  'hid', 'id',
    ];
}