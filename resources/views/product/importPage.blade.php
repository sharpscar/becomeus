@extends('layouts.master')

@section('content')

<br><br><br>


<div class="row-fluid">
  <br><br>
  <h4>데이터 베이스에 넣을 csv 파일을 여기에 놓으세요</h4>
  <hr>
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


@stop
