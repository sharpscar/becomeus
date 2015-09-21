@extends('layouts.master')
@section('content')
<h1>All Products</h1>

<table class="table table-striped">
  <div class="row-fluid">
    <div class="col-sm-8">
    </div>
    <div class="col-sm-3" style="text-align:right">
      <!-- 검색 폼  -->
		<form class="form-inline" role="form"  method="get" id="search_form" >
			<div class="form-group">
				<label for="usr">Product Code</label>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="text" class="form-control" id="q" name="q" placeholder="Search.."style="width:45%; display:inline;">
				<input type="submit" class="btn btn-default" value="검색" id="search_btn">
			</div>
		</form>
    </div>

    <div class="col-sm-1">
      <?php echo $products->render(); ?>
    </div>
  </div>
  <tr>
    <th>Product Code</th>
    <th>Image</th>
    <th>Price</th>
    <th>Status</th>
    <th>Business Group</th>
    <th>Product Group</th>
    <th>Stock</th>
    <th>Supplier</th>
    <th>MarketPlaces</th>
    <th>Added Time</th>
    <th>Added User</th>
    <th>Modified Time</th>
    <th>Modified User</th>
  </tr>


  @foreach($products as $keys=>$values)
  <?php
      $arr =  $values['attributes'];
      #$cnt = count($arr) -1;
  ?>
    <tr>
      @foreach($arr as $key=>$value)

        @if($key=="Image")
          <?php
            $value = ' <img src="'.$value.'" alt="" class="img"/>';

          ?>
        @endif


        @if($key!="id")
        <td>{{$value}}</td>
        @endif
      @endforeach
    </tr>
   @endforeach
</table>
<style media="screen">
    table.img{
      width:40%;
    }
</style>
