@extends('layouts.master')

@section('content')


  <h2>All Orders</h2>

<div class="row-fluid">

 <div class="col-sm-2">
  <input type="button"  class="btn btn-default" name="name" value="주문등록" onclick="window.location.href='{{route('orders.create') }}'" />
 </div>
 <div class="col-sm-3">

  </div>
  <div class="col-sm-7 form-inline" style="text-align:right">
    <form class="form-inline" role="form"  method="get" id="search_form" style="text-align:right;">
      <div class="form-group" style="margin-top:20px;">
        <label for="sel_limit">line</label>
          <select  name="limit"  class="form-control" id="sel_limit"  style="width=20%;">
            <option value="0">-select-</option>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="150">150</option>
            <option value="200">200</option>
          </select>
  <label for="q">search : </label>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="text" class="form-control" id="q" name="q" placeholder="Search..">
  <input type="submit" class="btn btn-default" value="검색" >
  </div>
  </form>
</div>

<div class="clearfix">

</div>
<div class="row-fluid">
  <div class="col-sm-2">

  </div>
  <div class="col-sm-3">

   </div>
   <div class="col-sm-7" style="text-align:right">
     <?php echo $order->render(); ?>
  </div>


</div>
  <div class="row-fluid" >
    <table class="table table-striped">
      <tr>
        <th width="10%" id="collapse_id">{!!sort_orders_by('id','ID')!!} <span id="span_id" class="glyphicon glyphicon-triangle-bottom"></span> </th>
        <th width="10%">{!!sort_orders_by('order_date','Order Date')!!} </th>
        <th width="18%">{!!sort_orders_by('product_name','Products')!!} </th>
        <th>Size</th>
        <th width="10%">Grand Total</th>
        <th>Order Status</th>
        <th>Delivery</th>
        <th>Track Number</th>
        <th>{!!sort_orders_by('grand_total','Customer')!!} </th>
        <th>Action</th>
        <th></th>
      </tr>

      @foreach($order as $key=>$values)
      <?php
        $arr = $values['attributes'];

        $res_arr['id']= $arr['id'];
        $res_arr['order_date'] = $arr['order_date'];
        $res_arr['product_name'] = $arr['product_name'];
        $res_arr['size_color'] = $arr['size_color'];
        $res_arr['grand_total'] = $arr['grand_total'];
        $res_arr['order_status'] = $arr['order_status'];
        //$res_arr['delivery_date'] = $arr['delivery_date'];
        $res_arr['delivery_agency'] = $arr['delivery_agency'];
        $res_arr['track_number'] = $arr['track_number'];
        $res_arr['customer_name'] = $arr['customer_name'];
        $res_arr['act_btn']= '';
        $res_arr['shipped_date'] = $arr['shipped_date'];


        $arr = $res_arr;
        $arr_dot = array_dot($arr);
      ?>


      <!--아코디언 패널 그룹 -->
      <tr>
        @foreach($arr as $key=>$value)
          <td>


            @if($key=="shipped_date")
              @if($value==date("Y-m-d"))
                <div class="red_row"></div>
              @endif
            @elseif($key=="id")
            <a data-toggle="modal" data-target="#contents"  class="get_a_order" ><span class="glyphicon glyphicon-comment"></span></a>&nbsp;&nbsp;{{$value}}
            @elseif($key=="product_name")



              @if(strpos($value,","))
                <div class="product_code">
                  <?= str_replace(",", "<br>",$value) ?>
                </div>
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
            @elseif($key=="act_btn")
            <div class="dropdown">

              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >
                <i class="glyphicon glyphicon-cog"></i>
              </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('orders.edit',$arr_dot['id']) }}">수정</a></li>
                  <li role="presentation" ><a role="menuitem" tabindex="-1" href="{{ route('orders.destroy',$arr_dot['id']) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure you want to delte this ?" id="delete_button">삭제</a></li>
                  <!-- <form class="" action="orders.destroy" method="DELETE" id="delete_form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="id" value="{{$arr['id']}}">
                  </form> -->
                  <!-- {!!Form::open(['method'=>'DELETE', 'route'=>['orders.destroy', $arr['id'] ], 'id'=>'delete_form']) !!}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   {!! Form::hidden('id', $arr['id'])   !!} -->

                  <!-- {!!Form::close()!!} -->
                  <!-- <input type="submit" name="" class="btn btn-default" value="삭제"> -->
                </ul>
            </div>

            <!-- <a href="{{ route('orders.edit',$arr_dot['id']) }}" class="btn btn-default">수정</a> -->

            <!-- -->


            @else

            {{$value}}

            @endif
          </td>
        @endforeach
      </tr>


      @endforeach
    </table>



    <div  id="contents" class="modal fade my_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dalog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">More information</h4>

            </div>
          <div  id="content_body" tabindex="-1">

          </div>
          <div class="clearfix">

          </div>
          <div class="modal-footer">

          <br>
            <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>

    </div>

  <script type="text/javascript">

  $("#sel_limit").on('change',function(){
    //alert('한번만');
    var select = $(this);
    var form = $("#search_form");
    form.attr('action','/orders?limit="+select.val())' );
    form.submit();

  });

  $(".get_a_order").on('click', function(){
    var id = $(this).parent().text().trim();
    //alert(id);
    $.ajax({
      url:'/orders/'+id,
      type:'get',
    //  data:id,
      success: function(result){
        $("#collapse_").attr("id","collapse_"+id);
        var order = result.order;
        var customer = result.customer;

        //console.log(result);
        //  console.log(customer);
         // ,를 <br> 로 리플레이스
         order.product_name = order.product_name.replace(",","<br>");
         order.size_color = order.size_color.replace(",","<br>");
         order.quantity = order.quantity.replace(",","<br>");


        var contents = '';
        contents +='<div class="row-fluid ">';
          contents +='<div class="col-md-4">';
          contents +='<h4>Customer Information</h4>';
            contents +='<div class="row">';
              contents +='<div class="col-md-6">Name</div>';
              contents +='<div class="col-md-6">'+customer.first_name+'</div>';
            contents +='</div>';
            contents +='<div class="row">';
              contents +='<div class="col-md-6">Phone</div>';
              contents +='<div class="col-md-6">'+customer.contact_number+'</div>';
            contents +='</div>';

            contents +='<div class="row">';
              contents +='<div class="col-md-6">Zip</div>';
              contents +='<div class="col-md-6">'+customer.zip+'</div>';
            contents +='</div>';

            contents +='<div class="row">';
              contents +='<div class="col-md-6">Street</div>';
              contents +='<div class="col-md-6">'+customer.street+'</div>';
            contents +='</div>';

            contents +='<div class="row">';
              contents +='<div class="col-md-6">City</div>';
              contents +='<div class="col-md-6">'+customer.city+'</div>';
            contents +='</div>';

            contents +='<div class="row">';
              contents +='<div class="col-md-6">State</div>';
              contents +='<div class="col-md-6">'+customer.state+'</div>';
            contents +='</div>';

            contents +='<div class="row">';
              contents +='<div class="col-md-6">Country</div>';
              contents +='<div class="col-md-6">'+customer.country+'</div>';
            contents +='</div>';
          contents +='</div>';

          contents +='<div class="col-md-4">';
            contents +='<h4>Product Information</h4>';
            contents +='<div class="row">';

        //product 갯수를 구해서 갯수만큼 요소를 생성하고 값을 넣어야한다. 갯수는 ,로 몇개인지 알수있다.
              contents +='<div class="col-md-3">Product</div>'
              contents +='<div class="col-md-4">'+order.product_name+'</div>';

              contents +='<div class="col-md-1">Size</div>'
              contents +='<div class="col-md-1">'+order.size_color+'</div>';

              contents +='<div class="col-md-2">Quantity</div>'
              contents +='<div class="col-md-1">'+order.quantity+'</div>';

              contents +='</div>';
        //수량에 따라 생성되는 요소의 수가 달라짐

            contents +='</div>';

            contents +='<div class="col-md-4">';
            contents += '<h4>Sales Information </h4>';
              contents +='<div class="row">';

                contents += '<div class="col-md-6">Sales Owner</div>';
                contents += '<div class="col-md-6">'+order.sales_owner+'</div>';
              contents +='</div>';

              contents +='<div class="row">';
                contents += '<div class="col-md-6">Market Place</div>';
                contents += '<div class="col-md-6">'+order.market_place+'</div>';
              contents +='</div>';

              contents +='<div class="row">';
                contents += '<div class="col-md-6">Order Date</div>';
                contents += '<div class="col-md-6">'+order.order_date+'</div>';
              contents +='</div>';

              contents +='<div class="row">';
                contents += '<div class="col-md-6">Note</div>';
                contents += '<div class="col-md-6">'+order.notes+'</div>';
              contents +='</div>';

          contents +='<div class="row">';
            contents += '<div class="col-md-6">Grand Total</div>';
            contents += '<div class="col-md-6">'+order.grand_total+'</div>';
          contents +='</div>';

          contents +='<div class="row">';
            contents += '<div class="col-md-6">Delivery Agency</div>';
            contents += '<div class="col-md-6">'+order.delivery_agency+'</div>';
          contents +='</div>';

          contents +='<div class="row">';
            contents += '<div class="col-md-6">Track Number</div>';
            contents += '<div class="col-md-6">'+order.track_number+'</div>';
          contents +='</div>';
        contents +='</div>';
        //
        // contents += '<tr><th colspan=3>주문자 정보</th><th colspan=3>제품 정보</th><th colspan=3>판매 정보</th></tr>';
        // contents += '<tr><td></td><td>name</td><td>'+customer[0].first_name+'</td><td>product name</td><td>'+order.product_name+'</td><td>'+order.size_color+'</td><td></td><td>Sales Owner</td><td>'+order.sales_owner+'</td></tr>';
        // contents += '<tr><td></td><td>email</td><td>'+customer[0].contact_email+'</td>   <td> </td> <td></td> <td></td>          <td></td> <td>Market Place</td><td>'+order.market_places+'</td></tr>';
        // contents += '<tr><td></td><td>address</td><td>'+customer[0].contact_number+'</td>   <td> </td> <td></td> <td></td>          <td></td> <td>Ordered Date</td><td>'+order.order_date+'</td></tr>';
        // contents += '<tr><td></td><td>country</td><td>'+customer[0].country+'</td>   <td> </td> <td></td> <td></td>          <td></td> <td>Note</td><td>'+order.note+'</td></tr>';
        // contents += '<tr><td></td><td>phone</td><td>'+customer[0].street+'</td>   <td> </td> <td></td> <td></td>          <td></td>                   <td>Grand Total</td><td>'+order.grand_total+'</td></tr>';
        // contents += '<tr><td></td><td></td><td></td>   <td> </td> <td></td> <td></td>          <td></td>                   <td>Delivery Agency</td><td>'+order.delivery_agency+'</td></tr>';
        // contents += '<tr><td></td><td></td><td></td>   <td> </td> <td></td> <td></td>          <td></td>                   <td>Track Number</td><td>'+order.track_number+'</td></tr>';

        $("#content_body").append(contents);
      }
    });
      //  $(this).parent().parent().last().after($("#collapse1"));

  });

  $(".close").on('click', function(){
      $("#content_body").empty();
  });

  $("#contents").on('blur', function(){
      $("#content_body").empty();
  });



  //
  var windowHeight = $(window).height();
  var windowWidth = $(window).width();
  var boxHeight = $('#contents').height();
  var boxWidth = $('#contents').width();
  // var offsetXY = document.viewport.getScrollOffsets(window);
  // var viewportWH = getViewportSize(window);
  //
  // var width = $('#contents').offsetWidth;
  // var height = $('#contents').offsetHeight;
  // var vleft = Math.floor((viewportWH.w - (width))/2);
  // var vtop = Math.floor((viewportWH.h -(height))/2);




  $('#contents').css({
     'position':'fixed',
     'left' : 330, 'top' : 100
    // 'left' : (windowWidth /6), 'top' : ((windowHeight - boxHeight)/4)

  });


