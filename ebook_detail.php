<?php include 'header.php';?>
<?php include_once 'config.php';?>
<?php
$ID = $_GET["ID"];
$quer = "select * from votes where BookID=$ID;";
$dat = $conn->query($quer);
$mydata[] = "['option', 'value']";

if(mysqli_num_rows($dat)>0){
	while($r = $dat->fetch_assoc()){
	$mydata = array("3 to 6 hrs"=>$r['3_6'], "1 to 3 hrs"=>$r['1_3'], "0 to 1 hrs"=>$r['0_1'], "6 to 9 hrs"=>$r['6_9']);
}
}else{
	$mydata = array("3 to 6 hrs"=>0, "1 to 3 hrs"=>100, "0 to 1 hrs"=>0, "6 to 9 hrs"=>0);
}

$total = $mydata["1 to 3 hrs"]+$mydata["0 to 1 hrs"]+$mydata["3 to 6 hrs"]+$mydata["6 to 9 hrs"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Options');
      data.addColumn('number', 'Percentage');
      data.addRows([
	    ['0 to 1 hrs', <?php echo ($mydata["0 to 1 hrs"]/$total);?>],
        ['1 to 3 hrs', <?php echo ($mydata["1 to 3 hrs"]/$total);?>],
        ['3 to 6 hrs', <?php echo ($mydata["3 to 6 hrs"]/$total);?>],
		['6 to 9 hrs', <?php echo ($mydata["6 to 9 hrs"]/$total);?>]
      ]);
var options = {
          title: 'User polls: Time to read e-book:',
		  width: 350,
		  height: 270,
		  is3D:true,
		  legend:'none'
        };
//
      // Instantiate and draw the chart.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
</head>
<body>

<script src="https://www.google.com/jsapi"></script>
<div id="all">

        <div id="content">
<?php

$sql = "SELECT * FROM ebooks WHERE BookID=$ID and del=0;";

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
					<div class="col-md-3">
					<?php
						echo '
                        <img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$row["Image"].'" alt="" height="300" width="200" class="img-responsive">';
						?>
                    </div>
					<div class="col-md-5">
						<h3 style="color:lightseagreen" ><?php echo $row["title"]; ?></h3>
						<span>by <?php echo $row["Author"]; ?></span></br>
						
						<h4 class="price"><strong>Price:$<?php echo $row["Price"];?></strong></h4></br>
						<span ><strong>Category:</strong><?php echo $row["Genre"];?></span></br>
						
						<span ><strong>Avearge Time to read book:</strong><?php echo ($row["pages"]*4);?> min</span></br>
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
						<?php
                                    if (!(isset($_COOKIE["user"]))){
						?>
						<a  class="btn btn-primary navbar-btn " onclick="myFunction()" ><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Check out & Download</span></a>	
						<?php
									}
									else{
						?>
						<a href="ebook_basket.php?ID=<?php echo $ID; ?>" class="btn btn-primary navbar-btn " ><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Check out & Download</span></a>
											
						<?php
									}
									?>
									
									
						
						
						<a  class="btn btn-primary navbar-btn " onclick="window.open('https://storage.googleapis.com/justbooks/ebooks/<?php echo $ID; ?>.pdf', '_blank', 'fullscreen=yes'); return false;"><i class="fa fa-book"></i><span class="hidden-sm">Read sample</span></a>
                    </div>
						<div class="col-md-4" id="chart_div"> </div>
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
 <script>
function myFunction() {
    alert("Please Login to purchase!!");
}
</script>
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


