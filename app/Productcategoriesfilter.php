<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Productcategoriesfilter extends Authenticatable
{
    use HasApiTokens, Notifiable;


  
    
    protected $fillable = [
        'productcategory','ucret','displaynumber',
    ];
    
///id, productcategory, displaynumber, ucret, created_at, updated_at
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
