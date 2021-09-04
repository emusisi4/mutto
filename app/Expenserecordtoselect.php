<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Expenserecordtoselect extends Authenticatable
{
    use HasApiTokens, Notifiable;


  
    
    protected $fillable = [
        'expensename', 'branch', 'ucret','displaynumber',
    ];
    

    // public function ExpenseTypeconnect(){
    //     // creating a relationship between the students model 
    //     return $this->belongsTo(ExpenseType::class, 'expensetype'); 
    // }

    // public function expenseCategory(){
    //     // creating a relationship between the students model 
    //     return $this->belongsTo(Expensescategory::class, 'expensecategory'); 
    // }



    protected $hidden = [
      //  'hid', 'id',
    ];
}
