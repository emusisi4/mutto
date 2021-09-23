<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Unit extends Authenticatable
{
    use HasApiTokens, Notifiable;


   
    protected $fillable = [
    'branch','ucret','datedone',
    'machineno','salesfigure','salesamount',
    'payoutfigure','payoutamount',
    'profitfigure','profitamount',
    'currentsalesfigure','currentpayoutfigure','previoussalesfigure','previouspayoutfigure','monthmade','yearmade'
    ];
    //public function maincomponentSubmenus(){
        // creating a relationship between the students model 
      //  return $this->belongsTo(Mainmenucomponent::class, 'mainheadercategory'); 
 //   }

    protected $hidden = [
      //  'hid', 'id',
    ];
}
