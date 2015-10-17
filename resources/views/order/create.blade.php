@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script type="text/javascript">
  $(function(){
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
// #quantity_1, #quantity_2, #quantity_3, #quantity_4, #quantity_5
    $("#quantity").on('change', function(){
      //total 값 변경
      $("#total").val($("#quantity").val()*$("#price").val());
    });

    $("#quantity_1").on('change', function(){
      //total 값 변경
      $("#total_1").val($("#quantity_1").val()*$("#price_1").val());
      alert('값변경');
    });
    $("#quantity_2").on('change', function(){
      //total 값 변경
      $("#total_2").val($("#quantity_2").val()*$("#price_2").val());
    });
    $("#quantity_3").on('change', function(){
      //total 값 변경
      $("#total_3").val($("#quantity_3").val()*$("#price_3").val());
    });
    $("#quantity_4").on('change', function(){
      //total 값 변경
      $("#total_4").val($("#quantity_4").val()*$("#price_4").val());
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

    var cnt=0;

    //추가 버튼 클릭시
    $("#addItemBtn").click(function(e){

      e.preventDefault();
      cnt = $(".tr_flag").length +1;
      alert(cnt);
              //clone
              $.trClone = $("#memberTable tr:last").clone(true).html();
              $.newTr =   $("<tr class='tr_flag'>"+$.trClone+"</tr>");

              //  var lastItemNo = $("#memberTable tr:last").attr("class").replace("item","");


              //$("#total").val($("#quantity").val()*$("#price").val());
              $.newTr.find("#total").attr("id","total_"+cnt);
              $.newTr.find("#quantity").attr("id","quantity_"+cnt);
              $.newTr.find("#price").attr("id","price_"+cnt);
               //$.newTr.find(".pn").attr("id","product_name_"+cnt); //+cnt

              //append
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

              $(".pn").each(function(){
                run();
              });

              return false;

           });
  });
</script>

<div class="container">
  <div class="row">

      <h2>New Order</h2>
      {!!Form::open(['method'=>'POST', 'url'=>'orders','class'=>'form-horizontal']) !!}
      {!! csrf_field() !!}



        <div class="form-group">
          <h4>Add Customer</h4>
          <div class="row">
            <div class="col-sm-6">

              <div class=" form-inline">
                {!! Form::label('first_name','First Name : ',['class'=>'control-label col-sm-5'])!!}

                {!! Form::text('first_name',null,['class'=>'form-control col-sm-7', 'style'=>'width:55%'  ]) !!}
              </div>
            </div>

            <div class="col-sm-6">
                <div class="form-inline">
                {!! Form::label('contact_email','Contact Email : ',['class'=>'control-label col-sm-5'])!!}

                {!! Form::text('contact_email',null,['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              {!! Form::label('country','Country : ',['class'=>'control-label col-sm-5'])!!}

              {!! Form::text('country',null,['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}

              <div class=" form-inline">

              </div>
            </div>

            <div class="col-sm-6">
                <div class="form-inline">
                {!! Form::label('contact_number','Contact Number : ',['class'=>'control-label col-sm-5'])!!}

                {!! Form::text('contact_number',null,['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">

              <div class=" form-inline">
                {!! Form::label('street','Street : ',['class'=>'control-label col-sm-5'])!!}

                {!! Form::text('street',null,['class'=>'form-control col-sm-7', 'style'=>'width:55%'  ]) !!}

              </div>
            </div>

            <div class="col-sm-6">
                <div class="form-inline">
                {!! Form::label('city','City : ',['class'=>'control-label col-sm-5'])!!}

                {!! Form::text('city',null,['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}
                </div>
            </div>
          </div>


          <div class="row">
            <div class="col-sm-6">

              <div class=" form-inline">
                {!! Form::label('state','State : ',['class'=>'control-label col-sm-5'])!!}

                {!! Form::text('state',null,['class'=>'form-control col-sm-7', 'style'=>'width:55%'  ]) !!}
              </div>
            </div>

            <div class="col-sm-6">
                <div class="form-inline">
                {!! Form::label('zip','Zip : ',['class'=>'control-label col-sm-5'])!!}

                {!! Form::text('zip',null,['class'=>'form-control col-sm-7', 'style'=>'width:55%']) !!}
                </div>
            </div>
          </div>

        </div>









        <div class="form-group">
            <h4> Add products</h4>
            <button id="addItemBtn">+</button>
            <table class="table col-sm-12" id="memberTable">

              <tr>
                <th>Product </th><th>Size &amp;Color </th><th>Price </th><th>Quantity </th><th>Total </th><th>Sales Price </th><th>remove</th>
              </tr>
                  <tr>
                    <td>{!! Form::text('product_name[]',null,['class'=>'form-control pn', 'id'=>'product_name_0' ])!!}</td>
                    <td>
                      {!! Form::text('size_color',null,['class'=>'form-control'])!!}
                    </td>
                    <td>
                      {!! Form::text('price','0',['class'=>'form-control','id'=>'price','readonly'])!!}
                    </td>
                    <td>
                      {!! Form::text('quantity','0',['class'=>'form-control','id'=>'quantity'])!!}
                    </td>
                    <td>
                      {!! Form::text('total',null,['class'=>'form-control','id'=>'total','readonly'])!!}
                    </td>
                    <td>
                      {!! Form::text('sales_price',null,['class'=>'form-control'])!!}
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
              {!! Form::select('market_place',['select'=>'-Select-','amazone.com'=>'Amazone.com','amazone.uk'=>'Amazone.uk','Aliexpress'=>'Aliexpress','Taobao'=>'Taobao','maxstarstore'=>'Maxstarstore','ebay'=>'Ebay','other'=>'Other'],null,['class'=>'form-control','style'=>'width:35%']) !!}
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
          {!! Form::label('sub_total','Sub Total : ',['class'=>'control-label col-sm-2'])!!}
          <div class="col-sm-10">
          {!! Form::text('sub_total','0.00',['class'=>'form-control']) !!}
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
          {!! Form::text('grand_total','0.00',['class'=>'form-control']) !!}
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
              {!! Form::select('delivery_agency',['select'=>'-Select-','Fedex'=>'FedEx','EMS'=>'EMS','k-packet'=>'K-Packet','SFexpress'=>'SFexpress'],null,['class'=>'form-control', 'style'=>'width:35%']) !!}
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
    {!!Form::reset('Reset',['class'=>'btn btn-default'])!!}
    <a href="{{ URL::previous() }}" class="btn btn-default">return</a>

  {!!Form::close() !!}
  </div>
</div>

<style media="screen">

</style>
@stop
