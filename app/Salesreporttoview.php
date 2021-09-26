<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Salesreporttoview extends Authenticatable
{
    use HasApiTokens, Notifiable;

//id, startdate, enddate, branch, ucret
   
    protected $fillable = [
        'branch', 'ucret','startdate','enddate','supplier'
    ];
    

    protected $hidden = [
      //  'hid', 'id',
    ];
//     public function branchName(){
//       // creating a relationship between the students model 
//       return $this->belongsTo(Branch::class, 'branchto'); 
//   }
}
