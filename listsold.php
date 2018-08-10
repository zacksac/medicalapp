<link rel="stylesheet" href="css/bootsrap.css">
<script src="js/jquery.js"></script>
<script src="js/jquery.easy-autocomplete.js"></script>
<link rel="stylesheet" href="js/easy-autocomplete.css">
<?php
include 'auth.php';

?>

list sold page.
<div class="container">
<br>

<button class="btn btn-primary" onclick="showsingle()" > sell single </button><br>


<button class="btn btn-primary" onclick="showmul();"> sell multiple</button>

</div>


<div id="div2"></div>




<div class="sellinter container">
	
<form name="sells" id="sells" method="post">
	<div class="form-group">
         <label for="formGroupExampleInput">product name</label>
         <input type="text" id="ename" required="" class="form-control" id="formGroupExampleInput" name="productname">
         </div>
      
      <div class="form-group">
         <label for="formGroupExampleInput">batch number</label>
         <input required="" type="text" id="ebatch" class="form-control" id="formGroupExampleInput" name="batch number">
        
      </div>
      
       <div class="form-group">
         <label for="formGroupExampleInput">manufacture date</label>
         <input  required="" id="datepickerm2" id="emdate" type="date" class="form-control datepicker" id="formGroupExampleInput" name="datem">
         
      </div>
      <div class="form-group">
         <label for="formGroupExampleInput">quantity</label>
         <input required="" id="eqty" type="number" class="form-control datepicker" id="formGroupExampleInput" name="quantity">
         
      </div>
      <div class="form-group">
         <label for="formGroupExampleInput">expiry date</label>
         <input required="" id="datepickerm1" id="eedate2" type="date" class="form-control datepicker1" id="formGroupExampleInput" name="datee">
         
      </div>
      <div class="form-group">
         <label for="formGroupExampleInput">rate</label>
         <input required="" type="text" id="eprice" class="form-control" id="formGroupExampleInput" name="rate">
        
      </div>
      <button type="submit"> submit</button>
</form>


</div>




<div class="sellmul ">


  <div class="addedprod">

   <div class="container row padded">
    <table class="table" id="mytable">
      <th>name</th>
      <th>batch</th>
      <th>manufacture date</th>
      <th>expiry date</th>
      <th>price</th>
      <th>quantity</th>
    </table>

    </div>
  </div>
  <div class="container row fm">
<div class="form-group col-md-2">
         <label for="formGroupExampleInput ">product name</label>
         <input type="text" id="ename2" required="" class="form-control col-md-12" id="formGroupExampleInput" name="productname">
         </div>
      
      <div class="form-group col-md-2">
         <label for="formGroupExampleInput ">batch number</label>
         <input required="" type="text" id="ebatch2" class="form-control col-md-12" id="formGroupExampleInput" name="batch number">
        
      </div>
      
       <div class="form-group col-md-2">
         <label for="formGroupExampleInput ">manufacture date</label>
         <input  required="" id="datepickerm22" id="emdate" type="date" class="form-control col-md-12 datepicker" id="formGroupExampleInput" name="datem">
         
      </div>
      <div class="form-group col-md-2">
         <label for="formGroupExampleInput ">quantity</label>
         <input required="" id="eqty2" type="number" class="form-control col-md-12 datepicker" id="formGroupExampleInput" name="quantity">
         
      </div>
      <div class="form-group col-md-2">
         <label for="formGroupExampleInput ">expiry date</label>
         <input required="" id="datepickerm12" id="eedate" type="date" class="form-control col-md-12 datepicker1" id="formGroupExampleInput" name="datee">
         
      </div>
      <div class="form-group col-md-2">
         <label for="formGroupExampleInput ">rate</label>
         <input required="" type="text" id="eprice2" class="form-control col-md-12" id="formGroupExampleInput" name="rate">
        
      </div>

       <div class="form-group col-md-2">
         
        <button onclick="addprod();">add</button>
        
      </div>

</div>
  
