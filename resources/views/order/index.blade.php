@extends('layouts.master')

@section('content')


<?php
// foreach($order->lists('orderItem') as $key=>$value){
//   var_dump($order->lists('orderItem'));
// }

 ?>




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
     <?php echo $order->appends(Input::query())->render(); ?>
  </div>


</div>
  <div class="row-fluid" >
    <table class="table table-striped">
      <tr>
        <!-- <span id="span_id" class="glyphicon glyphicon-triangle-bottom"></span> -->
        <th width="10%" id="collapse_id">{!!sort_orders_by('id','ID')!!}  </th>
          <th>Image</th>
        <th width="10%">{!!sort_orders_by('order_date','Order Date')!!} </th>
        <th width="18%">Products </th>
        <th>Size</th>
        <th width="10%">Grand Total</th>
        <th>Order Status</th>
        <th>Delivery</th>
        <th>Track Number</th>
        <th>{!!sort_orders_by('grand_total','Customer')!!} </th>
        <th>Action</th>
        <th></th>
      </tr>

      <tr>

        <?php

          $orders = $order->lists('attributes');
          $order_item = $order->lists('orderItem')->toArray();
          $arr = Array();

          for($i=0; $i < count($orders) ; $i++){
          $arr_dot[$i]['id']  = $arr[$i]['id']    = $orders[$i]['id'];
            for($j=0;$j<count($order_item[$i]);$j++)
            {
              $arr[$i]['image'] [$j]   = $order_item[$i][$j]['image'];
            }
            $arr[$i]['order_date']  =  $orders[$i]['order_date'];
            for($j=0;$j<count($order_item[$i]);$j++){
              $arr[$i]['product_code'][$j]    = $order_item[$i][$j]['product_code'];
              $arr[$i]['size_color'] [$j]   = $order_item[$i][$j]['size_color'];
            }

            $arr[$i]['grand_total'] = $orders[$i]['grand_total'];
            $arr[$i]['order_status'] = $orders[$i]['order_status'];
            $arr[$i]['delivery_agency'] = $orders[$i]['delivery_agency'];
            $arr[$i]['track_number']     = $orders[$i]['track_number'];
            $arr[$i]['customer_name']     = $orders[$i]['customer_name'];
            $arr[$i]['act_btn'] = '';
            $arr[$i]['shipped_date']= $orders[$i]['shipped_date'];
          //  var_dump($arr[$i]);
          //  echo key($arr[$i]);
          }
          $cnt =  count($order->lists('Order'));
          //var_dump($arr);

          echo "<tr>";
          for($i=0; $i< $cnt; $i++)
          {

            foreach($arr[$i] as $key=>$value)
            {
               if($key==="id"){
                 echo "<td>";
                echo $value;
                echo '<a data-toggle="modal" data-target="#contents"  class="get_a_order" >&nbsp;<span class="glyphicon glyphicon-comment"></span></a>';
                echo "</td>";
               }
               elseif($key=="image"){
                 if( count($value)>=2){
                   echo "<td style='display: table-cell; text-align: center; vertical-align: middle; '>";
                   for($j=0; $j< count($value) ; $j++){
                     // URL 방식의 경우
                     if(strstr($value[$j],'http://')){
                       echo '<img src="'.$value[$j].'" class="img_" type="image" style="width:50px; height:50px;"/> ';
                     }else{
                        // 서버 직접 방식의 경우
                       echo '<img src="http://localhost/'.$value[$j].'" class="img_" type="image" rel="noreerer"/> ';
                     }
                     //echo  $value[$j] ;
                     echo  "<br>";
                   }
                 }else{
                   //제품이 한개인 경우
                     echo "<td>";
                   if(strstr($value[0],'http://')){
                     echo '<img src="'.$value[0].'" class="img_" type="image" style="width:50px; height:50px;"/> ';
                   }else{
                      // 서버 직접 방식의 경우
                     echo '<img src="http://localhost/'.$value[0].'" class="img_" type="image" rel="noreerer"/> ';
                   }
                }
                  echo '</td>';
               }//이미지 컬럼 끝

               elseif($key==="order_date"){
                 echo "<td>";
                 echo $value;
                 echo "</td>";
               }
               elseif($key=="product_code"){
                 if( count($value)>=2){
                   echo "<td>";
                   for($j=0; $j< count($value) ; $j++){
                     echo  $value[$j] ;
                     echo  "<br>";
                   }
                 }else{
                  echo "<td>";
                  echo  $value[0];
                }
                  echo '</td>';
               }
               elseif($key=="size_color"){
                 if( count($value)>=2){
                   echo "<td>";
                   for($j=0; $j< count($value) ; $j++){
                     echo  $value[$j] ;
                     echo  "<br>";
                   }
                 }else{
                  echo "<td>";
                  echo  $value[0];
                }
                  echo '</td>';
               }
               elseif($key==="grand_total"){
                 echo "<td>";
                 echo $value;
                 echo "</td>";
               }
               elseif($key==="order_status"){
                 echo "<td>";
                 echo $value;
                 echo "</td>";
               }
               elseif($key==="delivery_agency"){
                 echo "<td>";
                 echo $value;
                 echo "</td>";
               }
               elseif($key==="track_number"){
                 echo "<td>";
                 echo $value;
                 echo "</td>";
               }
               elseif($key==="customer_name"){
                 echo "<td>";
                 echo $value;
                 echo "</td>";
               }
               elseif($key==="act_btn"){
                 echo "<td>";
                ?>
                <div class="dropdown">

             <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >
               <i class="glyphicon glyphicon-cog"></i>
             </button>
               <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                 <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('orders.edit',$arr_dot[$i]['id']) }}">수정</a></li>
                 <li role="presentation" ><a role="menuitem" tabindex="-1" href="{{ route('orders.destroy',$arr_dot[$i]['id']) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure you want to delte this ?" id="delete_button">삭제</a></li>

               </ul>
           </div>

                <?php
                 echo "</td>";
               }
               elseif($key==="shipped_date"){
                 echo "<td>";
                 if($value==date("Y-m-d")){
                echo "<div class='red_row'></div>";
              }
                 echo "</td>";

               }
            }
            echo "</tr>";
          }
         ?>




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

    $.ajax({
      url:'/orders/'+id,
      type:'get',
    //  data:id,
      success: function(result){
       console.log(result);
        $("#collapse_").attr("id","collapse_"+id);
        var order = result.order;
        var customer = result.customer;
        var orderItem = result.order_item;
        //console.log(result);
        //  console.log(customer);
         // ,를 <br> 로 리플레이스
        //  order.product_name = order.product_name.replace(",","<br>");
        //  order.size_color = order.size_color.replace(",","<br>");
        //  order.quantity = order.quantity.replace(",","<br>");
        var product_code=[];
        var size_color=[];
        var quantity=[];
        for(var i=0; i<orderItem.length;i++){
          product_code[i] = orderItem[i].product_code;
          size_color[i] = orderItem[i].size_color;
          quantity[i] = orderItem[i].quantity;
        }



        var contents = '';
        contents +='<div class="row-fluid ">';
          contents +='<div class="col-md-3">';
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

          contents +='<div class="col-md-5">';
            contents +='<h4>Product Information</h4>';
            contents +='<div class="row">';

        //product 갯수를 구해서 갯수만큼 요소를 생성하고 값을 넣어야한다. 갯수는 ,로 몇개인지 알수있다.
              contents +='<div class="col-md-3">Product</div>'
              for(var j=0 ; j< product_code.length; j++){
                  contents +='<div class="col-md-7">'+product_code[j]+'</div>';
                  contents +='</div>';
                  contents +='<div class="row">';
                  contents +='<div class="col-md-3"></div>'
              }
              contents +='</div>';
              contents +='<div class="row">';

              contents +='<div class="col-md-3">Size</div>'
              for(var k=0 ; k< size_color.length;k++){
                  contents +='<div class="col-md-4">'+size_color[k]+'</div>';
                  contents +='</div>';
                  contents +='<div class="row">';
                  contents +='<div class="col-md-3"></div>'
              }
              contents +='</div>';
              contents +='<div class="row">';

              contents +='<div class="col-md-3">Quantity</div>'
              for(var l=0 ; l< quantity.length;l++){
                  contents +='<div class="col-md-4">'+quantity[l]+'</div>';
                  contents +='</div>';
                  contents +='<div class="row">';
                  contents +='<div class="col-md-3"></div>'
              }

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
     'left' : 230, 'top' : 100
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
