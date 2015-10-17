$(function(){
  $("#order_date").datepicker({
    changeMonth:true,
    changeYear:true,
    dateFormat:'yy-mm-dd'
  });

  $("#delivery_date").datepicker({
    changeMonth:true,
    changeYear:true,
    dateFormat:'yy-mm-dd'
  });

  $("#quantity").on('change', function(){
    //total 값 변경
    $("#total").val($("#quantity").val()*$("#price").val());

  });


  //
  // $.ajaxSetup(
  //   {
  //     headers:{'X-CSRF-Token': $('input[name="_token"]').val()}
  //   });





run();
  function run(){
  $(".pn").autocomplete({

      source:'autocomplete',
      minLength:2,
      select:function(event, ui){
      //  $('#product_name').val(ui.item);
        $(this).on('blur', function(){
          //alert($("#product_name").val());
          $(this).parent().next().next().children().first().val(ui.item.price);
        });

        //마우스 클릭만 하면 제대로 값이 들어가지 않는 현상 보정
        var origEvent = event;
        while(origEvent.originalEvent !== undefined)
          origEvent = origEvent.originalEvent;
          if(origEvent.type=='keydown')
            $(".pn").click();
        //return false;
      }
    });
  }

  var cnt=0;

  //추가 버튼 클릭시
  $("#addItemBtn").click(function(e){

    e.preventDefault();
    //cnt = $(".tr_flag").length +1;
    //alert(cnt);
            //clone
            $.trClone = $("#memberTable tr:last").clone(true).html();
            $.newTr =   $("<tr class='tr_flag'>"+$.trClone+"</tr>");

            //  var lastItemNo = $("#memberTable tr:last").attr("class").replace("item","");

             //$.newTr.find(".pn").attr("id","product_name_"+cnt); //+cnt

            //append
            $("#memberTable").append($.newTr);

            //delete Button추가
            $.btnDelete = $(document.createElement("input"));
            $.btnDelete.attr({
              name:"btnRemove",
              type:"button",
              class:"btn btn-danger",
              value:"-"
            });

            $("#memberTable tr:last td:last").html("");
            $("#memberTable tr:last td:last").append($.btnDelete);

            $("#memberTable tr>td:last>input[type='button']").on('click', function(){
              $(this).parent().parent().remove();
            });

            $(".pn").each(function(){
              run();
            });

            return false;

         });




  //삭제버튼클릭시



  // var max_fields = 10;
  // var wrapper = $(".input_fields_wrap");
  // var add_button = $(".add_fields_button");
  //
  // var x =1;
  // $(add_button).click(function(e){
  //   e.preventDefault();
  //   if(x<max_fields){
  //     x++;
  //     var str = '<div><tr><td>{!! Form::text("product_name[]",null,["class"=>"form-control", "id"=>"product_name"])!!}</td><td>{!! Form::text("size_color",null,["class"=>"form-control"])!!}</td><td>{!! Form::text("price","0",["class"=>"form-control","id"=>"price","readonly"])!!}</td><td>{!! Form::text("quantity","0",["class"=>"form-control","id"=>"quantity"])!!}</td><td>{!! Form::text("total",null,["class"=>"form-control","id"=>"total","readonly"])!!}</td><td>{!! Form::text("sales_price",null,["class"=>"form-control"])!!}</td></tr><a href="#" class="remove_field">Remove</a></div>';
  //     $(wrapper).prepend(str);
  //   };
  //
  // });
  //
  // $(wrapper).on("click",".remove_field", function(e){
  //   e.preventDefault();
  //   $(this).parent('div').remove();
  //   x--;
  // })



});
