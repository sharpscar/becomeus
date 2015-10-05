@extends('layouts.master')
@section('content')



<br><br><br><br>
<div class="container-fluid">

  <!-- {!!Form::open(['route'=>'product.update','id'=>'productForm','method'=>'put', 'files'=>true]) !!} -->
  <form class="" action="{{route('product.update',$product->id)}}" id="productForm" method="post" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{{csrf_token()}}">
   <input type="hidden" name="_method" value="put">
  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
        <label for="business_group">Business Group <font color="#ec3e3e">*</font> </label>
      </div>

      <div class="col-sm-3 col-lg-2" >
        {!! Form::select('business_group',[
          'Partnership'=>'partnerShip',
          'Direct Business'=>'directBusiness',
          'online'=>'online'
        ], $product->business_group ,array('class' =>'form-control')) !!}
      </div>
    </div>
      <div class="col-sm-2 col-lg-1">

      </div>

    <div class="form-group">
      <div class="col-sm-2 col-lg-2 " >
        <label for="product_name">Product Name</label>
      </div>
      <div class="col-sm-3 col-lg-5">
        <input type="text" name="product_name" value="{{$product->product_name}}" style="width:240px" >
      </div>
    </div>
  </div>


  <div class="clearfix">

  </div>

  <div class="row-fluid">

    <div class="form-group">

      <div class="col-sm-2 col-lg-2" >
        <label for="product_group">Product Group <font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-3 col-lg-2">
        {!! Form::select('product_group',[
          'shoes'=>'shoes'
        ], $product->product_group ,array('class' => 'form-control')) !!}

      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
  <div class="form-group">
    <div class="col-sm-2 col-lg-2">
      <label for="description">Description</label>
    </div>
    <div class="col-sm-3 col-lg-5">
      <textarea name="description" rows="3" cols="40" style="width:240px;">{{$product->description}}</textarea>
    </div>
    </div>
  </div>
  <div class="clearfix">

  </div>
  <div class="row-fluid">
    <div class="form-group">
    <div class="col-sm-2 col-lg-2">
      <label for="category">Category</label>
    </div>
    <div class="col-sm-3 col-lg-2">

      {!! Form::select('category',[
        'Sneakkers'=>'sneakkers',
        'Boots'=>'boots',
        'Others'=>'others'
      ], $product->supplier ,array('class' => 'form-control')) !!}


    </div>
  </div>

    <div class="col-sm-2 col-lg-1">
    </div>

    <div class="form-group">

    <div class="col-sm-2 col-lg-2">
      <label for="keyword">Keyword</label>
    </div>
    <div class="col-sm-3 col-lg-5">
      <textarea name="keyword" rows="3" cols="40" style="width:240px;">{{$product->keyword}}</textarea>
    </div>
    </div>
  </div>
  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
    <div class="col-sm-2 col-lg-2">
      <label for="supplier">Supplier <font color="#ec3e3e">*</font></label>
    </div>
    <div class="col-sm-3 col-lg-2">

      {!! Form::select('supplier',[
        'Maxstart'=>'maxstar',
        'AIRREX'=>'airrex'
      ], $product->supplier ,array('class' => 'form-control')) !!}


    </div>
    </div>
    <div class="col-sm-2 col-lg-1">

    </div>

    <div class="form-group">
    <div class="col-sm-2 col-lg-2">
      <label for="image">Image</label>
    </div>
    <div class="col-sm-3 col-lg-5">


      <input type="text" name="image_from_url" value="" style="width:240px">
      <input type="file" name="image_from_file" value="" id="image_from_file">
    </div>
    </div>
  </div>
  <div class="clearfix">

  </div>
  <div class="row-fluid">
    <div class="form-group">
    <div class="col-sm-2 col-lg-2">
      <label for="brand">Brand</label>
    </div>
    <div class="col-sm-3 col-lg-2">

      <input type="text" name="brand" value="{{$product->brand}}" style="width:240px">
    </div>
    </div>
    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
    <div class="col-sm-2 col-lg-2">
        <label for="marketplaces">Marketplace</label>
    </div>
    <div class="col-sm-3 col-lg-5">
