<?php namespace Acme\Repos;



use App\Order;

class DbOrderRepo implements OrderRepoInterface{
  public  function getPaginated()
  {
    return Order::paginate(20);
  }
}
