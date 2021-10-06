<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Receipttoreturnitem extends Authenticatable
{
    use HasApiTokens, Notifiable;


  
    
    protected $fillable = [
       
         'receiptid', 'ucret', 'totalamounttoreturn'
    ];
    

    


    protected $hidden = [
      //  'hid', 'id',
    ];
}
