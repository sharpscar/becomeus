<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = 'product_photos';

    protected $fillable = ['photo'];

    public function product()
    {
      return $this->belongsTo('App\Product');
    }
}
