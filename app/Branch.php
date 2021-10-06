<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Branch extends Authenticatable
{
    use HasApiTokens, Notifiable;



    protected $fillable = ['branch',
        'branchname', 'branchno', 'location','ucret','contact',
    ];


    public function branchanduserBranchname(){
      // creating a relationship between the students model 
      return $this->hasMany(Branchanduser::class, 'branchname', 'id'); 
  }




  public function branchName(){
    // creating a relationship between the students model 
    return $this->hasMany(Salesreturn::class, 'branchname', 'id'); 
}


    public function branchBalance(){
      // creating a relationship between the students model 
      return $this->hasMany(Branchcashstanding::class, 'branchname', 'id'); 
  }
  
  public function branchnameDailycodes(){
    // creating a relationship between the students model 
    return $this->hasMany(Dailyreportcode::class, 'id', 'branch'); 
  }
  public function machinecoderesetBranchname(){
    // creating a relationship between the students model 
    return $this->hasMany(Codereset::class, 'id', 'branch'); 
  }
 public function students(){
  // creating a relationship between the students model 
  return $this->hasMany(Branchpayout::class, 'branchno', 'branch'); 
}
public function branchnameBranchmachines(){
  // creating a relationship between the students model 
  return $this->hasMany(Branchandmachine::class, 'id', 'branchname'); 
}
public function branchNamebettingproducts(){
  // creating a relationship between the students model 
  return $this->hasMany(Branchandproduct::class, 'id', 'branch'); 
}
public function branchcintranfers(){
  // creating a relationship between the students model 
  return $this->hasMany(Cintransfer::class, 'branchno', 'branchto'); 
}
public function branchcintranferfrom(){
  // creating a relationship between the students model 
  return $this->hasMany(Cintransfer::class, 'branchno', 'branchfrom'); 
}


public function busers(){
  // creating a relationship between the students model 
  return $this->hasMany(User::class, 'branchno', 'branch'); 
}
public function brnchbalancingrecords(){
  // creating a relationship between the students model 
  return $this->hasMany(Shopbalancingrecord::class, 'branchno', 'branch'); 
}

    protected $hidden = [
      //  'hid', 'id',
    ];
}