// jefrey
(function() {

  var laravel = {
    initialize: function() {
      this.methodLinks = $('a[data-method]');
      this.token = $('a[data-token]');
      this.registerEvents();
    },

    registerEvents: function() {
      this.methodLinks.on('click', this.handleMethod);
    },

    handleMethod: function(e) {
      var link = $(this);
      var httpMethod = link.data('method').toUpperCase();
      var form;

      // If the data-method attribute is not PUT or DELETE,
      // then we don't know what to do. Just ignore.
      if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
        return;
      }

      // Allow user to optionally provide data-confirm="Are you sure?"
      if ( link.data('confirm') ) {
        if ( ! laravel.verifyConfirm(link) ) {
          return false;
        }
      }

      form = laravel.createForm(link);
      form.submit();

      e.preventDefault();
    },

    verifyConfirm: function(link) {
      return confirm(link.data('confirm'));
    },

    createForm: function(link) {
      var form =
      $('<form>', {
        'method': 'POST',
        'action': link.attr('href')
      });

      var token =
      $('<input>', {
        'type': 'hidden',
        'name': '_token',
        'value': link.data('token')
        });

      var hiddenInput =
      $('<input>', {
        'name': '_method',
        'type': 'hidden',
        'value': link.data('method')
      });

      return form.append(token, hiddenInput)
                 .appendTo('body');
    }
  };

  laravel.initialize();

})();

