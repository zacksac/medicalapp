	<link rel="stylesheet" href="css/bootsrap.css">
	<script src="js/jquery.js"></script>
<?php
include 'auth.php';




?>

<div class="container">
	<div class="row" style="padding-top:50px;">
<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" >Add new product</button>
<br>
<hr>
</div>





<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">

        <form id="editp" method="post" >
      <div class="form-group">
         <label for="formGroupExampleInput">product name</label>
         <input type="text" id="ename" class="form-control" id="formGroupExampleInput" name="productname">
         </div>
      
      <div class="form-group">
         <label for="formGroupExampleInput">batch number</label>
         <input type="text" id="ebatch" class="form-control" id="formGroupExampleInput" name="batch number">
        
      </div>
      
       <div class="form-group">
         <label for="formGroupExampleInput">manufacture date</label>
         <input id="datepickerm2" id="emdate" type="date" class="form-control datepicker" id="formGroupExampleInput" name="datem">
         
      </div>
      <div class="form-group">
         <label for="formGroupExampleInput">quantity</label>
         <input id="datepickerm2" id="eqty" type="date" class="form-control datepicker" id="formGroupExampleInput" name="quantity">
         
      </div>
      <div class="form-group">
         <label for="formGroupExampleInput">expiry date</label>
         <input id="datepickerm1" id="eedate" type="date" class="form-control datepicker1" id="formGroupExampleInput" name="datee">
         
      </div>
      <div class="form-group">
         <label for="formGroupExampleInput">rate</label>
         <input type="text" id="eprice" class="form-control" id="formGroupExampleInput" name="rate">
        
      </div>
      <div class="form-group">
       <input class="btn btn-primary epr" onclick="editproduct();" type="button" value="edit product">
      </div>
      </form>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default sad" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">

      	<form id="addp" method="post" >
      <div class="form-group">
         <label for="formGroupExampleInput">product name</label>
         <input type="text" class="form-control" id="formGroupExampleInput" name="productname">
         </div>
      
      <div class="form-group">
         <label for="formGroupExampleInput">batch number</label>
         <input type="text" class="form-control" id="formGroupExampleInput" name="batch number">
        
      </div>
      <div class="form-group">
         <label for="formGroupExampleInput">quantity</label>
         <input type="number" id="eqty" class="form-control" id="formGroupExampleInput" name="quantity">
        
      </div>
       <div class="form-group">
         <label for="formGroupExampleInput">manufacture date</label>
         <input id="datepicker" type="date" class="form-control datepicker" id="formGroupExampleInput" name="datem">
         
      </div>
      <div class="form-group">
         <label for="formGroupExampleInput">expiry date</label>
         <input id="datepicker1" type="date" class="form-control datepicker1" id="formGroupExampleInput" name="datee">
         
      </div>
      <div class="form-group">
         <label for="formGroupExampleInput">rate</label>
         <input type="number" class="form-control" id="formGroupExampleInput" name="rate">
        
      </div>
      <div class="form-group">
       <input class="btn btn-primary" onclick="addproduct();" type="button" value="add product">
      </div>
      </form>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default sad" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>


<div class="row" style="padding-top:50px;padding-bottom:50px;">

<h1>Filters</h1>
<button type="button" onclick="sortexpiry();" class="btn btn-primary" >sort expiry</button>
<button type="button" onclick="sortexpiryshort();" class="btn btn-primary" >sort expiry short</button>

</div>
<div class="row">
  <h1> Available products</h1>
  <button onclick="getproducts();">get</button>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">batch</th>
      <th scope="col">quantity</th>
      <th scope="col">manufacture date</th>
      <th scope="col">expiry date</th>
       <th scope="col">rate</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
  </div>
</div>



