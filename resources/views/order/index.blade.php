@extends('layouts.master')

@section('content')

  <h2>All Orders</h2>

<div class="row-fluid">

 <div class="col-sm-2">
  <input type="button" style="margin-top:20px;" class="btn btn-default" name="name" value="주문등록" onclick="window.location.href='{{route('orders.create') }}'" />
 </div>
 <div class="col-sm-3">

  </div>
  <div class="col-sm-7" style="text-align:right">
  <?php echo $order->render(); ?>
   </div>



</div>
  <div class="row-fluid">



    <table class="table table-striped">
      <tr>
        <th>Order ID</th>
        <th>E/D</th>
        <th>Order Date</th>
        <th width="18%">Products</th>
        <th>Size</th>
        <th>Grand Total</th>
        <th>Order Status</th>

        <th>Delivery Agency</th>
        <th>Track Number</th>
        <th>Customer</th>

      </tr>

      @foreach($order as $key=>$values)
      <?php
        $arr = $values['attributes'];

        $res_arr['id']= $arr['id'];
        $res_arr['nothing']= '';
        $res_arr['order_date'] = $arr['order_date'];
        $res_arr['product_name'] = $arr['product_name'];
        $res_arr['size_color'] = $arr['size_color'];
        $res_arr['grand_total'] = $arr['grand_total'];
        $res_arr['order_status'] = $arr['order_status'];
        //$res_arr['delivery_date'] = $arr['delivery_date'];
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
            {{$value}}

            @elseif($key=="product_name")

              @if(strpos($value,","))
                <?= str_replace(",", "<br>",$value) ?>
              @else
                  {{$value}}
              @endif
            <!--만약 값이 여러개라면- = ,를 가지고 있다면
            ,를 <br>로 replace를 하시오!



            나중에 이걸 <a> </a>를 추가하여 href 속성에 특정 라우트로 action과
            argument (product_name)을 넘기게되면 그걸 받는 route는
            상세 페이지를 꾸며 놓겠지 그럼 나는 꾸며진 상세 페이지를 모달로 띄울꺼야


            -->
            @elseif($key=="size_color")
              @if(strpos($value,","))
                <?= str_replace(",", "<br>",$value) ?>
              @else
                  {{$value}}
              @endif
            @elseif($key=="nothing")
            {!!Form::open(['method'=>'DELETE', 'route'=>['orders.destroy',$value], 'onsubmit'=>'return confirmDelete()']  ) !!}
            <a href="{{ route('orders.edit',$value) }}" class="btn btn-default">수정</a>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="delete">

            <input type="submit" name="" class="btn btn-default" value="삭제">

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {!!Form::close()!!}
            @else
            {{$value}}


            @endif

          </td>
        @endforeach
      </tr>
      @endforeach

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
