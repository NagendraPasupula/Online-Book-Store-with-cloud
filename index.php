<?php include 'header.php';?>
<?php include_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<body>
<div id="all">

        <div id="content">
<?php
if (!(isset($_COOKIE["admin"]))){
?>
            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="https://storage.googleapis.com/justbooks/images/slider/slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="https://storage.googleapis.com/justbooks/images/slider/slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="https://storage.googleapis.com/justbooks/images/slider/slider3.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

<?php 
}
?>

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
<?php
if (isset($_COOKIE["admin"])){
                                       

$sql = "SELECT * FROM inventory where del=0 ;";
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>
<div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>All Books</h2>
                        </div>
                    </div>
                </div>
				<div class="container">
                   
                        
				
    
   <?php while($row = $result->fetch_assoc()) {
        
		?>
						<div class="col-md-2">
						<!--<div class="it" >-->
						 <div class="product-slider" id="flip">
                            <div class="product" Style="width:165px;">
							    <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=b'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=b'>
                                               <?php
												echo '
												<img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
												?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
								  <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=b' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text" style="height:75px; text-align: center;">
								
                                    <h4 style="width:135px; white-space: nowrap;overflow: hidden;"><a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
                                </div>
                                <!-- /.text -->
                            
                            <!--</div> /.product -->
                        </div>
						</div>
		</div>
		
<?php }
?>
	  
	
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->
	
<?php

}         
?>       
<!------------------------------------------------------------------------------------------------------------>

<?php
$sql = "SELECT * FROM ebooks  ;";
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>
<div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>All E-Books</h2>
                        </div>
                    </div>
                </div>
				<div class="container">
                   
                        
				
    
   <?php while($row = $result->fetch_assoc()) {
        
		?>
						<div class="col-md-2">
						<!--<div class="it" >-->
						 <div class="product-slider" id="flip">
                            <div class="product" Style="width:165px;">
							    <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=e'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=e'>
                                               <?php
												echo '
												<img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
												?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
								  <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=b' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text" style="height:75px; text-align: center;">
								
                                    <h4 style="width:135px; white-space: nowrap;overflow: hidden;"><a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=b' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
                                </div>
                                <!-- /.text -->
                            
                            <!--</div> /.product -->
                        </div>
						</div>
		</div>
		
<?php }
    
	?>
	  
	
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->
	
<?php
} else {
    echo "0 results";
}
?>

<!-------------------------------------------------------------------------------------------------->

<?php
$sql = "SELECT * FROM upcoming;";
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>
<div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>All Upcoming Books</h2>
                        </div>
                    </div>
                </div>
				<div class="container">
                   
                        
				
    
   <?php while($row = $result->fetch_assoc()) {
        
		?>
						<div class="col-md-2">
						<!--<div class="it" >-->
						 <div class="product-slider" id="flip">
                            <div class="product" Style="width:165px;">
							    <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=u'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/upcoming/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=u'>
                                               <?php
												echo '
												<img src="https://storage.googleapis.com/justbooks/upcoming/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
												?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
								  <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=u' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text" style="height:75px; text-align: center;">
								
                                    <h4 style="width:135px; white-space: nowrap;overflow: hidden;"><a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=u' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
                                </div>
                                <!-- /.text -->
                            
                            <!--</div> /.product -->
                        </div>
						</div>
		</div>
		
<?php }
    
	?>
	  
	
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->
	
<?php
} else {
    echo "0 results";
}}
?>


<?php
if (!(isset($_COOKIE["admin"]))){
$sql = "SELECT * FROM inventory where del=0 ORDER BY Rating DESC LIMIT 15;";
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>

<div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Top Rated</h2>
                        </div>
                    </div>
                </div>
				<div class="container">
                    <div class="product-slider" id="flip">
                        
				
    
   <?php while($row = $result->fetch_assoc()) {
        
		?>
						<div class="item">
                            <div class="product">
							    <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="175" class="img-responsive">';
								                ?>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
												echo '
												<img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="175" class="img-responsive">';
												?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
								  <a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text" style="height:75px; text-align: center;">
								
                                    <h4 style=" white-space: nowrap;overflow: hidden;"><a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
		
<?php }
    
	?>
	  
	  </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->
	
<?php
} else {
    echo "0 results";
}
?>

                
                
            <!-- *** top rated *** -->
			<!-- *** best sellers*** -->
<?php
$sql = "SELECT * FROM inventory where del=0 ORDER BY Stock  LIMIT 15;";

$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>
 
    
	 <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Best Sellers</h2>
                        </div>
                    </div>
                </div>
				<div class="container">
                    <div class="product-slider" id="flip">
                        
				
    
   <?php while($row = $result->fetch_assoc()) {
        
		?>
						<div class="item">
                            <div class="product">
							    <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="175" class="img-responsive">';
								                ?>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
												echo '
												<img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="175" class="img-responsive">';
												?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
								  <a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text" style="height:75px; text-align: center;">
								
                                    <h4 style=" white-space: nowrap;overflow: hidden;"><a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
		
<?php }
     
	?>
	  
	  </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->
	
<?php
} else {
    echo "0 results";
}
?>

                

            <!-- *** under 10 ***-->
<?php



$sql = "SELECT * FROM inventory WHERE Price<10.00 and del=0;";

$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>
 
    
	 <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Under $10</h2>
                        </div>
                    </div>
                </div>
				<div class="container">
                    <div class="product-slider" id="flip">
                        
				
    
   <?php while($row = $result->fetch_assoc()) {
       
		?>
						<div class="item">
                            <div class="product">
							    <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="175" class="img-responsive">';
								                ?>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
												echo '
												<img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="175" class="img-responsive">';
												?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
								  <a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text" style="height:75px; text-align: center;">
								
                                    <h4 style=" white-space: nowrap;overflow: hidden;"><a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
		
<?php }
     
	?>
	  
	  </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->
	
<?php
} else {
    echo "0 results";
}
}
?>
			
            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Best prices</a></h3>
                                <p>Best Prices on all the books guaranteed</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 2 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->
        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
<?php include 'footer.php';?>

    </div>
    <!-- /#all -->
    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
   
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>