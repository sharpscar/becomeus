@extends('layouts.master')


@section('content')
<h1>All Products</h1>
<div class="row-fluid">
  <div class="col-sm-11">

  </div>
  <div class="col-sm-1">
    <input type="button" name="name" class="btn btn-default" value="logout" onclick="window.location.href='/auth/logout'">
  </div>
</div>
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

<?php
  #$array_dot = array_dot($products);
  #$arr0 = array_get($products, );  $arr_dot['id']
?>


  @foreach($products as $keys=>$values)
  <?php
      $arr =  $values['attributes'];
      #var_dump($arr);
      $res_arr = [];

      $res_arr['product_code'] = $arr['product_code'];
      $res_arr['image'] = $arr['image'];
      $res_arr['price'] = $arr['price'];
      $res_arr['status']=$arr['status'];
      $res_arr['business_group']=$arr['business_group'];
      $res_arr['product_group']=$arr['product_group'];
      $res_arr['stock']=$arr['stock'];
      $res_arr['supplier']=$arr['supplier'];
      $res_arr['marketplaces']=$arr['marketplaces'];
      $res_arr['added_time']=$arr['added_time'];
      $res_arr['added_user']=$arr['added_user'];
      $res_arr['modified_time']=$arr['modified_time'];
      $res_arr['modified_user']=$arr['modified_user'];
      $res_arr['id']=$arr['id'];

      $arr = $res_arr;
      $arr_dot = array_dot($arr);

  ?>
    <tr>
      @foreach($arr as $key=>$value)

        @if($key=="image")
          <td><img src="{{$value}}" width="50px" height="50px" rel="noreferrer"/></td>
        @elseif($key=="id")
          <!-- 키가 id인경우는 테이블에는 표시가 안되지만 value값을 사용해서 수정 / 삭제가 가능하게 유도해야한다. -->

        @elseif($key=="product_code")
          <a href=""><td>
            {{$value}}
            <br>


            {!! Form::open(['method'=>'DELETE', 'route'=>['product.destroy',$arr_dot['id']], 'onsubmit'=>'confirmDelete()']  ) !!}
              <a href="{{ route('product.edit',$arr_dot['id']) }}" class="btn btn-primary">수정</a>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="_method" value="delete">
              <input type="submit" name="" class="btn btn-primary" value="삭제">
            {!! Form::close()!!}

            <!-- <form id="delete_form" class="" action="{{ route('product.destroy',$arr_dot['id']) }}" method="post" style="display: inline;",>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="_method" value="delete">
              <button class="btn btn-primary" >삭제</button>

            </form> -->


            <script type="text/javascript">
              function confirmDelete(){
                 var x = confirm("Are you sure you want to delete?");
                 if(x)
                  return true;
                else {
                  return false;
                }
              }

            </script>

            <!-- <a href="{{ route('product.destroy',$arr_dot['id']) }}" class="btn btn-primary">삭제</a> -->
            <!-- route('product.destroy',$arr_dot['id'])-->

          </td></div></a>

        @elseif($key!="id")
        <td>{{$value}}</td>
        @endif
      @endforeach
    </tr>
    <!-- 수정 버튼을 눌렀을 경우 폼이 생성 되어야될 지점 $key==id $value가 id값  -->

   @endforeach
</table>
<div class="row-fluid">
  <div class="col-sm-12">
    <form id="addDataForm"class="dropzone" action="importData" method="post">
      {{csrf_field()}}
    </form>
  </div>

</div>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js">

</script>
<script type="text/javascript">
//   Dropzone.options.addDataForm={
//   paramName:'data',
//   maxFilesize:10,
//   acceptedFiles:'.csv'
// };
</script>



<style media="screen">
    table.img{
      width:10%;
    }
    .dropzone{
      height:10px;
    }
</style>
