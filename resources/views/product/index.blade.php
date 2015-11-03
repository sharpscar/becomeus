@extends('layouts.master')


@section('content')


<h1>All Products</h1>
<div class="row-fluid">
  <div class="col-sm-11">

  </div>
  <div class="col-sm-1">

  </div>
</div>

<div class="row-fluid">
  <div class="col-sm-1">
    <input type="button" style="margin-top:20px;" class="btn btn-default" name="name" value="상품등록" onclick="window.location.href='{{route('product.create') }}'" />
  </div>

  <div class="col-sm-3">

  </div>

  <!-- <form class="form-inline" role="form"  method="get" id="limit_form"  style="margin-top:20px;text-align:right;">
    <label for="sel_limit">line</label>
    <select  name="limit"  class="form-control" id="sel_limit" style="width:50%;">
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="50">50</option>
      <option value="100">100</option>
      <option value="150">150</option>
      <option value="200">200</option>
    </select>
  </form> -->

  <div class="col-sm-5" >

    <!-- 검색 폼  -->
  <form class="form-inline" role="form"  method="get" id="search_form" style="text-align:right;">
    <div class="form-group" style="margin-top:20px;">
      <label for="sel_limit">line</label>
      <select  name="limit"  class="form-control" id="sel_limit" style="width:20%;">
        <option value="0">-select-</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="150">150</option>
        <option value="200">200</option>
      </select> &nbsp;&nbsp;&nbsp;
      <label for="q">Product Code :</label>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="text" class="form-control" id="q" name="q" placeholder="Search.."style="width:25%; display:inline;">
      <input type="submit" class="btn btn-default" value="검색" >
    </div>
  </form>
  </div>
  <div class="col-sm-2">
    <?php echo $products->appends(['q'=>$query])->render(); ?>
  </div>
  <div class="col-sm-1">

    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-top:20px;">
        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">&nbsp;csv</span>
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="/importPage">Import</a></li>
        <li><a href="/exd">export</a></li>
      </ul>
    </div>
  </div>

</div>
<!-- low -->


<table class="table table-striped">

  <tr>
    <th width="15%">Product Code</th>
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
          <!-- 만약 'http://' 값이 있으면 -->
          @if(strstr($value,'http://'))
          <td style="display: table-cell; text-align: center; vertical-align: middle; ">
            <img src="{{$value}}" class="img_" type="image"  style="width:50px; height:50px;"/>
            <!-- {!!Form::image('{{$value}}')!!} -->
          </td>
          @else
          <!--  서버 방식인 경우 -->
          <td style="display: table-cell; text-align: center; vertical-align: middle; ">
            <img src="http://localhost/{{$value}}" class="img_" rel="noreferrer" />
          </td>
          @endif
        @elseif($key=="id")
          <!-- 키가 id인경우는 테이블에는 표시가 안되지만 value값을 사용해서 수정 / 삭제가 가능하게 유도해야한다. -->

        @elseif($key=="product_code")
          <td>
            <a href="{{route('product.show', $arr_dot['id'])}}">{{$value}}</a>
            <br>
            {!! Form::open(['method'=>'DELETE', 'route'=>['product.destroy',$arr_dot['id']], 'onsubmit'=>'return confirmDelete()']  ) !!}
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

            $("#sel_limit").on('change',function(){
              //alert('한번만');
              var select = $(this);
              var form = $("#search_form");
              form.attr('action','/product?limit="+select.val())' );
              form.submit();
            });

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

          </td></div>

        @elseif($key!="id")
        <td>{{$value}}</td>
        @endif
      @endforeach
    </tr>
    <!-- 수정 버튼을 눌렀을 경우 폼이 생성 되어야될 지점 $key==id $value가 id값  -->

   @endforeach
</table>





<style media="screen">
    table.img_{
      max-width:100%;
      width:inherit;
      height:auto;
    }
    .dropzone{
      height:10px;
    }
</style>
@stop
