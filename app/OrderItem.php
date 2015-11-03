<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    public $timestamps = false;

    //이모델은 주문과 제품 사이를 이어주는 징검다리 역할을 하는 테이블이다.
    public function product()
    {
      return $this->hasMany('App\Product','id');
    }

    public function order()
    {
      return $this->belongsTo('App\Order','order_id','id');
    }


}