<script>

	function addproduct(){
		 $.ajax({
            type:"POST",
            url:"controller.php",
            data:{method:"addproduct",pdata:$("#addp").serializeArray()},//only input
            success: function(response){

               $('.sad').click();
 getproducts();
            }
        });

	}
  $('document').ready(function(){
   $('#datepicker').datepicker({dateFormat: 'yy-mm-dd'});
   $('#datepicker1').datepicker({dateFormat: 'yy-mm-dd'});
   $('#datepickerm1').datepicker({dateFormat: 'yy-mm-dd'});
   $('#datepickerm2').datepicker({dateFormat: 'yy-mm-dd'});
   
  })


  function getproducts(){
     $.ajax({
            type:"POST",
            url:"controller.php",
            data:{method:"getproducts"},//only input
            success: function(response){
               var obj = jQuery.parseJSON(response);
               $(".table").find('tbody').html("");
                  $.each(obj, function(key,value) {
                    key=key+1;
                   var name=value.name;
                   var rate=value.rate;
                   var datem=value.datem;
                   var datee=value.datee;
                   var batch=value.batch;
                   var quantity=value.quantity;
                   var id=value.id;
                   var html='<tr id="'+id+'"><td>'+key+'</td><td>'+name+'</td><td>'+batch+'</td><td>'+value.quantity+'</td><td>'+datem+'</td><td>'+datee+'</td><td>'+rate+'</td><td><button onclick="editp('+id+')">edit</button></td><td><button onclick="deletep('+id+')"> delete</button></td></tr>';

                   $(".table").find('tbody').append(html);
                  }); 

            }
        });
  }

  function deletep(id)
  {
     $.ajax({
            type:"POST",
            url:"controller.php",
            data:{method:"delp",id:id},//only input
            success: function(response){

              
 getproducts();
            }
        });

  }

   function editp(id)
  {

    console.log(id);
    $(".epr").attr('dataid',id);
     $("#"+id).find('td').each(function(index){

      if(index==1)
      {
        var name=$(this).html();
        $('#ename').val(name);
        
      }
        else if(index==2)
        {
          var batch=$(this).html();
          $('#ebatch').val(batch);
        }
         else if (index==3)
        {
        var qty=$(this).html();
        $('#eqty').val(qty);
        }
        else if (index==4)
        {
        var mdate=$(this).html();
        $('#datepickerm2').val(mdate);
        }
        else if(index==5)
        {
          var edate=$(this).html();
          console.log(edate);
          $('#datepickerm1').val(edate);
        }
        else if (index==6)
        {
          var price=$(this).html();
       
          $('#eprice').val(price);
        }
        

      })




    $('#myModal2').modal('show');
     $.ajax({
            type:"POST",
            url:"controller.php",
            data:{method:"editp",id:id},//only input
            success: function(response){

              
 getproducts();
            }
        });

  }


  function editproduct(){
    var id=$(".epr").attr('dataid');
     $.ajax({
            type:"POST",
            url:"controller.php",
            data:{id:id,method:"editproduct",pdata:$("#editp").serializeArray()},//only input
            success: function(response){

               $('.sad').click();
 getproducts();
            }
        });

  }

  function sortexpiry(){
     $.ajax({
            type:"POST",
            url:"controller.php",
            data:{method:"sortexpiry"},//only input
            success: function(response){
               var obj = jQuery.parseJSON(response);
               $(".table").find('tbody').html("");
                  $.each(obj, function(key,value) {
                    key=key+1;
                   var name=value.name;
                   var rate=value.rate;
                   var datem=value.datem;
                   var datee=value.datee;
                   var batch=value.batch;
                   var quantity=value.quantity;
                   var id=value.id;
                   var html='<tr id="'+id+'"><td>'+key+'</td><td>'+name+'</td><td>'+batch+'</td><td>'+value.quantity+'</td><td>'+datem+'</td><td>'+datee+'</td><td>'+rate+'</td><td><button onclick="editp('+id+')">edit</button></td><td><button onclick="deletep('+id+')"> delete</button></td></tr>';

                   $(".table").find('tbody').append(html);
                  }); 

            }
        });

  }


  function sortexpiryshort(){
     $.ajax({
            type:"POST",
            url:"controller.php",
            data:{method:"sortexpiryshort"},//only input
            success: function(response){
               var obj = jQuery.parseJSON(response);
               $(".table").find('tbody').html("");
                  $.each(obj, function(key,value) {
                    key=key+1;
                   var name=value.name;
                   var rate=value.rate;
                   var datem=value.datem;
                   var datee=value.datee;
                   var batch=value.batch;
                   var quantity=value.quantity;
                   var id=value.id;
                   var html='<tr id="'+id+'"><td>'+key+'</td><td>'+name+'</td><td>'+batch+'</td><td>'+value.quantity+'</td><td>'+datem+'</td><td>'+datee+'</td><td>'+rate+'</td><td><button onclick="editp('+id+')">edit</button></td><td><button onclick="deletep('+id+')"> delete</button></td></tr>';

                   $(".table").find('tbody').append(html);
                  }); 

            }
        });

  }
  </script>