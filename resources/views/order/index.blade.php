@extends('layouts.master')

@section('content')

  <h2>All Orders</h2>

  <div class="row-fluid">

    <input type="button" style="margin-top:20px;" class="btn btn-default" name="name" value="주문등록" onclick="window.location.href='{{route('orders.create') }}'" />


    <table class="table table-striped">
      <tr>
        <th>id</th>
        <th>Order Date</th>
        <th>Products</th>
        <th>Grand Total</th>
        <th>Order Status</th>
        <th>On delivery date</th>
        <th>Delivery Agency</th>
        <th>Track Number</th>
        <th>Customer</th>

      </tr>

      @foreach($order as $key=>$values)
      <?php
        $arr = $values['attributes'];

        $res_arr['id']= $arr['id'];
        $res_arr['order_date'] = $arr['order_date'];
        $res_arr['product_name'] = $arr['product_name'];
        $res_arr['grand_total'] = $arr['grand_total'];
        $res_arr['order_status'] = $arr['order_status'];
        $res_arr['delivery_date'] = $arr['delivery_date'];
        $res_arr['delivery_agency'] = $arr['delivery_agency'];
        $res_arr['track_number'] = $arr['track_number'];
        $res_arr['customer_name'] = $arr['customer_name'];



        $arr = $res_arr;
        $arr_dot = array_dot($arr);
      ?>
      <tr>
        @foreach($arr as $key=>$value)
          <td>
            @if($key=="id")
            {!!Form::open(['method'=>'DELETE', 'route'=>['orders.destroy',$arr_dot['id']], 'onsubmit'=>'return confirmDelete()']  ) !!}
            <a href="{{ route('orders.edit',$arr_dot['id']) }}" class="btn btn-default">수정</a>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="delete">

            <input type="submit" name="" class="btn btn-default" value="삭제">

            @else
            {{$value}}
            @endif
          </td>
        @endforeach
      </tr>
      @endforeach


      </tr>

    </table>
  </div>

  <script type="text/javascript">
    function confirmDelete(){
       var x = confirm("Are you sure you want to delete?");
       if(x)
        return true;
      else {
        return false;
      }
    }
  </script>
@stop