</div>



<script>


  



	$('document').ready(function(){


  var options2 = {

  url: function(phrase) {

    return "ajaxprod.php";
  },

  getValue: function(element) {
   
    return element.name;
  },
   list: {
        onSelectItemEvent: function() {
            var selectedItemValue = $(".ename2").getSelectedItemData().name;
              //console.log(selectedItemValue)
            
        },
        onHideListEvent: function() {
          var name =$('#ename2').val();
             $.ajax({
            type:"POST",
            url:"controller.php",
            data:{method:"getproductbyname",name:name},//only input
            success: function(response){
              var obj = jQuery.parseJSON(response);
              console.log(obj.batch);
               
             $("#ebatch2").val(obj[0].batch);
             $("#datepickerm22").val(obj[0].datem); 
              $("#datepickerm12").val(obj[0].datee); 
              $("#eprice2").val(obj[0].rate); 
              
            }
        });


      }
    },
   
  ajaxSettings: {
    dataType: "json",
    method: "POST",
    data: {
      dataType: "json"
    }
  },

  preparePostData: function(data) {
    data.phrase = $("#ename2").val();
    return data;
  },

  requestDelay: 400
};



$("#ename2").easyAutocomplete(options2);








    var options = {

  url: function(phrase) {

    return "ajaxprod.php";
  },

  getValue: function(element) {
   
    return element.name;
  },
   list: {
        onSelectItemEvent: function() {
            var selectedItemValue = $(".ename").getSelectedItemData().name;
              //console.log(selectedItemValue)
            
        },
        onHideListEvent: function() {
        	var name =$('#ename').val();
             $.ajax({
            type:"POST",
            url:"controller.php",
            data:{method:"getproductbyname",name:name},//only input
            success: function(response){
              var obj = jQuery.parseJSON(response);
              console.log(obj.batch);
               
             $("#ebatch").val(obj[0].batch);
             $("#datepickerm2").val(obj[0].datem); 
              $("#datepickerm1").val(obj[0].datee); 
              $("#eprice").val(obj[0].rate); 
              
            }
        });


    	}
    },
   
  ajaxSettings: {
    dataType: "json",
    method: "POST",
    data: {
      dataType: "json"
    }
  },

  preparePostData: function(data) {
    data.phrase = $("#ename").val();
    return data;
  },

  requestDelay: 400
};

$("#ename").easyAutocomplete(options);




	})


    $("#sells").submit(function() {


       var name = $('#ename').val();
            var batch=  $("#ebatch").val();
              var mfdate= $("#datepickerm2").val(); 
              var exdate= $("#datepickerm1").val(); 
              var price= $("#eprice").val(); 
              var qty=  $("#eqty").val(); 
     $.ajax({
            type:"POST",
            url:"controller.php",
            data:{
            method:"sellsingle",
            name:name,
            batch:batch,
            mfdate:mfdate,
            exdate:exdate,
            price:price,
            qty:qty

            },//only input
            success: function(response){
             $('.sellinter').hide();
             $("#div2").html("updated .. ..");

             $("#div2").show().delay( 5000 ).hide(0);
              
               
            
              
            }
        });
    return false;
  });



function showsingle()
{
  $('.sellinter').show();
   $('.sellmul').hide();
}

function showmul(){
  $('.sellmul').show();
  $('.sellinter').hide();
}




function addprod(){
  var name = $('#ename2').val();
            var batch=  $("#ebatch2").val();
              var mfdate= $("#datepickerm22").val(); 
              var exdate= $("#datepickerm12").val(); 
              var price= $("#eprice2").val(); 
              var qty=  $("#eqty2").val(); 

              var dix='<tr><td>'+name+'</td><td>'+batch+'</td><td>'+mfdate+'</td><td>'+exdate+'</td><td>'+price+'</td><td>'+qty+'</td></tr>';

              $('#mytable').append(dix);



}
</script>


<style>
.sellmul input {
  width: auto !important;
}
  </style>