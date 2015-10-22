<?php

function sort_orders_by($column,$body)
{
  $direction = (Request::get('direction')=='asc')? 'desc':'asc';
  return link_to_route('orders',$body, ['sortBy'=>$column,'direction'=>$direction]);
}
