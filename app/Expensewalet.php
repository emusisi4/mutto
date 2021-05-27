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
        'walletno', 'name', 'ucret','amount'
    ];
    
    public function students(){
      // creating a relationship between the students model 
      return $this->hasMany(Expense::class, 'expensetype', 'id'); 
  }
   
  
    protected $hidden = [
      //  'hid', 'id',
    ];
}