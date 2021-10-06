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
    public function unitName(){
   
        return $this->hasMany(Salesreturn::class, 'unitofsalemeasure', 'id'); 
    }

    public function unitNamereturned(){
   
        return $this->hasMany(Salesreturn::class, 'unitreturned', 'id'); 
    }

    public function unitMeasureshopingcat(){
   
        return $this->hasMany(Shopingcat::class, 'unitmeasure', 'id'); 
    }

    public function unitmeasureProductssold(){
   
        return $this->hasMany(Productsale::class, 'unitmeasure', 'id'); 
    }
    public function supp(){
        // creating a relationship between the students model 
        return $this->belongsTo(Product::class, 'supplier'); 
    }

    
    
    protected $hidden = [
      //  'hid', 'id',
    ];
  
    
}



