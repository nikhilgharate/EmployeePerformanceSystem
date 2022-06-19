<?php
require_once("include/session.php");

?>

<?php
include("php/config.php");
$db = new dbObj();
$conn =  $db->getConnstring();
 ?>
 

<!DOCTYPE html><html>

<head>
<meta charset="utf-8" />
<title><?php include 'include/title.php'; ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" /><meta content="Login Union" name="shahid husen" /><meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="assets/images/favicon.ico">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css">

<script src="assets/js/jquery-2.1.1.min.js"></script>


<style type="text/css">
.bs-example{
  font-family: sans-serif;
  position: relative;
  margin: 50px;
}

.typeahead {
  background-color: #FFFFFF;
}
.typeahead:focus {
  border: 2px solid #0097CF;
}
.tt-query {
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
  color: #FFFFFF;
}
.tt-dropdown-menu {
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  margin-top: 12px;
  padding: 8px 0;
  width: 422px;
}
.tt-suggestion {
  font-size: 16px;
  line-height: 20px;
  padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
  background-color: #0097CF;
  color: #FFFFFF;
}
.tt-suggestion p {
  margin: 0;
}
.container {
    padding-right: 0;
    padding-left: 0;
    margin-right: auto;
    margin-left: auto;
}
.panel .panel-body {
     padding-top: 0px; 
}
.page-header-title {
     background-color: #2a323c; 
     margin: 25px 5px 23px 5px; 
    padding: 5px 5px 10px 5px; 
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
}
.content-page > .content {
    margin-bottom: 5px; 
    /* margin-top: 10px; */
    padding: 20px 5px 15px 5px;
}
</style>
</head>

<body class="fixed-left">


  <div id="wrapper">

<?php include "include/header_top.php"; ?>
 
 
 
  <?php include "include/header_side.php"; ?>
      
     
 <div class="content-page">
 
  <div class="content">
    
    <div class="page-header-title"></div>
    <div class="page-content-wrapper ">
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
    
    <div class="panel panel-primary">
    
    <div class="panel-body">
    

    <div class="row">
      <div class="col-sm-12 col-xs-12">
        <div class="m-t-20">
      
      
      <form id="addreports" name="addreports" method="post" action="" class="form-horizontal" role="form" >
           <h4>Submit Report  </h4>
           
           <div class="row">
          
           
           <div class="col-sm-3 col-xs-3">
             <label> Month </label>
           <select class="form-control" name="month_id" required=""> 
            <option value=""> ..Select.. </option>
             
          <?php $result=mysqli_query($conn,"select * from month_list");
                while($rows=mysqli_fetch_array($result)){ 
                  extract($rows); ?>
          <option value="<?php echo $ID; ?>"> <?php echo $name; ?> </option>
          <?php } ?>
          </select>
           </div>



           <div class="col-sm-3 col-xs-3">
            <label> Select Employee </label>
           <select name="employe_id" class="form-control" required="">
         		<option value=""> ..Select.. </option>

           	<?php $result=mysqli_query($conn,"select * from user where type='employee'");
                while($rows=mysqli_fetch_array($result)){ 
                  extract($rows); ?>
             <option value="<?php echo $ID; ?>"> <?php echo $name; ?> </option>
           
           <?php } ?>

       </select>

           </div>



           <div class="col-sm-3 col-xs-3">
            <label> Target Complete </label>
           	<select name="target" class="form-control" required="">
         		<option value="">..Select ..</option>
         		<option value="5">Yes</option>
         		<option value="3">No</option>
           </select>
           
           </div>


           <div class="col-sm-3 col-xs-3">
            <label> Working Efficient </label>
           	<select name="working_efficient" class="form-control" required="">
         		<option value="">..Select..</option>
         		<option value="5">Yes</option>
         		<option value="3">No</option>
         		<option value="0">Bad</option>
           </select>
           
           </div>
			
			



           <div class="col-sm-3 col-xs-3">
            <label> Performance </label>
           	<select name="performance" class="form-control" required="">
         		<option value="">..Select..</option>
         		<option value="5">Excellent</option>
         		<option value="3">Good</option>
           	</select>
           </div>


           <div class="col-sm-3 col-xs-3">
            <label> No of days Presenty </label>
           	  <input type="text" name="presenty" class="form-control" required="">
           </div>



           <div class="col-sm-3 col-xs-3">
            <label> Customer Intraction </label>
           	 <select name="customer_interaction" class="form-control" required="">
         		<option value="">..Select..</option>
         		<option value="5">Excellent</option>
         		<option value="3">Good</option>
         		<option value="0">Poor</option>

             </select>
           </div>


            <div class="col-sm-3 col-xs-3">
            <label> overtime </label>
           	 <select name="overtime" class="form-control" required="">
         		<option value="">..Select..</option>
         		<option value="5">Yes</option>
         		<option value="0">No</option>
         	</select>
           </div>


            <div class="col-sm-3 col-xs-3">
            <label> Extra Sales </label>
           	 <select name="extra_sales" class="form-control" required="">
         		<option value="">..Select..</option>
         		<option value="5">Yes</option>
         		<option value="3">Something</option>
         		<option value="0">No</option>
         		

             </select>
           </div>

			
          
           <div class="col-sm-12 col-xs-12">
            <br>
            <div id="btn">
          <input name="btn_sub" class="btn btn-primary"  value="Submit" type="submit">
           </div>
         </div>
                
		
    
    </div>
    
  </div>
  


    </div>
  
  

   </div>

   <div id='msg'> </div>

 </div>

</div>

</div>

</div>

</div>
</div>  
    
<?php include "include/footer.php"; ?>


</div>
</div> 
 <script type="text/javascript">
  $('#agent').change(function(){
      
        $.post("php/fetch_box.php", {
            id: $('#agent').val(),
        }, function(response){
        $('#boxno').html(response);
        });
        return false;
    });
</script>

    <script src="assets/js/bootstrap.min.js"></script> 
    <script src="assets/js/modernizr.min.js"></script> 
    <script src="assets/js/detect.js"></script> 
    <script src="assets/js/fastclick.js"></script> 
    <script src="assets/js/jquery.slimscroll.js"></script> 
    <script src="assets/js/jquery.blockUI.js"></script> 
    <script src="assets/js/waves.js"></script> 
    <script src="assets/js/wow.min.js"></script> 
    <script src="assets/js/jquery.nicescroll.js"></script> 
    <script src="assets/js/jquery.scrollTo.min.js"></script> 
    <script src="assets/js/app.js"></script> 
    <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>
    
    <script type="text/javascript">$(document).ready(function(){$('form').parsley();});</script>
   

<script type="text/javascript">
$(document).ready(function (e) {  
  $("#addreports").on('submit',(function(e) {
        $('#msg').html("");
        var div_data ="<div > Please Wait...<img width='50' src='img/spinner.gif' /></div>";
       $('#btn').html(div_data);  
        e.preventDefault();
        $.ajax({
            url: "php/submit_reports.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
				
				$('#btn').html('<input name="btn_sub" class="btn btn-primary"  value="Submit" type="submit">');
				$("#msg").html(data);
            },
            error: function() 
            {
                 $("#msg").html("Internal Server Error 2005");
            }           
       });
    }));

});


</script> 







  



</body>

</html>