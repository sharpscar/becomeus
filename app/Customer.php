<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = [

      'first_name',
      'last_name',
      'contact_email',
      'contact_number',
      'order_relationship',
      'street',
      'city',
      'state',
      'zip',
      'country'
    ];

    // public function order(){
    //   return $this->hasOne('App\Order');
    // }
}
