<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Unitmeasure extends Authenticatable
{
    use HasApiTokens, Notifiable;


   
   
    protected $fillable = [
        'unitname', 'shotcode', 'ucret',
       
    ];
    

    public function unitMeasure(){
   
        return $this->hasMany(Product::class, 'unitmeasure', 'id'); 
    }
    public function supp(){
        // creating a relationship between the students model 
        return $this->belongsTo(Product::class, 'supplier'); 
    }


    
    protected $hidden = [
      //  'hid', 'id',
    ];
}
