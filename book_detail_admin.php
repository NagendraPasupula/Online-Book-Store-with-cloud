<?php include 'header.php';?>
<?php include_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<body>
<div id="all">

        <div id="content">
<?php
$ID = $_GET["ID"];
$book = $_GET["book"];

switch($book){
	case 'b':
		$sql = "SELECT * FROM inventory WHERE BookID=$ID and del=0;";
		break;
	case 'e':
		$sql = "SELECT * FROM ebook WHERE BookID=$ID and del=0;";
		break;
	 case 'u':
		$sql = "SELECT * FROM upcoming WHERE BookID=$ID and del=0;";
		break;
	
}

$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { 
?>
<?php while($row = $result->fetch_assoc()) {
?>

	 <div id="hot">

                <div class="container" >
				<div class="panel panel-default">
                  <div class="panel-body">
					<div class="col-md-12">
					<div class="col-md-4">
					<?php
					
						
					switch($book){
						case 'b':
						echo '
                        <img src="https://storage.googleapis.com/justbooks/images/'.$row["Image"].'" alt="" height="300" width="200" class="img-responsive">';
						break;
					case 'e':
						echo '
                        <img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$row["Image"].'" alt="" height="300" width="200" class="img-responsive">';
						break;
					 case 'u':
						echo '
                        <img src="https://storage.googleapis.com/justbooks/upcoming/images/'.$row["Image"].'" alt="" height="300" width="200" class="img-responsive">';
						break;
					
				}
						?>
                    </div>
					<div class="col-md-8">
						<h3 style="color:lightseagreen" ><?php echo $row["title"]; ?></h3>
						<span>by <?php echo $row["Author"]; ?></span></br>
						
						<h4 class="price"><strong>Price:$<?php echo $row["Price"];?></strong></h4></br>
						<span ><strong>Category:</strong><?php echo $row["Genre"];?></span></br>
						<p ><?php echo $row["Description"];?></p>
						<div>
						<?php 
						$count=$row["Rating"];
						for($x = 0; $x <$count; $x++){
						echo '
                        <span><img src="https://storage.googleapis.com/justbooks/images/stars2.jpg" alt="" style="float:left;" class="img-responsive"></span>';
						}
						for($x = 0; $x <(5-$count); $x++){
						echo '
                        <span><img src="https://storage.googleapis.com/justbooks/images/stars1.jpg" alt="" style="float:left;" class="img-responsive"></span>';
						}
                        ?>
						</div></br>
						<a href="update_admin.php?ID=<?php echo $ID; ?>" class="btn btn-primary navbar-btn " ><span class="hidden-sm">Update</span></a>				
						
						<a href="deleteBook.php?ID=<?php echo $ID; ?>" class="btn btn-primary navbar-btn " ><span class="hidden-sm">Delete</span></a>	
						
						
						
                    </div>
                    </div>
					</div>
				</div>
    
   
						
	  
	  
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->
	
<?php
}
} else {
    echo "0 results";
}
?>

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


