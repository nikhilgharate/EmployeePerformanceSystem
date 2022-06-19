<!DOCTYPE HTML>
<html>
<head>
<title><?php require("include/title.php"); ?></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }>
</script>
<meta name="keywords" content="Auction Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndriodCompatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
</head>
<body>
<!-- //end-smoth-scrolling -->
<?php require("include/header.php"); ?>
<!--contact start here-->
<div class="contact">
	<div class="contact-main">
	   <div class="container">
			<div class="contact-top">
				<h3>Login User</h3>
				
			</div>
			<div class="contact-bottom">

<div class="col-md-3 contact-left">
					
				 </div>
				<div class="col-md-6 contact-left">
					<div id="msg"></div>
<form id="login">					
		            <p>E-mail</p> 
		             <input type="text" value="" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"/>
		            <p>Password</p>
		             <input type="password" name="password" style="width:100%;" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"/>
		           
<div class="contact-right">
		             
		             <input type="submit" value="Login"> 
</form>

		             
		      </div>
				</div>
				<div class="col-md-3 contact-right">
					
				 </div>
				 <div class="clearfix"> </div>
				</div>
		</div>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function() {

    $("#login").on('submit',(function(e) {
            
        e.preventDefault();
        $.ajax({
            url: "admin/php/user_login.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {

             
            
             $("#msg").html(data);	

             
              

	          
            }           
       });
    }));


    

  });
</script>
<!--contact end here-->


<?php require("include/footer.php"); ?>
</body>
</html>

