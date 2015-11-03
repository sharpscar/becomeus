<!DOCTYPE html ng-app>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css" media="screen" title="no title" charset="utf-8">



    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js">
    </script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script>



    <script type="text/javascript">

//  $(document).ready(function(){
//
// });




    function doSubmit(){
       getCheckboxValue();
       $('#productForm').submit();
      // if(getCheckImageUpload()){
      //     $('#productForm').submit();
      // }
    }

    // function getCheckImageUpload(){
    //
    //
    //   //이미지가 있을경우
    //   if( $("#image_from_file").val() != "" ){
    //     var ext = $('#image_from_file').val().split('.').pop().toLowerCase();
    //     //var _switch = true;
    //     if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
	  //      alert('gif,png,jpg,jpeg 파일만 업로드 할수 있습니다.');
    //       document.forms[0].image_from_file.focus();
    //       return 0;
    //     }else{
    //       return 1;
    //     }
    //   }else{
    //     //이미지가 없을경우
    //     return 1;
    //   }
    //
    // }


    /** 체크 박스의 내용을 모아서 값, 값, 값, 이런형식의 문자열로 값을 형성한다. **/
    function getCheckboxValue(){
        var chk = document.getElementsByName('market_place');
        var len = chk.length;       // marketplaces 체크박스 숫자
        var checkRow = '';          //체크박스 value를 담을 임시공간
        var checkCnt=0;             //체크된 갯수
        var checkLast = '';        //체크된 체크박스의 마지막 인덱스
        var rowValues = '';       // 체크된 요소의 값들을 저장할 공간
        var cnt=0;
        for(var i=0;i<len;i++){
          if(chk[i].checked==true){
            checkCnt++;
            checkLast = i;
          }
        }
        /* 체크된 값이 1개일경우, 마지막인경우,2개 이상일경우 */
        for(var i=0;i<len;i++){
          if(chk[i].checked==true){
            checkRow = chk[i].value;
            if(checkCnt==1){
              rowValues += checkRow;
            }else{
              if(i==checkLast){
                rowValues +=checkRow;
              }else{
                rowValues += checkRow+",";
              }
            }
            cnt++;
            checkRow ='';
          }

      }

        $('input[name=market_place]').attr('value', rowValues);

    }

    </script>


  </head>

  <body>


      <!-- <div class="container">
          <div class="jumbotron ">
           <img src="https://creator.zoho.com/appbuilder/sangguen2/order-management/downLoadImage?imgFileId=5752295000000012011&imgFileName=1422251796674_becomeus_logo.png" alt="logo" />
           <p class="lead"></p>
      </div> -->


      <!-- Static navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Becomeus</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="/product">Product</a></li>
        <li><a href="/orders">Orders</a></li>
        <li><a href="#">Purchase</a></li>
        <li><a href="#">Customer</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">

        @if(Auth::check())
        <li><a href="#">hello! &nbsp;{{Auth::user()->name}} </a></li>
        <li><a href="/auth/logout">Logout</a></li>
        @else
        <li><a href="/auth/login">Login</a></li>
        @endif
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>


      <div class="container">

        @yield('content')

      </div>

    @include('errors.list')

    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"></p>
      </div>
    </footer>
  </body>
</html>
