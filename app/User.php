<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','bio','photo','type','ucret','branch','mmaderole'    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function branchandUsername(){
        // creating a relationship between the students model 
        return $this->hasMany(Branchanduser::class, 'username', 'id'); 
    }



    public function productSaleuser(){
        // creating a relationship between the students model 
        return $this->hasMany(Productsale::class, 'ucret', 'id'); 
    }
    public function userRecieving(){
        // creating a relationship between the students model 
        return $this->hasMany(Salesreturn::class, 'userrecieving', 'id'); 
    }
    public function userCreating(){
        // creating a relationship between the students model 
        return $this->hasMany(Salesreturn::class, 'ucret', 'id'); 
    }
    public function cashierName(){
        // creating a relationship between the students model 
        return $this->hasMany(Salesreturn::class, 'cashiername', 'id'); 
    }
    public function usernameBalance(){
        // creating a relationship between the students model 
        return $this->hasMany(Userbalance::class, 'username', 'id'); 
    }
    public function usernameTransferfrom(){
        // creating a relationship between the students model 
        return $this->hasMany(Userbalance::class, 'transferfrom', 'id'); 
    }
    public function usernameTransferto(){
        // creating a relationship between the students model 
        return $this->hasMany(Userbalance::class, 'transferto', 'id'); 
    }
    
    
}
