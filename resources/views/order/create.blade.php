@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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

    $("#quantity").on('change', function(){
      //total 값 변경
      $("#total").val($("#quantity").val()*$("#price").val());

    })
  });
</script>

<div class="container">
  <div class="row">
    <div class="span8">
      <h2>New Order</h2>
      {!!Form::open(['method'=>'POST', 'url'=>'orders','class'=>'form-horizontal']) !!}
      {!! csrf_field() !!}



        <div class="form-group">
          <h4>Add Customer</h4>
          <table class="table col-sm-12">
            <tr>
              <th>Frist Name</th><th>Contact email</th><th>Contact phone</th><th>Street</th><th>City</th><th>State</th><th>Zip code</th><th>Country</th>
            </tr>
            <tr>
              <td>
                {!! Form::text('first_name',null,['class'=>'form-control']) !!}
              </td>
              <td>
                {!! Form::text('contact_email',null,['class'=>'form-control']) !!}
              </td>
              <td>
                {!! Form::text('contact_number',null,['class'=>'form-control']) !!}
              </td>
              <td>
                {!! Form::text('street',null,['class'=>'form-control']) !!}
              </td>
              <td>
                {!! Form::text('city',null,['class'=>'form-control']) !!}
              </td>
              <td>
                {!! Form::text('state',null,['class'=>'form-control']) !!}
              </td>
              <td>
                {!! Form::text('zip',null,['class'=>'form-control']) !!}
              </td>
              <td>
                {!! Form::text('country',null,['class'=>'form-control']) !!}
              </td>
            </tr>

          </table>
        </div>



        <div class="form-group">
            <h4> Add products</h4>
            <table class="table col-sm-12">

              <tr>
                <th>Product </th><th>Size &amp;Color </th><th>Price </th><th>Quantity </th><th>Total </th><th>Sales Price </th>
              </tr>
              <tr>
                <td>{!! Form::select('product_name',['select'=>'-Select-','array'=>'Array'],null,['class'=>'form-control'])!!}</td>
                <td>
                  {!! Form::text('size_color',null,['class'=>'form-control'])!!}
                </td>
                <td>
                  {!! Form::text('price','10',['class'=>'form-control','id'=>'price','readonly'])!!}
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
              {!! Form::select('market_place',['select'=>'-Select-','amazone.com'=>'Amazone.com','amazone.uk'=>'Amazone.uk','maxstarstore'=>'Maxstarstore','ebay'=>'Ebay','other'=>'Other'],null,['class'=>'form-control','style'=>'width:35%']) !!}
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
                  {!! Form::text('notes','Size or Color',['class'=>'form-control']) !!}
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
              {!! Form::select('delivery_agency',['select'=>'-Select-','fedex'=>'FedEx','ems'=>'EMS','k-packet'=>'K-Packet'],null,['class'=>'form-control', 'style'=>'width:35%']) !!}
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
    {!!Form::submit('save',['class'=>'btn btn-default'])!!}{!!Form::reset('Reset',['class'=>'btn btn-default'])!!}

  {!!Form::close() !!}
  </div>
</div>

<style media="screen">

</style>
@stop
