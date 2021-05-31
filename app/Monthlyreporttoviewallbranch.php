<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Monthlyreporttoviewallbranch extends Authenticatable
{
    use HasApiTokens, Notifiable;

   
    protected $fillable = [
     
      'monthmade', 'yearmade', 'reporttype', 'ucret', 'branch'
       
    ];
    


    protected $hidden = [
      //  'hid', 'id',
    ];
}
