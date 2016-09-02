<?php include 'header.php';?>
<?php
include_once 'config.php';
if (!empty($_POST['price'])) {
$selection = $_POST['price'];  
}else{
	$selection = "null"; 
}
$id = $_GET['id'];
$book = $_GET['book'];

switch($book) {
	case 'b' :
		$row_cat_dat = $conn->query("Select * from category where  id='$id';");
		$row_cat=$row_cat_dat->fetch_assoc();
		$category = $row_cat['category'];
		$desc = $row_cat['description'];
		if($selection == 'lessthan10'){
		$rows_ex = $conn->query("Select * from inventory where Genre ='$category' and Price < 10 and del=0;");
		}elseif($selection == 'lessthan20'){
		$rows_ex = $conn->query("Select * from inventory where  Genre ='$category' and Price < 20 and del=0;");
		}elseif($selection=='between'){
		$rows_ex = $conn->query("Select * from inventory where Genre ='$category' and Price > 20 and price < 50 and del=0;");
		}elseif($selection=='greaterthan50'){
		$rows_ex = $conn->query("Select * from inventory where Genre ='$category' and Price > 50 and del=0;");
		}else{
		$rows_ex = $conn->query("Select * from inventory where Genre ='$category' and del=0;");
		}
		break;
	case 'e':
	//	$row_cat_dat = $conn->query("Select * from category where  id='$id';");
	//	$row_cat=$row_cat_dat->fetch_assoc();
		$category = "e-books";
		$desc = "";
		if($selection == 'lessthan10'){
		$rows_ex = $conn->query("Select * from ebooks where Price < 10 and del=0;");
		}elseif($selection == 'lessthan20'){
		$rows_ex = $conn->query("Select * from ebooks where Price < 20 and del=0;");
		}elseif($selection=='between'){
		$rows_ex = $conn->query("Select * from ebooks where Price > 20 and price < 50 and del=0;");
		}elseif($selection=='greaterthan50'){
		$rows_ex = $conn->query("Select * from ebooks where Price > 50 and del=0;");
		}else{
		$rows_ex = $conn->query("Select * from ebooks where del=0;");
		}
		break;
	case 'u':
	//	$row_cat_dat = $conn->query("Select * from category where  id='$id';");
	//	$row_cat=$row_cat_dat->fetch_assoc();
		$category = "Upcoming Books";
		$desc = "";
		if($selection == 'lessthan10'){
		$rows_ex = $conn->query("Select * from upcoming where Price < 10 and del=0;");
		}elseif($selection == 'lessthan20'){
		$rows_ex = $conn->query("Select * from upcoming where Price < 20 and del=0;");
		}elseif($selection=='between'){
		$rows_ex = $conn->query("Select * from upcoming where Price > 20 and price < 50 and del=0;");
		}elseif($selection=='greaterthan50'){
		$rows_ex = $conn->query("Select * from upcoming where Price > 50 and del=0;");
		}else{
		$rows_ex = $conn->query("Select * from upcoming where del=0;");
		}
		break;
}
$num_rows = mysqli_num_rows($rows_ex);

?>
<div id="all">
        <div id="content">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li><?php echo $category;?>
                        </li>
                    </ul>
                </div>

                <div classs="col-md-9">
                    <div class="box">
                        <h2><?php echo $category;?></h2>
                        <p><?php echo $desc;?></p>
                    </div>
                </div>
				<div classs="col-md-12">
					<div class="box info-bar">
						<div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-sm-12 col-md-3 products-showing">
                                 <strong><?php echo $num_rows;?></strong> Books Found
                            </div>
                          <div class="col-md-6 col-sm-6">	
                        	<form action="searchbyprice.php?id=<?php echo $id;?>&book=<?php echo $book;?>" method="post" >
                        		<Strong style="color:Lightseagreen">Filter Books</strong>
                        	                        <select name="price" onchange="form.submit()">
                                                    <option disabled="disabled" selected="selected">Price</option>
                                                    <option value="lessthan10"> Less than $10</option>
                                                    <option value="lessthan20">Less than $20</option>
                                                    <option value="between">Between $20 and $50</option>
                                                    <option value="greaterthan50">Greater than $50</option>
                                                </select>
                            </form>
                           </div>
                        </div>
                	</div>
                </div>
                