<?php
  //echo $product->marketplaces;
  $arr_marketplaces = explode(',',$product->marketplaces);


  // echo $arr_val=in_array('Amazon.com',$arr_marketplaces);
  // echo in_array('maxstarStore',$arr_marketplaces);
  // echo in_array('ebay',$arr_marketplaces);
  // 가져온 스트링을 배열로 쪼개어 $arr_marketplaces[] 에 저장한다.

  // $arr_marketplaces[] 의 값과 폼에 있는 체크박스 value와 대조하여 있는것은 checked 없는것은 무시한다.

 ?>
 <br>
{!! Form::checkbox('marketplaces','Amazone_com', in_array(' Amazon.com',$arr_marketplaces)) !!}Amazone.com <br>
{!! Form::checkbox('marketplaces','Amazone_com', in_array(' MaxstarStore',$arr_marketplaces)) !!}MaxstarStore <br>
{!! Form::checkbox('marketplaces','Amazone_com', in_array(' eBay and etc',$arr_marketplaces)) !!}eBay and etc <br>

      <!-- <input type="checkbox" name="marketplaces" value="Amazone_com" >Amazone.com <br>
      <input type="checkbox" name="marketplaces" value="maxstarStore">MaxstarStore <br>
      <input type="checkbox" name="marketplaces" value="ebay">eBay and etc <br> -->
    </div>
  </div>
</div>
<div class="clearfix">

</div>
  <div class="row-fluid">
    <div class="form-group">
    <div class="col-sm-2 col-lg-2">
      <label for="product_code">Product Code <font color="#ec3e3e">*</font></label>
    </div>
    <div class="col-sm-3 col-lg-2">

      <input type="text" name="product_code" value="{{$product->product_code}}" style="width:240px" required>
    </div>
  </div>
    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
        <label for="status">Status</label>
      </div>
      <div class="col-sm-3 col-lg-2">

        {!! Form::select('status',[
          'Active'=>'active',
          'Inactive'=>'inactive'
        ], $product->status ,array('class' => 'form-control')) !!}


        <!-- <select class="" name="status" style="width:240px;">
          <option value="">-select-</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select> -->
      </div>
    </div>
  </div>

<div class="clearfix">

</div>



  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
        <label for="price">Price <font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-2 col-lg-2">


        <input type="text" name="price_china" value="{{$product->price}}" style="width:240px" required>
      </div>
    </div>


  </div>

  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
          <label for="price_krw">Price</label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <input type="text" name="price_krw" value="{{$product->price_krw}}" style="width:240px" >
      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">

      </div>
      <div class="col-sm-3 col-lg-5">

      </div>
    </div>
  </div>

  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
          <label for="stock">Stock <font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <input type="text" name="stock" value="{{$product->stock}}" style="width:240px" required>
      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">

      </div>
      <div class="col-sm-3 col-lg-5">

      </div>
    </div>
  </div>

  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
          <label for="variation">Variation <font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-3 col-lg-2">

        {!! Form::select('variation',[
          'None'=>'none',
          'Sizes'=>'sizes',
          'Colors'=>'colors',
          'Sizes/Colors'=>'sizesAndColors'
        ], 'None' ,array('class' => 'form-control')) !!}

      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">

      </div>
      <div class="col-sm-3 col-lg-5">

      </div>
    </div>
  </div>

  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
        <label for="color">Color</label>
      </div>
      <div class="col-sm-3 col-lg-2">

        {!! Form::select('color',[
          'Black'=>'black',
          'White'=>'white',
          'MultiColored'=>'multicolored'

        ], 'Black' ,array('class' => 'form-control')) !!}


      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">

      </div>
      <div class="col-sm-3 col-lg-5">

      </div>
    </div>
  </div>

  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
          <label for="weight">Weight(g) <font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <input type="text" name="weight" value="{{$product->weight}}" style="width:240px" required>
      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">

      </div>
      <div class="col-sm-3 col-lg-5">

      </div>
    </div>
  </div>

  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
          <label for="dimension">Dimension <font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <textarea name="dimension" rows="3" cols="40" style="width:240px" required>{{$product->dimension}}</textarea>
      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">

      </div>
      <div class="col-sm-3 col-lg-5">

      </div>
    </div>
  </div>

  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
        <label for="material_china">Material(china) <font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <textarea name="material_china" rows="3" cols="40" style="width:240px" required>{{$product->material_china}}</textarea>
      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">

      </div>
      <div class="col-sm-3 col-lg-5">

      </div>
    </div>
  </div>

  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
        <label for="material_english">Material(english) </label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <textarea name="material_english" rows="3" cols="40" style="width:240px" >{{$product->material_english}}</textarea>
      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">

      </div>
      <div class="col-sm-3 col-lg-5">

      </div>
    </div>
  </div>

  <div class="clearfix">

  </div>

  <hr>
  <div class="" style="text-align:center">
    <input type="button" class="btn btn-default" value="submit" onclick='doSubmit()' >
    <input type="reset" class="btn btn-default"  value="cancel">
  </div>
</form>
  <!-- -->
  <!-- {!!Form::close() !!} -->
</div>
