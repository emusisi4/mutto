<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Collectionreporttoview extends Authenticatable
{
    use HasApiTokens, Notifiable;



    protected $fillable = [
        'branch', 'startdate', 'enddate', 'ucret','reporttype',
        'ucret'
    ];
    
    protected $hidden = [
      //  'hid', 'id',
    ];
    public function branchName(){
      // creating a relationship between the students model 
      return $this->belongsTo(Branch::class, 'branchto'); 
  }
}
