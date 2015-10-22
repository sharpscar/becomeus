@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  @foreach($customer as $key=>$values)
<?php

  $customer = $values['attributes']
 ?>
 @endforeach


<h1>edit</h1>

<div class="container">
  <div class="row">
    <div class="span8">

{!!Form::model($order,['method'=>'PATCH', 'action'=>['OrderController@update', $order->id],'class'=>'form-horizontal']) !!}





<div class="form-group">
  <h4>Add Customer</h4>
  <div class="row">
    <div class="col-sm-6">

      <div class=" form-inline">
        {!! Form::label('first_name','First Name : ',['class'=>'control-label col-sm-5'])!!}

        {!! Form::text('first_name',$customer['first_name'],['class'=>'form-control col-sm-7', 'style'=>'width:55%'  ]) !!}
      </div>
    </div>

    <div class="col-sm-6">
        <div class="form-inline">
        {!! Form::label('contact_email','Contact Email : ',['class'=>'control-label col-sm-5'])!!}

        {!! Form::text('contact_email',$customer['contact_email'],['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      {!! Form::label('country','Country : ',['class'=>'control-label col-sm-5'])!!}

      {!! Form::text('country',$customer['country'],['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}

      <div class=" form-inline">

      </div>
    </div>

    <div class="col-sm-6">
        <div class="form-inline">
        {!! Form::label('contact_number','Contact Number : ',['class'=>'control-label col-sm-5'])!!}

        {!! Form::text('contact_number',$customer['contact_number'],['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">

      <div class=" form-inline">
        {!! Form::label('street','Street : ',['class'=>'control-label col-sm-5'])!!}

        {!! Form::text('street',$customer['street'],['class'=>'form-control col-sm-7', 'style'=>'width:55%'  ]) !!}

      </div>
    </div>

    <div class="col-sm-6">
        <div class="form-inline">
        {!! Form::label('city','City : ',['class'=>'control-label col-sm-5'])!!}

        {!! Form::text('city',$customer['city'],['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}
        </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">

      <div class=" form-inline">
        {!! Form::label('state','State : ',['class'=>'control-label col-sm-5'])!!}

        {!! Form::text('state',$customer['state'],['class'=>'form-control col-sm-7', 'style'=>'width:55%'  ]) !!}
      </div>
    </div>

    <div class="col-sm-6">
        <div class="form-inline">
        {!! Form::label('zip','Zip : ',['class'=>'control-label col-sm-5'])!!}

        {!! Form::text('zip',$customer['zip'],['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}
        </div>
    </div>
  </div>

</div>







  <div class="form-group">
      <h4> Add products</h4>
      <button id="addItemBtn">+</button>
      <table class="table col-sm-12" id="memberTable">

        <tr>
          <th>Product </th><th>Size </th><th>Price </th><th>Quantity </th><th>Total </th><th>Sales Price </th><th>remove</th>
        </tr>
            <tr>
              <td>{!! Form::text('product_name[]',null,['class'=>'form-control pn', 'id'=>'product_name' ])!!}</td>
              <td>
                {!! Form::text('size_color[]',null,['class'=>'form-control'])!!}
              </td>
              <td>
                {!! Form::text('price[]',null,['class'=>'form-control','id'=>'price','readonly'])!!}
              </td>
              <td>
                {!! Form::text('quantity[]',null,['class'=>'form-control','id'=>'quantity'])!!}
              </td>
              <td>
                {!! Form::text('total[]',null,['class'=>'form-control','id'=>'total','readonly'])!!}
              </td>
              <td>
                {!! Form::text('sales_price[]',null,['class'=>'form-control'])!!}
              </td>
              <td>

              </td>
            </tr>
      </table>
  </div>

  <div class="form-group">
    {!! Form::label('sales_owners','Sales owner : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-6 ">
        {!! Form::select('sales_owner',['select'=>'-Select-','sangguen'=>'Sangguen','mengmeng'=>'Mengmeng','xiaoyi'=>'Xiaoyi','sunmi'=>'Sunmi','kaka'=>'Kaka'],null,['class'=>'form-control','style'=>'width:35%']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('market_place','Market place : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-6 ">
        {!! Form::select('market_place[]',['select'=>'-Select-','amazone.com'=>'Amazone.com','amazone.uk'=>'Amazone.uk','maxstarstore'=>'Maxstarstore','Aliexpress'=>'Aliexpress','Taobao'=>'Taobao','ebay'=>'Ebay','other'=>'Other'],null,['class'=>'form-control','style'=>'width:35%']) !!}
    </div>
  </div>

  <div class="form-group form-inline">
    {!! Form::label('order_date','Order date : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
          {!! Form::text('order_date',null,['id'=>'order_date','class'=>'form-control']) !!}
    </div>
  </div>

  <div class="form-group form-inline">
    {!! Form::label('notes','Notes : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
            {!! Form::text('notes',null,['class'=>'form-control','placeholder'=>'size or color']) !!}
    </div>
  </div>

  <div class="form-group form-inline">
    <!-- {!! Form::label('sub_total','Sub Total : ',['class'=>'control-label col-sm-2'])!!} -->
    <div class="col-sm-10">
    <!-- {!! Form::text('sub_total','0.00',['class'=>'form-control']) !!} -->
    </div>
  </div>

  <div class="form-group form-inline">
    {!! Form::label('vat','Vat : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
      {!! Form::text('vat','0.00',['class'=>'form-control']) !!}
    </div>
  </div>

  <div class="form-group form-inline">
    {!! Form::label('discount','Discount : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
    {!! Form::text('discount','0.00',['class'=>'form-control']) !!}
    </div>
  </div>

  <div class="form-group form-inline">
    {!! Form::label('grand_total','Grand Total : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
    {!! Form::text('grand_total',null,['class'=>'form-control']) !!}
    </div>
  </div>

  <div class="form-group form-inline">
    {!! Form::label('delivery_date','Delivery Date : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
    {!! Form::text('delivery_date'   ,null,['id'=>'delivery_date','class'=>'form-control']) !!}

    </div>
  </div>


  <div class="form-group form-inline">

    {!! Form::label('delivery_agency','Delivery Agency : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-6 ">
        {!! Form::select('delivery_agency',['select'=>'-Select-','Fedex'=>'FedEx','EMS'=>'EMS','SFexpress'=>'SFexpress','k-packet'=>'K-Packet'],null,['class'=>'form-control', 'style'=>'width:35%']) !!}
    </div>
  </div>

  <div class="form-group form-inline">
    {!! Form::label('track_number','Track Number  : ',['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
    {!! Form::text('track_number',null,['class'=>'form-control']) !!}
    </div>
  </div>
</div>

<hr>
{!!Form::submit('save',['class'=>'btn btn-default'])!!}
<!-- {!!Form::reset('Reset',['class'=>'btn btn-default'])!!} -->
<a href="{{ URL::previous() }}" class="btn btn-default">return</a>
{!!Form::close() !!}
</div>
</div>
<script type="text/javascript">



  $(function(){

    //초기화한다. $order->product_name_arr의 배열의 크기만큼 tr의 수를 늘린다.
    var pn_arr_cnt = '<?= count($order->product_name_arr) ?>';
    var pn_arr =  ('<?=$order->product_name?>').split(",");
    var price_arr = ('<?=$order->price?>').split(",");
    var size_color_arr = ('<?=$order->size_color?>').split(",");
    var quantity_arr = ('<?=$order->quantity?>').split(",");
    var total_arr = ('<?=$order->total?>').split(",");
    var sales_price_arr = ('<?=$order->sales_price?>').split(",");


    $("#memberTable tr:eq(1) td:eq(0) :text").val(pn_arr[0]);
    $("#memberTable tr:eq(1) td:eq(1) :text").val(size_color_arr[0]);
    $("#memberTable tr:eq(1) td:eq(2) :text").val(price_arr[0]);
    $("#memberTable tr:eq(1) td:eq(3) :text").val(quantity_arr[0]);
    $("#memberTable tr:eq(1) td:eq(4) :text").val(total_arr[0]);
    $("#memberTable tr:eq(1) td:eq(5) :text").val(sales_price_arr[0]);

    if(pn_arr_cnt !=1){
       //alert(pn_arr_cnt);
      for(var i=0; i<pn_arr_cnt-1;i++)
      {
        //console.log(pn_arr[i+1]);
        //alert(pn_arr[i]);
         $.trClone = $("#memberTable tr:last").clone(true).html();
         $.newTr = $("<tr class='tr_flag'>"+$.trClone+"</tr>");
        //  $.newTr.find(":text").val("");
         $("#memberTable").append($.newTr);
         //delete Button추가
        $.btnDelete = $(document.createElement("input"));
        $.btnDelete.attr({
          name:"btnRemove",
          type:"button",
          class:"btn btn-danger",
          value:"-"
        });

        $("#memberTable tr:last td:last").html("");
        $("#memberTable tr:last td:last").append($.btnDelete);

        $("#memberTable tr>td:last>input[type='button']").on('click', function(){
          $(this).parent().parent().remove();
        });

      }

      $(".tr_flag:eq(0) td:eq(0) :text").val(pn_arr[1]);
      $(".tr_flag:eq(1) td:eq(0) :text").val(pn_arr[2]);
      $(".tr_flag:eq(2) td:eq(0) :text").val(pn_arr[3]);
      $(".tr_flag:eq(3) td:eq(0) :text").val(pn_arr[4]);
      $(".tr_flag:eq(4) td:eq(0) :text").val(pn_arr[5]);
      $(".tr_flag:eq(5) td:eq(0) :text").val(pn_arr[6]);
      $(".tr_flag:eq(6) td:eq(0) :text").val(pn_arr[7]);
      $(".tr_flag:eq(7) td:eq(0) :text").val(pn_arr[8]);
      $(".tr_flag:eq(8) td:eq(0) :text").val(pn_arr[9]);

      //증가되는  tr의 인덱스 만큼 선택자도 증가되어야 한다. size_color
       $(".tr_flag:eq(0) td:eq(1) :text").val(size_color_arr[1]);
       $(".tr_flag:eq(1) td:eq(1) :text").val(size_color_arr[2]);
       $(".tr_flag:eq(2) td:eq(1) :text").val(size_color_arr[3]);
       $(".tr_flag:eq(3) td:eq(1) :text").val(size_color_arr[4]);
       $(".tr_flag:eq(4) td:eq(1) :text").val(size_color_arr[5]);
       $(".tr_flag:eq(5) td:eq(1) :text").val(size_color_arr[6]);
       $(".tr_flag:eq(6) td:eq(1) :text").val(size_color_arr[7]);
       $(".tr_flag:eq(7) td:eq(1) :text").val(size_color_arr[8]);
       $(".tr_flag:eq(8) td:eq(1) :text").val(size_color_arr[9]);


       //증가되는  tr의 인덱스 만큼 선택자도 증가되어야 한다. price
      $(".tr_flag:eq(0) td:eq(2) :text").val(price_arr[1]);
      $(".tr_flag:eq(1) td:eq(2) :text").val(price_arr[2]);
      $(".tr_flag:eq(2) td:eq(2) :text").val(price_arr[3]);
      $(".tr_flag:eq(3) td:eq(2) :text").val(price_arr[4]);
      $(".tr_flag:eq(4) td:eq(2) :text").val(price_arr[5]);
      $(".tr_flag:eq(5) td:eq(2) :text").val(price_arr[6]);
      $(".tr_flag:eq(6) td:eq(2) :text").val(price_arr[7]);
      $(".tr_flag:eq(7) td:eq(2) :text").val(price_arr[8]);
      $(".tr_flag:eq(8) td:eq(2) :text").val(price_arr[9]);
      //증가되는  tr의 인덱스 만큼 선택자도 증가되어야 한다. quantity
      $(".tr_flag:eq(0) td:eq(3) :text").val(quantity_arr[1]);
      $(".tr_flag:eq(1) td:eq(3) :text").val(quantity_arr[2]);
      $(".tr_flag:eq(2) td:eq(3) :text").val(quantity_arr[3]);
      $(".tr_flag:eq(3) td:eq(3) :text").val(quantity_arr[4]);
      $(".tr_flag:eq(4) td:eq(3) :text").val(quantity_arr[5]);
      $(".tr_flag:eq(5) td:eq(3) :text").val(quantity_arr[6]);
      $(".tr_flag:eq(6) td:eq(3) :text").val(quantity_arr[7]);
      $(".tr_flag:eq(7) td:eq(3) :text").val(quantity_arr[8]);
      $(".tr_flag:eq(8) td:eq(3) :text").val(quantity_arr[9]);

      //증가되는  tr의 인덱스 만큼 선택자도 증가되어야 한다. total
       $(".tr_flag:eq(0) td:eq(4) :text").val(total_arr[1]);
       $(".tr_flag:eq(1) td:eq(4) :text").val(total_arr[2]);
       $(".tr_flag:eq(2) td:eq(4) :text").val(total_arr[3]);
       $(".tr_flag:eq(3) td:eq(4) :text").val(total_arr[4]);
       $(".tr_flag:eq(4) td:eq(4) :text").val(total_arr[5]);
       $(".tr_flag:eq(5) td:eq(4) :text").val(total_arr[6]);
       $(".tr_flag:eq(6) td:eq(4) :text").val(total_arr[7]);
       $(".tr_flag:eq(7) td:eq(4) :text").val(total_arr[8]);
       $(".tr_flag:eq(8) td:eq(4) :text").val(total_arr[9]);

       //증가되는  tr의 인덱스 만큼 선택자도 증가되어야 한다. sales_ price
      $(".tr_flag:eq(0) td:eq(5) :text").val(sales_price_arr[1]);
      $(".tr_flag:eq(1) td:eq(5) :text").val(sales_price_arr[2]);
      $(".tr_flag:eq(2) td:eq(5) :text").val(sales_price_arr[3]);
      $(".tr_flag:eq(3) td:eq(5) :text").val(sales_price_arr[4]);
      $(".tr_flag:eq(4) td:eq(5) :text").val(sales_price_arr[5]);
      $(".tr_flag:eq(5) td:eq(5) :text").val(sales_price_arr[6]);
      $(".tr_flag:eq(6) td:eq(5) :text").val(sales_price_arr[7]);
      $(".tr_flag:eq(6) td:eq(5) :text").val(sales_price_arr[8]);
      $(".tr_flag:eq(6) td:eq(5) :text").val(sales_price_arr[9]);
    }
    //제품 컬럼들 초기화 끝
    $("#order_date").datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat:'yy-mm-dd'
    });

    $("#delivery_date").datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat:'yy-mm-dd'
    });

    $("#quantity").on('change', function(){
      //total 값 변경
      $("#total").val($("#quantity").val()*$("#price").val());

    });
run();
    function run(){
    $(".pn").autocomplete({
        source:'autocomplete',
        minLength:2,
        select:function(event, ui){
        //  $('#product_name').val(ui.item);
          $(this).on('blur', function(){
            //alert($("#product_name").val());
            $(this).parent().next().next().children().first().val(ui.item.price);
          });

          //마우스 클릭만 하면 제대로 값이 들어가지 않는 현상 보정
          var origEvent = event;
          while(origEvent.originalEvent !== undefined)
            origEvent = origEvent.originalEvent;
            if(origEvent.type=='keydown')
              $(".pn").click();
          //return false;
        }
      });
    }



    //추가 버튼 클릭시
    $("#addItemBtn").click(function(e){

      e.preventDefault();

      //alert(cnt);
              //clone
              $.trClone = $("#memberTable tr:last").clone(true).html();
              $.newTr =   $("<tr class='tr_flag'>"+$.trClone+"</tr>");

              //  var lastItemNo = $("#memberTable tr:last").attr("class").replace("item","");

               //$.newTr.find(".pn").attr("id","product_name_"+cnt); //+cnt

               $.newTr.find(":text").val("");
              //append
              $("#memberTable").append($.newTr);
              //초기화


              //delete Button추가
              $.btnDelete = $(document.createElement("input"));
              $.btnDelete.attr({
                name:"btnRemove",
                type:"button",
                class:"btn btn-danger",
                value:"-"
              });

              $("#memberTable tr:last td:last").html("");
              $("#memberTable tr:last td:last").append($.btnDelete);

              $("#memberTable tr>td:last>input[type='button']").on('click', function(){
                $(this).parent().parent().remove();
              });

              $(".pn").each(function(){
                run();
              });

              totalCalc();
              return false;

           });

           totalCalc();
           function totalCalc(){
           //추가되는 total 자동계산
            $(".tr_flag:eq(0) td:eq(3) :text").on("change", function(){
             $(".tr_flag:eq(0) td:eq(4) :text").val($(this).val()*  $(".tr_flag:eq(0) td:eq(2) :text").val());
            });

            $(".tr_flag:eq(1) td:eq(3) :text").on("change", function(){
             $(".tr_flag:eq(1) td:eq(4) :text").val($(this).val()*  $(".tr_flag:eq(1) td:eq(2) :text").val());
            });

            $(".tr_flag:eq(2) td:eq(3) :text").on("change", function(){

             $(".tr_flag:eq(2) td:eq(4) :text").val($(this).val()*  $(".tr_flag:eq(2) td:eq(2) :text").val());
            });

            $(".tr_flag:eq(3) td:eq(3) :text").on("change", function(){

             $(".tr_flag:eq(3) td:eq(4) :text").val($(this).val()*  $(".tr_flag:eq(3) td:eq(2) :text").val());
            });

            $(".tr_flag:eq(4) td:eq(3) :text").on("change", function(){

             $(".tr_flag:eq(4) td:eq(4) :text").val($(this).val()*  $(".tr_flag:eq(4) td:eq(2) :text").val());
            });
            $(".tr_flag:eq(5) td:eq(3) :text").on("change", function(){

             $(".tr_flag:eq(5) td:eq(4) :text").val($(this).val()*  $(".tr_flag:eq(5) td:eq(2) :text").val());
            });
            $(".tr_flag:eq(6) td:eq(3) :text").on("change", function(){

             $(".tr_flag:eq(6) td:eq(4) :text").val($(this).val()*  $(".tr_flag:eq(6) td:eq(2) :text").val());
            });
            $(".tr_flag:eq(7) td:eq(3) :text").on("change", function(){

             $(".tr_flag:eq(7) td:eq(4) :text").val($(this).val()*  $(".tr_flag:eq(7) td:eq(2) :text").val());
            });

            //그랜드토탈 자동계산
            $(".tr_flag:last td:eq(3) :text, #memberTable tr:eq(1) td:eq(3) :text").on("change", function(){
              //total 들을 전부 더해서 grand total 값으로 넣는다.
              var gtotal=0;

              var cnt= $(".tr_flag").length +2;

              for(var i=1; i<cnt; i++){
              gtotal = gtotal + (parseInt($("#memberTable tr:eq("+i+") td:eq(4) :text").val()));
              }
              $("#grand_total").val(gtotal);

            });

          }


  });
</script>

@stop
