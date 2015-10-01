<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
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
      if(getCheckImageUpload()){
          $('#productForm').submit();
      }
    }

    function getCheckImageUpload(){

      //이미지가 있을경우
      if( $("#image_from_file").val() != "" ){
        var ext = $('#image_from_file').val().split('.').pop().toLowerCase();
        //var _switch = true;
        if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
	       alert('gif,png,jpg,jpeg 파일만 업로드 할수 있습니다.');
          document.forms[0].image_from_file.focus();
          return 0;
        }else{
          return 1;
        }
      }else{
        //이미지가 없을경우
        return 1;
      }

    }

    function getCheckboxValue(){
        var chk = document.getElementsByName('marketplaces');
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
        /* 체크된  1개일경우, 마지막인경우,2개 이상일경우 */
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
        $('input[name=marketplaces]').attr('value', rowValues);

    }

    </script>


  </head>
  <body>


      <!-- <div class="container">
          <div class="jumbotron ">
           <img src="https://creator.zoho.com/appbuilder/sangguen2/order-management/downLoadImage?imgFileId=5752295000000012011&imgFileName=1422251796674_becomeus_logo.png" alt="logo" />
           <p class="lead"></p>
      </div> -->


      <div class="container">
        @yield('content')

      </div>



    </div>
  </body>
</html>
