@extends('layouts.master')
@section('content')



<br><br><br><br>
{!!Form::model($product,['method'=>'PATCH', 'action'=>['ProductController@update', $product->id],'class'=>'form-horizontal', 'enctype'=>'multipart/form-data','id'=>'productForm']) !!}
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              {!! Form::label('business_group','Business Group : ',['class'=>'control-label'])  !!}
            </div>
            <div class="col-sm-8">
              {!! Form::select('business_group',[
                'Partnership'=>'partnerShip',
                'Direct Business'=>'directBusiness',
                'online'=>'online'
              ], $product->business_group ,array('class' =>'form-control')) !!}
            </div>

          </div>
        </div>

        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              {!! Form::label('product_name','Product Name: ',['class'=>'control-label'])  !!}
            </div>
            <div class="col-sm-8">
              {!! Form::text('product_name',null,['class'=>'form-control']) !!}
            </div>
          </div>
        </div>
      <!-- Row  -->
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-4">
            {!! Form::label('product_group','Product Group : ',['class'=>'control-label'])  !!}
          </div>
          <div class="col-sm-8">
            {!! Form::select('product_group',[
              'shoes'=>'shoes',
              'bags'=>'bags'
            ], $product->product_group ,array('class' => 'form-control')) !!}
          </div>

        </div>
      </div>

      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-4">
            {!! Form::label('description','Description: ',['class'=>'control-label'])  !!}
          </div>
          <div class="col-sm-8">
            {!! Form::textarea('description',null,['class'=>'form-control','rows'=>'4', 'cols'=>'40']) !!}
          </div>
        </div>
      </div>
    <!-- Row  -->
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-4">
          {!! Form::label('category','Category: ',['class'=>'control-label'])  !!}
        </div>
        <div class="col-sm-8">
          {!! Form::select('category',[
            'Sneakkers'=>'sneakkers',
            'Boots'=>'boots',
            'Bag'=>'Bag',
            'Others'=>'others'
          ], $product->supplier ,array('class' => 'form-control')) !!}
        </div>

      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-4">
          {!! Form::label('keyword','Keyword: ',['class'=>'control-label'])  !!}
        </div>
        <div class="col-sm-8">
          {!! Form::textarea('keyword',null,['class'=>'form-control','rows'=>'4', 'cols'=>'40']) !!}
        </div>
      </div>
    </div>
  <!-- Row  -->
</div>



<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('supplier','Supplier: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::select('supplier',[
          'Maxstart'=>'maxstar',
          'AIRREX'=>'airrex',
          'SMORK'=>'smork'
        ], $product->supplier ,array('class' => 'form-control')) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('image','Image: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('image',null,['class'=>'form-control']) !!}
        {!! Form::file('image_from_file',null,['class'=>'form-control']) !!}
      </div>
    </div>
  </div>
<!-- Row  -->
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('brand','Brand: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('brand',null,['class'=>'form-control']) !!}

      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('marketplaces','Marketplace: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        <?php
        // $arr_marketplaces = explode(',',$product->marketplaces);
        // var_dump($arr_marketplaces);
         ?>

        {!! Form::checkbox('marketplaces[]','amazone', in_array("Amazon.com",$arr_marketplaces))  !!}Amazone.com <br>
        {!! Form::checkbox('marketplaces[]','maxstarstore', in_array("maxstarstore",$arr_marketplaces))  !!}MaxstarStore <br>
        {!! Form::checkbox('marketplaces[]','ebay', in_array("maxstarstore",$arr_marketplaces))  !!}eBay and etc <br>
        {!! Form::checkbox('marketplaces[]','淘宝网', in_array("maxstarstore",$arr_marketplaces))  !!}淘宝网 <br>

        <!-- <input type="checkbox" name="marketplaces" value=" 淘宝网" >淘宝网 <br>
        <input type="checkbox" name="marketplaces" value=" 速卖通" >速卖通 <br>
        <input type="checkbox" name="marketplaces" value=" Amazon.com" >Amazon.com <br>
        <input type="checkbox" name="marketplaces" value=" MaxstarStore" >MaxstarStore <br>
        <input type="checkbox" name="marketplaces" value=" Amazon.uk" >Amazon.uk <br>
        <input type="checkbox" name="marketplaces" value=" eBay_and_etc" >eBay and etc <br> -->
      </div>
    </div>
  </div>
<!-- Row  -->
</div>


<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('product_code','Product Code: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('product_code',null,['class'=>'form-control']) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('status','Status: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        <?php
        // $arr_marketplaces = explode(',',$product->marketplaces);
        // var_dump($arr_marketplaces);
         ?>
         {!! Form::select('status',[
           'Active'=>'active',
           'Inactive'=>'inactive'
         ], $product->status ,array('class' => 'form-control')) !!}

      </div>
    </div>
  </div>
<!-- Row  -->
</div>


<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('price','Price_cny: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('price',null,['class'=>'form-control']) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">


      </div>
    </div>
  </div>
<!-- Row  -->
</div>


<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('price_krw','Price_kr: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('price_krw',null,['class'=>'form-control']) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">


      </div>
    </div>
  </div>
<!-- Row  -->
</div>


<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('stock','Stock: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('stock',null,['class'=>'form-control']) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">


      </div>
    </div>
  </div>
<!-- Row  -->
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('variation','Variation: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::select('variation',[
          'None'=>'none',
          'Sizes'=>'sizes',
          'Colors'=>'colors',
          'Sizes/Colors'=>'sizesAndColors'
        ], 'None' ,array('class' => 'form-control')) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">


      </div>
    </div>
  </div>
<!-- Row  -->
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('color','Color: ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::select('color',[
          'Black'=>'black',
          'White'=>'white',
          'MultiColored'=>'multicolored'

        ], 'Black' ,array('class' => 'form-control')) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">


      </div>
    </div>
  </div>
<!-- Row  -->
</div>


<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('weight','Weight(g): ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('weight',null,['class'=>'form-control']) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">


      </div>
    </div>
  </div>
<!-- Row  -->
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('demension','Dimension(g): ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::textarea('demension',null,['class'=>'form-control','rows'=>'4', 'cols'=>'40']) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">


      </div>
    </div>
  </div>
<!-- Row  -->
</div>


<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('material_china','Material(china) : ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::textarea('material_china',null,['class'=>'form-control','rows'=>'4', 'cols'=>'40']) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">


      </div>
    </div>
  </div>
<!-- Row  -->
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">
        {!! Form::label('material_english','Material(english) : ',['class'=>'control-label'])  !!}
      </div>
      <div class="col-sm-8">
        {!! Form::textarea('material_english',null,['class'=>'form-control','rows'=>'4', 'cols'=>'40']) !!}
      </div>

    </div>
  </div>

  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">


      </div>
    </div>
  </div>
<!-- Row  -->
</div>
<hr>
<div class="" style="text-align:center">
  <input type="button" class="btn btn-default" value="submit" onclick='doSubmit()' >
  <input type="reset" class="btn btn-default"  value="cancel">


</div>

{!! Form::close() !!}

@stop
