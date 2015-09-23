@extends('layouts.master')
@section('content')
<h1>All Products</h1>

<div class="row-fluid">
  <div class="col-sm-1">
    <input type="button" style="margin-top:20px;" class="btn btn-default" name="name" value="상품등록" onclick="window.location.href='{{route('product.create') }}'" />
  </div>
  <div class="col-sm-7">
  </div>
  <div class="col-sm-3" style="text-align:right">
    <!-- 검색 폼  -->
  <form class="form-inline" role="form"  method="get" id="search_form" >
    <div class="form-group" style="margin-top:20px;">
      <label for="q">Product Code</label>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="text" class="form-control" id="q" name="q" placeholder="Search.."style="width:45%; display:inline;">
      <input type="submit" class="btn btn-default" value="검색" id="search_btn">
    </div>
  </form>
  </div>

  <div class="col-sm-1">
    <?php echo $products->appends(['q'=>$query])->render() ?>
  </div>
</div>

<table class="table table-striped">

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
          <td><img src="{{$value}}" width="50px" height="50px" rel="noreferrer"/></td>
        @elseif($key!="id")
        <td>{{$value}}</td>
        @endif
      @endforeach
    </tr>
    <!-- 수정 버튼을 눌렀을 경우 폼이 생성 되어야될 지점 $key==id $value가 id값  -->

   @endforeach
</table>
<style media="screen">
    table.img{
      width:10%;
    }
</style>
