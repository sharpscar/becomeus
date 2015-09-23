@extends('layouts.master')
@section('content')
<h2>제품 등록</h2>

<hr>
<br>
<table border="0">

  <form class="" action="" method="post">
    <div class="form-group">
    <tr>
      <td>
        <label for="BusinessGroup">Business Group</label>
      </td>

        <td>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <select class="" name="businessGroup" style="width:240px">
            <option value="">-select-</option>
            <option value="partnerShip">Partnership</option>
            <option value="directBusiness">Direct Business</option>
            <option value="online">online</option>
          </select>
        </td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

        <td>
          <label for="productName">Product Name</label>
        </td>
        <td>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="text" name="productName" value="">
        </td>

    </tr>
    </div>

    <tr>
    <div class="form-group">
      <td>
      <label for="ProductGroup">Product Group</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <select class="" name="productGroup" style="width:240px">
        <option value="">-select-</option>
      </select>
      </td>
      <td></td>
      <td>
          <label for="description">Discription</label>
      </td>
      <td>
        <textarea name="description" rows="3" cols="40" style="width:240px;"></textarea>
      </td>
    </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
        <label for="category">Category</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
        <select class="" name="category" style="width:240px">
          <option value="">-select-</option>
          <option value="sneakkers">Sneakkers</option>
          <option value="slip_ons">Slip-ons</option>
          <option value="boots">Boots</option>
          <option value="others">Others</option>
        </select>
        </td>

        <td></td>
        <td>
            <label for="keyword">Keyword</label>
        </td>
        <td>
          <textarea name="keyword" rows="3" cols="40" style="width:240px;"></textarea>
        </td>
      </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
        <label for="supplier">Supplier</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <select class="" name="supplier" style="width:240px">
        <option value="">-select-</option>
        <option value="maxstar">Maxstart</option>
        <option value="airrex">AIRREX</option>
      </select>
      </td>

      <td></td>
      <td>
          <label for="image">Image</label>
      </td>
      <td>
        <input type="text" name="image_from_url" value="">
        <input type="file" name="image_form_file" value="">
      </td>
    </div>
    </tr>

    <tr>


    <div class="form-group">
      <td>
      <label for="brand">Brand</label>
      </td>
      <td>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="text" name="brand" value="">
      </td>
      <td></td>
      <td>
          <label for="marketplace">Marketplace</label>
      </td>
      <td>
        <input type="checkbox" name="marketplace" value="Amazone_com">Amazone.com <br>
        <input type="checkbox" name="marketplace" value="maxstarStore">MaxstarStore <br>
        <input type="checkbox" name="marketplace" value="ebay">eBay and etc <br>
      </td>
    </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
      <label for="productCode">Product Code</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="text" name="productCode" value="">
      </td>

      <td></td>
      <td>
          <label for="active">Status</label>
      </td>
      <td>
        <select class="" name="active" style="width:240px;">
          <option value="">-select-</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </td>
    </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
      <label for="price_cny">Price</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="text" name="price_cny" value="">
      </td>
    </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
      <label for="price_krw">Price</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="text" name="price_krw" value="">
      </td>
    </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
      <label for="stock">Stock</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="text" name="stock" value="">
      </td>
    </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
        <label for="variation">Variation</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <select class="" name="variation" style="width:240px">
        <option value="">-select-</option>
        <option value="none">None</option>
        <option value="sizes">Sizes</option>
        <option value="colors">Colors</option>
        <option value="sizesAndColors">Sizes/Colors</option>
      </select>
      </td>
    </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
        <label for="color">Color</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <select class="" name="color" style="width:240px">
        <option value="">-select-</option>
        <option value="black">Black</option>
        <option value="white">White</option>
        <option value="multicolored">MultiColored</option>
      </select>
      </td>
    </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
      <label for="weight">Weight(g)</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="text" name="weight" value="">
      </td>
    </div>
    </tr>

    <tr>
    <div class="form-group">
      <td>
      <label for="weight">Dimension</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <textarea name="name" rows="3" cols="40" style="width:240px"></textarea>
      </td>
    </div>
    </tr>
    <tr>
    <div class="form-group">
      <td>
      <label for="Material_china">Material(china)</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <textarea name="Material_china" rows="3" cols="40" style="width:240px"></textarea>
      </td>
    </div>
    </tr>
    <tr>
    <div class="form-group">
      <td>
      <label for="Material_english">Material(english)</label>
      </td>
      <td>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <textarea name="Material_english" rows="3" cols="40" style="width:240px"></textarea>
      </td>
    </div>
    </tr>








    </form>
  </table>
</div>
