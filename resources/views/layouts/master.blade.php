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

// $(document).ready(function(){

    function getCheckboxValue(){
      //alert('환영한다');

        var chk = document.getElementsByName('marketplaces');
        var len = chk.length;
        var checkRow = ''; //체크박스 value를 담을 공간
        var checkCnt=0;
        var checkLast = '';
        var rowValues = '';
        var cnt=0;

        for(var i=0;i<len;i++){
          if(chk[i].checked==true){
            checkCnt++;
            checkLast = i;
          }
        }

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
        alert($('input[name=marketplaces]').attr('value'));

        $('#productForm').submit();
    }

    // 체크 되어 있는 값 추출
      //  $("#getCheckedAll").click(function() {
      //      $("input[name=box]:checked").each(function() {
      //          var test = $(this).val();
      //          console.log(test);
      //      });
      //  });


      /* 체크박스 다수 값 가져오는데 실패할경우 쓰려했던 js 함수 */
      // function getCheckboxValue(){
      //   alert('함수시작');
      //   var chk = document.getElementByName('marketplaces[]');
      //   var len = chk.length;
      //   var checkRow = ''; //체크박스 value를 담을 공간
      //   var checkCnt=0;
      //   var checkLast = '';
      //   var rowValues = '';
      //   var cnt=0;
      //
      //   for(var i=0;i<len;i++){
      //     if(chk[i].checked==true){
      //       checkCnt++;
      //       checkLast = i;
      //     }
      //   }
      //
      //   for(var i=0;i<len,i++){
      //     if(chk[i].checked==true){
      //       checkRow = chk[i].value;
      //       if(checkCnt==1){
      //         rowValues += "'"+checkRow+"'";
      //       }else{
      //         if(i==checkLast){
      //           rowValues +="'"+checkRow+"'";
      //         }else{
      //           rowValues +="'"+checkRow+"',";
      //         }
      //       }
      //       cnt++;
      //       checkRow ='';
      //     }
      //   alert(rowValues)  ;
      //   }
      //
      // }
    // }

    </script>


  </head>
  <body>
    <div class="container-fluid">
        @yield('content')

    </div>
  </body>
</html>