<div id="hot">
    <div class="container" >
        <?php 

            while($rows_data = $rows_ex->fetch_assoc()){
				$bookid= $rows_data['BookID'];
        ?>        
                    <div class=" col-md-2 item" >
                    	    <div class="product-slider" id="flip" style="width:165px;">
                        <div class="product" style="width:165px;">
                            <div class=="flip-container" >
                                <div class="flipper" >
                                        <div class="front" >
                                            <a href="book_detail.php?ID=<?php echo $bookid;?>">
											
                                                <?php 
												switch($book){
													case 'b':
														echo'
                                                <img src="https://storage.googleapis.com/justbooks/images/'.$rows_data['Image']. '" alt="" class="img-responsive">';
														break;
													case 'e':
														echo'
                                                <img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$rows_data['Image']. '" alt="" class="img-responsive">';
														break;
													case 'u':
													echo'
                                                <img src="https://storage.googleapis.com/justbooks/upcoming/images/'.$rows_data['Image']. '" alt="" class="img-responsive">';
														break;
												}
												 
                                                ?>
                                            </a>

                                        </div>
                                        <div class="back">
                                            <a href="book_detail.php?ID=<?php echo $bookid;?>">
                                               <?php switch($book){
													case 'b':
														echo'
                                                <img src="https://storage.googleapis.com/justbooks/images/'.$rows_data['Image']. '" alt="" class="img-responsive">';
														break;
													case 'e':
														echo'
                                                <img src="https://storage.googleapis.com/justbooks/ebooks/images/'.$rows_data['Image']. '" alt="" class="img-responsive">';
														break;
													case 'u':
													echo'
                                                <img src="https://storage.googleapis.com/justbooks/upcoming/images/'.$rows_data['Image']. '" alt="" class="img-responsive">';
														break;
												}
                                                ?>
                                            </a>
                                        </div>
                                </div>           
                            </div>
							<?php 
								switch($book){
									case 'b':
										echo '<a href="book_detail.php?ID=$bookid" class="invisible">
                                    <img src="" alt="" class="img-responsive"></a>';
										break;
									case 'e':
										echo '<a href="ebook_detail.php?ID=$bookid" class="invisible">
                                    <img src="" alt="" class="img-responsive"></a>';
										break;
									case 'u':
										echo '<a href="upcoming_detail.php?ID=$bookid" class="invisible">
                                    <img src="" alt="" class="img-responsive"></a>';
										break;
								}
							
							?>
							
  
                                <div class="text" style="height:75px; text-align: center;">
								
                                    <h5 style="width:135px; white-space: nowrap;overflow: hidden;">
									<?php  switch($book){
									case 'b':
										echo '<a href="book_detail.php?ID='.$bookid.'">'.$rows_data['title'].'</a></h5>
                                    <p class="price" style="font-size:18px;">$'. $rows_data['Price'].'</p>';
										break;
									case 'e':
										echo '<a href="ebook_detail.php?ID='.$bookid.'">'.$rows_data['title'].'</a></h5>
                                    <p class="price" style="font-size:18px;">$'. $rows_data['Price'].'</p>';
										break;
									case 'u':
										echo '<a href="upcoming_detail.php?ID='.$bookid.'">'.$rows_data['title'].'</a></h5>
                                    <p class="price" style="font-size:18px;">$'. $rows_data['Price'].'</p>';
										break;
								}?>
                                   
                                </div>
                                <!-- /.text
                                 -->
                            </div>
                            <!-- /.product -->
                        </div>
                    </div>

        <?php   } ?>
    </div>
    </div>
</div>
                    
        </div>
        <!-- /#content -->
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
