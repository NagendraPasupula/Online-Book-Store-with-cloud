<?php include 'header.php';?>
<?php include_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<body>
<div id="all">

<div id='content'>
<?php
$input_s = $_GET["search_input"];
$sql = "SELECT * FROM inventory WHERE (Title like '%$input_s%' OR Author like '%$input_s%' OR Genre like '%$input_s%' OR Description like '%$input_s%') and del=0;";
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>
	 <div id="hot">

                <div class="box" style="height:50px;">
                    <div class="container" style="height:50px;">
                        <div class="col-md-12" style="height:50px;">
                            <p>Books</p>
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
										<?php
											if (isset($_COOKIE["admin"])){
										?>
											<a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php 
											}
											else{
										?>
											<a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php
											}
										?>
                                        </div>
                                        <div class="back">
                                            <?php
											if (isset($_COOKIE["admin"])){
										?>
											<a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php 
											}
											else{
										?>
											<a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php
											}
										?>
                                        </div>
                                    </div>
                                </div>
								 <?php
											if (isset($_COOKIE["admin"])){
								?>
								  <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
								<?php 
									}
									else{
								?>
									<a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
								<?php
									}
								?>
                                <div class="text" style="height:75px; text-align: center;">
								 <?php
											if (isset($_COOKIE["admin"])){
								?>
                                    <h4 style="width:135px; white-space: nowrap;overflow: hidden;"><a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
								<?php 
									}
									else{
								?>
									 <h4 style="width:135px; white-space: nowrap;overflow: hidden;"><a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
								<?php
									}
								?>
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





<!-------------------------------------------------------------------------------------------------------------->
<?php
$input_s = $_GET["search_input"];
$sql = "SELECT * FROM ebooks WHERE (Title like '%$input_s%' OR Author like '%$input_s%' OR Genre like '%$input_s%') and del=0;";
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>
	 <div id="hot">

                <div class="box" style="height:50px;">
                    <div class="container" style="height:50px;">
                        <div class="col-md-12" style="height:50px;">
                            <p>E-books</p>
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
										<?php
											if (isset($_COOKIE["admin"])){
										?>
											<a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=e'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php 
											}
											else{
										?>
											<a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>&book=e'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php
											}
										?>
                                        </div>
                                        <div class="back">
                                            <?php
											if (isset($_COOKIE["admin"])){
										?>
											<a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=e'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php 
											}
											else{
										?>
											<a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>&book=e'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php
											}
										?>
                                        </div>
                                    </div>
                                </div>
								 <?php
											if (isset($_COOKIE["admin"])){
								?>
								  <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=e' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
								<?php 
									}
									else{
								?>
									<a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>&book=e' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
								<?php
									}
								?>
                                <div class="text" style="height:75px; text-align: center;">
								 <?php
											if (isset($_COOKIE["admin"])){
								?>
                                    <h4 style="width:135px; white-space: nowrap;overflow: hidden;"><a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=e' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
								<?php 
									}
									else{
								?>
									 <h4 style="width:135px; white-space: nowrap;overflow: hidden;"><a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>&book=e' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
								<?php
									}
								?>
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

<!-------------------------------------------------------------------------------------------------------------->
<!-- __________________________________________________________________________________________-->

<?php
$input_s = $_GET["search_input"];
$sql = "SELECT * FROM upcoming WHERE (Title like '%$input_s%' OR Author like '%$input_s%' OR Genre like '%$input_s%') and del=0;";
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>
	 <div id="hot">

                <div class="box" style="height:50px;">
                    <div class="container" style="height:50px;">
                        <div class="col-md-12" style="height:50px;">
                            <p>Upcoming-books</p>
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
										<?php
											if (isset($_COOKIE["admin"])){
										?>
											<a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=u'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/upcoming/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php 
											}
											else{
										?>
											<a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>&book=u'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/upcoming/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php
											}
										?>
                                        </div>
                                        <div class="back">
                                            <?php
											if (isset($_COOKIE["admin"])){
										?>
											<a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=u'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/upcoming/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php 
											}
											else{
										?>
											<a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>&book=u'>
                                               <?php
								                 echo '
                                                 <img src="https://storage.googleapis.com/justbooks/upcoming/images/'.$row["Image"].'" alt="" height="250" width="165" class="img-responsive">';
								                ?>
                                            </a>
										<?php
											}
										?>
                                        </div>
                                    </div>
                                </div>
								 <?php
											if (isset($_COOKIE["admin"])){
								?>
								  <a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=u' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
								<?php 
									}
									else{
								?>
									<a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>&book=u' class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
								<?php
									}
								?>
                                <div class="text" style="height:75px; text-align: center;">
								 <?php
											if (isset($_COOKIE["admin"])){
								?>
                                    <h4 style="width:135px; white-space: nowrap;overflow: hidden;"><a href='book_detail_admin.php?ID=<?php echo $row["BookID"]; ?>&book=u' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
								<?php 
									}
									else{
								?>
									 <h4 style="width:135px; white-space: nowrap;overflow: hidden;"><a href='book_detail.php?ID=<?php echo $row["BookID"]; ?>&book=u' title="<?php echo $row["title"]; ?>"  ><?php echo $row["title"]; ?></a></h4>
                                    <p class="price">$<?php echo $row["Price"];?></p>
								<?php
									}
								?>
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





<!-- __________________________________________________________________________________________-->			
			

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
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>