console.log(location.href);


// $(document).ready(function(){
//   var loc_str = location.href
//
//   switch(loc_str){
//
//     case 'http://localhost/orders?sortBy=id&direction=asc' :
//         $('#span_id').attr('calss','glyphicon glyphicon-triangle-top')
//     break
//     case 'http://localhost/orders?sortBy=id&direction=desc' :
//       $('#span_id').attr('calss','glyphicon glyphicon-triangle-bottom')
//
//     break
//     case 'http://localhost/orders?sortBy=order_date&direction=asc' :
//
//     break
//     case 'http://localhost/orders?sortBy=order_date&direction=desc' :
//
//     break
//     case 'http://localhost/orders?sortBy=grand_total&direction=asc' :
//
//     break
//     case 'http://localhost/orders?sortBy=grand_total&direction=desc' :
//
//     break
//   }
// });


  // var loc_str = location.href
  // if(loc_str.indexOf('sortBy=id')){
  //
  //   if(loc_str.indexOf('direction=asc')){
  //       $('#span_id').attr('class','glyphicon glyphicon-triangle-top')
  //   }else if(loc_str.indexOf('direction=desc')){
  //        $('#span_id').attr('class','glyphicon glyphicon-triangle-bottom')
  //   }
  // }
  // else if(loc_str.indexOf('sortBy=order_date')){
  //     if(loc_str.indexOf('direction=asc')){
  //
  //     }
  //     else if(loc_str.indexOf('direction=desc')){
  //
  //     }
  //   }

$('#collapse_id').on('click', function(){
  $("#span_id").toggleClass("glyphicon glyphicon-triangle-top");
})

$('.red_row').parent().parent().css({

//#428bca blue
  color:'#d9534f'
})




  </script>
  <style media="screen">
    #contents{
      width:67%;
    }
    a{
      color:black;
    }
  </style>

@stop
