<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<body>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li>New account</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>
					
			<div class="row">
				<div class="col-md-6">
                        <form class="form-signin" id="register-form">
    
       
        
        <div class="form-group" >
		
        <input  type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
		<img src="loader.gif" style="margin-left:520px; display:none; position:absolute;"  id="loader_username" />
		<p id="error_username" style="margin-left:550px;position:absolute;top:0px;"> </p>
		
        </div>
        
        <div class="form-group" >
        <input   type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
		<img src="loader.gif" style="margin-left:520px; display:none; position:absolute; top:60px"  id="loader" />
			<p id="error" style="margin-left:550px;position:absolute;top:60px "> </p>
        </div>
		
        
        <div class="form-group" ">
        <input  type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
		
        
        <div class="form-group" ">
        <input  type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />
        </div>
     	<hr />
        
        <div class="form-group">
		<p class="text-center">
            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-submit"><i class="fa fa-user-md">Register</i>
			</button> 
			</p>
        </div>  
      
      </form>  
</div>
<div class="col-md-6">
<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-10" id="passwordrules" style="top:100px;">
<h4>Password rules:</h4>

 1) It sholud be minimum of 8 characters length
 <br>
 2) It should contain atleast one digit
 <br>
 3) It should contain atleast one uppercase and lowercase letters
<br>
4) It should contain atleast one Special character : ~!@#$%^&*
</div>

</div>
 </div>
</div>
                    </div>
                </div>




            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
<?php include 'footer.php';?>

    </div>
    <!-- /#all -->
    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
   <!-- <script src="js/jquery-1.11.0.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>