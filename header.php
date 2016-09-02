<?php include_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online Bookstore Project">
    <meta name="keywords" content="">

    <title>jusBooks</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/admin-login.js"></script>
		
		
    <script src="js/respond.min.js"></script>
    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/login-register.css" rel="stylesheet">

    <link rel="shortcut icon" href="https://storage.googleapis.com/justbooks/images/favicon.png">



</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
     <div id="top">
        <div class="container">
		<div class="col-md-6" data-animate="fadeInDown">
		<?php 
		
				if (isset($_COOKIE["user"])){
					$user = $_COOKIE["user"];
					$query = "Select * from user where name ='$user';";
					$rows_points=$conn->query($query);
					while($row_points = $rows_points->fetch_assoc()){
						$points = $row_points['points'];}
						echo "<a>You have ".$points." points.</a>";
                  }else if((!isset($_COOKIE["admin"]))){
					  echo "<a>Hello Guest</a	>";
				  }else{
					  
					  echo "<a href='Statistics.php' >statistics</a>";
				  }
		?>
		</div>
            <div class="col-md-offset-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li id="replacing"><a href="#" data-toggle="modal" data-target="#login-modal">  
					<?php
                                    if (isset($_COOKIE["user"])){
                                        echo "<a>Hello ".$_COOKIE['user']." !</a>";
                                    }
									else if (isset($_COOKIE["admin"])){
                                        echo "<a>Hello ".$_COOKIE['admin']." !</a>";
                                    }
									else{
										echo 'Login';
										
									}
                                ?>
										</a>
                    </li>
                    <li><a href="register_page.php">
										<?php
                                    if (isset($_COOKIE["user"])||isset($_COOKIE["admin"])){
                                        echo "<a href='logout.php'>Logout</a>";
                                    }
									else{
										echo 'Register';
										
									}
                                ?></a>
                    </li>
                    <li><a href="#"  data-toggle="modal" data-target="#alogin-modal" >
					<?php
                                    if (isset($_COOKIE["user"])||isset($_COOKIE["admin"])){
                                        echo "";
                                    }
									
									else{
										echo 'Admin Login';
										
									}
                                ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form class="signup"   id="login-form" >
						<div id="errordef">
								<!-- error will be showen here ! -->
						</div>
						   <div class="form-group">
                                <input type="text" class="form-control" name="user_emaildef" id="user_emaildef" placeholder="email">
								<span id="check-e"></span>
                            </div> 
                            <div class="form-group">
                                <input type="password" class="form-control" name="passworddef" id="passworddef" placeholder="password">
                            </div> 
					       <div class="form-group">
                            <p class="text-center">
                                <button class="btn btn-primary" id="b1"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
							</div>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register_page.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>
		
		<div class="modal fade" id="alogin-modal" tabindex="-1" role="dialog" aria-labelledby="Admin Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Admin login</h4>
                    </div>
                    <div class="modal-body">
                        <form class="signup"   id="login-form-admin" >
						<div id="erroradmin">
								<!-- error will be showen here ! -->
						</div>
						   <div class="form-group">
                                <input type="text" class="form-control" name="user_emailadmin" id="user_emailadmin" placeholder="email">
								<span id="check-e"></span>
                            </div> 
                            <div class="form-group">
                                <input type="password" class="form-control" name="passwordadmin" id="passwordadmin" placeholder="password">
                            </div> 
					       <div class="form-group">
                            <p class="text-center">
                                <button class="btn btn-primary" id="b1-admin"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
							</div>

                        </form>

                             

                    </div>
                </div>
            </div>
        </div>
		
    </div>
    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

   <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="shake">
                    <img src="https://storage.googleapis.com/justbooks/images/logo.png" alt="jusBooks logo" class="hidden-xs">
                    <img src="https://storage.googleapis.com/justbooks/images/logo.png" alt="jusBooks logo" class="visible-xs"><span class="sr-only">jusBooks - homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <!--------------------------------------->
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
					<!------------------------------------>
					
                    
                </div>
            </div>
            <!--/.navbar-header -->
      
			<div class="navbar-collapse collapse" id="navigation">
				<ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php">Home</a>
                    </li>
					<li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Categories<b class="caret"></b></a>
<?php
$sql = "SELECT id,category FROM category ;";

$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?> 
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Departments</h5>
											<ul>
 <?php while($row = $result->fetch_assoc()) {
        
		?>											
									<li><a href="category.php?data=<?php echo $row["id"]; ?>"><?php echo $row["category"]; ?></a>
                                    </li>
<?php }
    
	?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
					<li>
					   <a href="ebooks.php" data-delay="200">e-books</a>
					</li>
					<li>
					   <a href="upcoming.php" data-delay="200">Up Coming</a>
					</li>
                </ul>

            </div>
            
<?php
} else {
    echo "0 results";
}
?>
           <!--/.nav-collapse -->
		   
		   <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    
					<?php
					if (isset($_COOKIE["admin"])){
                                        echo "<a href='addbooks_form.php' class='btn btn-primary navbar-btn'<span class='hidden-xs' >Add New Book</span></a>";
                                    }
									elseif (isset($_COOKIE["user"])){
										$user = $_COOKIE["user"];
										$quer = "Select * from user_cart where user='$user';";
										$items = $conn->query($quer);
										//$item = $items->fetch_assoc();
										if(!$items){
											$items_tot =0;
										}else{
										$items_tot = mysqli_num_rows($items);
										}
										echo " <a href='cart.php?user=".$_COOKIE["user"]."' class='btn btn-primary navbar-btn'<i class='fa fa-shopping-cart'></i>  <span class='hidden-xs'>".$items_tot." items in cart</span></a>";
										echo " <a href='history.php?user=".$_COOKIE["user"]."' class='btn btn-primary navbar-btn'<i class='fa fa-shopping-cart'></i>  <span class='hidden-xs'>History</span></a>";
										
									}
									?>
									
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search" >

                <form class="navbar-form" role="search"  action="search.php" method="get">
                    <div class="input-group">
                        <input type="text" name="search_input" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->
</body>
    </html>