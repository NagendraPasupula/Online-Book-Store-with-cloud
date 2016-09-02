<?php include_once 'config.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
if (!empty($_POST['year'])) {
$selection = $_POST['year'];  
}else{
$selection = "null"; 
}

if($selection == 'lastyear'){
	$years = "Last year data";
	$rows_ex = $conn->query("select SUM(Stock) as book from inventory where date>=DATE_SUB(NOW(),INTERVAL 1 YEAR);");
	$rows_ebooks = $conn->query("select SUM(Stock) as ex_e from ebooks where date>=DATE_SUB(NOW(),INTERVAL 1 YEAR);");
	$rows_upcoming = $conn->query("select count(*) as ex_u from upcoming where date>=DATE_SUB(NOW(),INTERVAL 1 YEAR);");
// sales
	$rows_s = $conn->query("select count(*) as sale from user_history where date>=DATE_SUB(NOW(),INTERVAL 1 YEAR) and label='book';");
	$rows_se = $conn->query("select count(*) as sale_e from user_history where date>=DATE_SUB(NOW(),INTERVAL 1 YEAR) and label='ebook';");
	$rows_su = $conn->query("select count(*) as sale_u from upcoming where date>=DATE_SUB(NOW(),INTERVAL 1 YEAR) and lable='upcoming';");	
	
}elseif($selection == 'last2years'){
	$years = "Last 2 years data";
	$rows_ex = $conn->query("select SUM(Stock) as book from inventory where date>=DATE_SUB(NOW(),INTERVAL 2 YEAR);");
	$rows_ebooks = $conn->query("select SUM(Stock) as ex_e from ebooks where date>=DATE_SUB(NOW(),INTERVAL 2 YEAR);");
	$rows_upcoming = $conn->query("select count(*) as ex_u from upcoming where date>=DATE_SUB(NOW(),INTERVAL 2 YEAR);");
	
	$rows_s = $conn->query("select count(*) as sale from user_history where date>=DATE_SUB(NOW(),INTERVAL 2 YEAR) and label='book';");
	$rows_se = $conn->query("select count(*) as sale_e from user_history where date>=DATE_SUB(NOW(),INTERVAL 2 YEAR) and label='ebook';");
	$rows_su = $conn->query("select count(*) as sale_u from upcoming where date>=DATE_SUB(NOW(),INTERVAL 2 YEAR) and lable='upcoming';");	
}else{
	$years = "Last 3 years data";
	$rows_ex = $conn->query("select SUM(stock) as book from inventory where date>=DATE_SUB(NOW(),INTERVAL 3 YEAR);");
	$rows_ebooks = $conn->query("select SUM(Stock) as ex_e from ebooks where date>=DATE_SUB(NOW(),INTERVAL 3 YEAR);");
	$rows_upcoming = $conn->query("select count(*) as ex_u from upcoming where date>=DATE_SUB(NOW(),INTERVAL 3 YEAR);");
	
	$rows_s = $conn->query("select count(*) as sale from user_history where date>=DATE_SUB(NOW(),INTERVAL 3 YEAR) and label='book';");
	$rows_se = $conn->query("select count(*) as sale_e from user_history where date>=DATE_SUB(NOW(),INTERVAL 3 YEAR) and label='ebook';");
	$rows_su = $conn->query("select count(*) as sale_u from upcoming where date>=DATE_SUB(NOW(),INTERVAL 3 YEAR) and lable='upcoming';");	
}

if(mysqli_num_rows($rows_ex)>0){
	  while($rows_data = $rows_ex->fetch_assoc()){
		  $books = $rows_data['book'];
	  }
}else{
	$books=0;
}
if(!$books){
	$books=0;
}

if(mysqli_num_rows($rows_ebooks)>0){
	  while($rows_data = $rows_ebooks->fetch_assoc()){
		  $ebooks = $rows_data['ex_e'];
	  }
}else{
	$ebooks=0;
}
if(!$ebooks){
	$ebooks=0;
}
if(mysqli_num_rows($rows_upcoming)>0){
	  while($rows_data = $rows_upcoming->fetch_assoc()){
		  $upcoming = $rows_data['ex_u'];
	  }
}else{
	$upcoming=0;
}

if(!$upcoming){
	$upcoming=0;
}

//
if(mysqli_num_rows($rows_s)>0){
	  while($rows_data = $rows_s->fetch_assoc()){
		  $sale_books = $rows_data['sale'];
	  }
}else{
	$sale_books=0;
}
if(!$sale_books){
	$sale_books=0;
}

if(mysqli_num_rows($rows_se)>0){
	  while($rows_data = $rows_se->fetch_assoc()){
		  $sale_ebooks = $rows_data['sale_e'];
	  }
}else{
	$sale_ebooks=0;
}
if(!$sale_ebooks){
	$sale_ebooks=0;
}
if($rows_su){
	  while($rows_data = $rows_su->fetch_assoc()){
		  $sale_upcoming = $rows_data['sale_u'];
	  }
}else{
	$sale_upcoming=0;
}

if(!$sale_upcoming){
	$sale_upcoming=0;
}

$mydata = array("books"=>$books, "ebooks"=>$ebooks, "upcoming"=>$upcoming);
$saledata=array("sale_books"=>$sale_books, "sale_ebooks"=>$sale_ebooks, "sale_upcoming"=>$sale_upcoming);
?>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
		data.addColumn('string', 'Book Type');
        data.addColumn('number', 'count');
		data.addRows([
		['Books', <?php echo $mydata["books"];?>],
        ['eBooks', <?php echo $mydata["ebooks"];?>],
        ['UpcomingBooks', <?php echo $mydata["upcoming"];?>]
		]);
     
     
var options = {
          title: 'Total Books: <?php echo $years;?>' ,
		  width: 500,
		  height: 300,
		  legend:'none',
		  is3D: true
        };
//
      // Instantiate and draw the chart.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
  
  
 <!------------------------------------------------------------------------------->
  <script type="text/javascript">
    google.charts.setOnLoadCallback(saleChart);

    function saleChart() {
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
		data.addColumn('string', 'Book Type');
        data.addColumn('number', 'sale');
		data.addRows([
		['Books', <?php echo $saledata["sale_books"];?>],
        ['eBooks', <?php echo $saledata["sale_ebooks"];?>],
        ['UpcomingBooks', <?php echo $saledata["sale_upcoming"];?>]
		]);
     
     
var options = {
          title: 'Total Sales: <?php echo $years;?>' ,
		  width: 500,
		  height: 300,
		  legend:'none',
		  is3D: true
        };
//
      // Instantiate and draw the chart.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_sales'));
      chart.draw(data, options);
    }
  </script>
</head>
<body>


<div class="container">
<form method="post" action="statistics.php">
<select name="year" onchange="form.submit()">
     <option disabled="disabled" selected="selected">Years</option>
     <option value="lastyear"> Last Year data</option>
     <option value="last2years">Last 2 Years data</option>
     <option value="last3years">Last 3 Years data</option>
</select>
</form>
<div id="chart_div" class="col-md-6"></div>
<div id="chart_sales" class="col-md-6"></div>
</div>

<?php include 'footer.php';?>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>