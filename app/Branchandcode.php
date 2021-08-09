<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Branchandcode extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'branch', 'ucret','floatcode','daterecieved'
    ];
    

    public function branchNamebettingproducts(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
    }

    public function branchProductname(){
        // creating a relationship between the students model 
        return $this->belongsTo(Bettingproduct::class, 'product'); 
    }



   
    protected $hidden = [
      //  'hid', 'id',
    ];
}
