@extends('layouts.master')
@section('content')


<br><br><br><br>
<div class="container-fluid">

  <form class="" action="{{route('product.store')}}" id="productForm" method="post" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="row-fluid">
    <div class="form-group">

      <div class="col-sm-2 col-lg-2">
        <label for="Business_group">Business Group <font color="#ec3e3e">*</font> </label>
      </div>

      <div class="col-sm-3 col-lg-1" >

        <select class="form-control" name="business_group" style="width:240px" required>
          <option value="">-select-</option>
          <option value="partnerShip">Partnership</option>
          <option value="directBusiness">Direct Business</option>
          <option value="online">online</option>
        </select>
      </div>
    </div>

      <div class="col-sm-2 col-lg-2">

      </div>

    <div class="form-group">
      <div class="col-sm-2 col-lg-2 " >
        <label for="product_name">Product Name</label>
      </div>
      <div class="col-sm-3 col-lg-5">

        <input type="text" name="product_name" value="" style="width:240px" class="form-control" >
      </div>
    </div>
  </div>


  <div class="clearfix">

  </div>

  <div class="row-fluid">

    <div class="form-group">

      <div class="col-sm-2 col-lg-2" >
        <label for="Product_group">Product Group <font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <select class="form-control" name="product_group" style="width:240px" required>
          <option value="">-select-</option>
          <option value="shoes">shoes</option>
        </select>
      </div>
    </div>

    <div class="col-sm-2 col-lg-1">

    </div>
  <div class="form-group">
    <div class="col-sm-2 col-lg-2">
      <label for="description">Description</label>
    </div>
    <div class="col-sm-3 col-lg-5">
      <textarea name="description" rows="3" cols="40" style="width:240px;" class="form-control"  ></textarea>
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

        <select class="form-control" name="category" style="width:240px">
          <option value="">-select-</option>
          <option value="sneakkers">Sneakkers</option>
          <option value="slip_ons">Slip-ons</option>
          <option value="boots">Boots</option>
          <option value="others">Others</option>
        </select>
    </div>
  </div>

    <div class="col-sm-2 col-lg-1">
    </div>

    <div class="form-group">

    <div class="col-sm-2 col-lg-2">
      <label for="keyword">Keyword</label>
    </div>
    <div class="col-sm-3 col-lg-5">
      <textarea name="keyword" rows="3" cols="40" style="width:240px;"class="form-control"></textarea>
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

      <select class="form-control" name="supplier" style="width:240px" required>
        <option value="">-select-</option>
        <option value="SMORK">SMORK</option>
        <option value="心仪">心仪</option>
        <option value="dengji">dengji</option>
        <option value="FanEr">FanEr</option>
        <option value="打底裤">打底裤</option>
        <option value="PaperPlanes">PaperPlanes</option>
        <option value="airrex">AIRREX</option>
        <option value="korea_story">Korea stroy</option>
        <option value="Maxstar">Maxstar</option>

      </select>
    </div>
    </div>
    <div class="col-sm-2 col-lg-1">

    </div>

    <div class="form-group">
    <div class="col-sm-2 col-lg-2">
      <label for="image">Image</label>
    </div>
    <div class="col-sm-3 col-lg-5">


      <input type="text" name="image_from_url" value="" style="width:240px" class="form-control">
      <input type="file" name="image_from_file" value="" id="image_from_file" class="form-control">
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

      <input type="text" name="brand" value="" style="width:240px" class="form-control">
    </div>
    </div>
    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
    <div class="col-sm-2 col-lg-2">
        <label for="marketplaces">Marketplace</label>
    </div>
    <div class="col-sm-3 col-lg-5">
      <input type="checkbox" name="marketplaces" value=" 淘宝网" >淘宝网 <br>
      <input type="checkbox" name="marketplaces" value=" 速卖通" >速卖通 <br>
      <input type="checkbox" name="marketplaces" value=" Amazon.com" >Amazon.com <br>
      <input type="checkbox" name="marketplaces" value=" MaxstarStore" >MaxstarStore <br>
      <input type="checkbox" name="marketplaces" value=" Amazon.uk" >Amazon.uk <br>
      <input type="checkbox" name="marketplaces" value=" eBay_and_etc" >eBay and etc <br>


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

      <input type="text" name="product_code" value="" style="width:240px" required class="form-control">
    </div>
  </div>
    <div class="col-sm-2 col-lg-1">

    </div>
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
        <label for="status">Status</label>
      </div>
      <div class="col-sm-3 col-lg-5">
        <select  name="status" style="width:240px;" class="form-control">
          <option value="">-select-</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>
    </div>
  </div>

<div class="clearfix">

</div>



  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
        <label for="price_china">Price (cny)<font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <input type="text" name="price_china" value="" style="width:240px" required class="form-control">
      </div>
    </div>


  </div>

  <div class="clearfix">

  </div>

  <div class="row-fluid">
    <div class="form-group">
      <div class="col-sm-2 col-lg-2">
          <label for="price_krw">Price (krw)</label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <input type="text" name="price_krw" value="" style="width:240px" class="form-control">
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

        <input type="text" name="stock" value="" style="width:240px" required class="form-control">
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

        <select class="form-control" name="variation" style="width:240px" required >
          <option value="">-select-</option>
          <option value="none">None</option>
          <option value="sizes">Sizes</option>
          <option value="colors">Colors</option>
          <option value="sizesAndColors">Sizes/Colors</option>
        </select>
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

        <select class="form-control" name="color" style="width:240px">
          <option value="">-select-</option>
          <option value="black">Black</option>
          <option value="Brown">Brown</option>
          <option value="Beige">Beige</option>
          <option value="Blue">Blue</option>
          <option value="Red">Red</option>
          <option value="multicolored">MultiColored</option>
          <option value="Other">Other</option>
        </select>
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

        <input type="text" name="weight" value="" style="width:240px" required class="form-control">
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
          <label for="demension">Dimension <font color="#ec3e3e">*</font></label>
      </div>
      <div class="col-sm-3 col-lg-2">

        <textarea name="demension" rows="3" cols="40" style="width:240px" required class="form-control"></textarea>
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

        <textarea name="material_china" rows="3" cols="40" style="width:240px" required class="form-control"></textarea>
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

        <textarea name="material_english" rows="3" cols="40" style="width:240px" class="form-control"></textarea>
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
@include('errors.list')

</div>
@stop
