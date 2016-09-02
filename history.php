<?php include_once 'config.php';?>
<?php include 'header.php';?>
            <!--/.nav-collapse -->

<?php
if(isset($_COOKIE['user'])){
$user_name = $_COOKIE['user'];	
}else{
	$user_name="";
}
$query = "select i.title,i.BookID, i.Price, i.Image, d.date from inventory as i join (select Book_id, date from user_history where user ='$user_name' and label='book') as d on d.Book_id = i.BookID;";

$book_cart = $conn->query($query);

if(!$book_cart){
	$num_items = 0;
}else{
	$num_items = mysqli_num_rows($book_cart);
}

$query1 = "select i.title,i.BookID, i.Price, i.Image, d.date from ebooks as i join (select Book_id, date from user_history where user ='$user_name' and label='ebook' ) as d on d.Book_id = i.BookID;";

$book_cart_e = $conn->query($query1);

if(!$book_cart_e){
	$num_items = 0;
}else{
	$num_items = mysqli_num_rows($book_cart_e);
}
$query2 = "select i.title,i.BookID, i.Price, i.Image, d.date from upcoming as i join (select Book_id, date from user_history where user ='$user_name' and label='upcoming') as d on d.Book_id = i.BookID;";

$book_cart_u = $conn->query($query2);

if(!$book_cart_u){
	$num_items = 0;
}else{
	$num_items = mysqli_num_rows($book_cart_u);
}

?>

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Shopping History</li>
                    </ul>
                </div>
<div class="col-md-12">
                <div id="basket">
                    <div class="box">
                            <h3>Books</h3>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="background-color:lightblue;">
                                        <tr>
											<th> S.No </th>
											<th>Image</th>
                                            <th colspan="1">Book</th>
                                            <th>Unit price</th>
											<th> Date</th>
                                         
                                             </tr>
                                    </thead>
                                    <tbody>
			<?php 
			$i=1;
			while($books_cart = $book_cart->fetch_assoc()){?>						
                                        <tr>
										  <td><?php echo $i;?></td>
										<td>
                                                <a href="book_details.php">
                                                    <img src="https://storage.googleapis.com/justbooks/images/<?php echo $books_cart['Image'];?>" alt="<?php echo $books_cart['Image'];?>">
                                                </a>
                                            </td>
                                            <td><a href="#"><?php echo $books_cart['title'];?></a>
                                            </td>
                                           
                                            <td id="pric<?php echo $i;?>">$<?php echo $books_cart['Price'];?></td>                                 
                                            <td><?php echo $books_cart['date'];?></td>
                                        </tr>
			<?php
$i++;
			}?>
                                    </tbody>
                                    
                                </table>

                            </div>
                            <!-- /.table-responsive -->
							<h3>E Books</h3>
<div class="table-responsive" id="ebooks">
                                <table class="table">
                                    <thead style="background-color:lightblue;">
                                        <tr>
											<th> S.No </th>
											<th>Image</th>
                                            <th>Book</th>
                                            <th>Unit price</th>
											<th> Date</th>
                                             </tr>
                                    </thead>
                                    <tbody>
			<?php 
			$i=1;
			while($books_cart_e = $book_cart_e->fetch_assoc()){?>						
                                        <tr>
										  <td><?php echo $i;?></td>
										<td>
                                                <a href="ebook_details.php">
                                                    <img src="https://storage.googleapis.com/justbooks/ebooks/images/<?php echo $books_cart_e['Image'];?>" alt="<?php echo $books_cart_e['Image'];?>">
                                                </a>
                                            </td>
                                            <td><a href="#"><?php echo $books_cart_e['title'];?></a>
                                            </td>
                                           
                                            <td id="pric<?php echo $i;?>">$<?php echo $books_cart_e['Price'];?></td>                                 
                                            <td><?php echo $books_cart_e['date'];?></td>
                                        </tr>
			<?php
$i++;
			}?>
                                    </tbody>
                                    
                                </table>

</div>
<!-- table class -->
<h3>Up-coming Books</h3>
<div class="table-responsive" id="upcoming">
                                <table class="table">
                                    <thead style="background-color:lightblue;">
                                        <tr>
											<th> S.No </th>
											<th>Image</th>
                                            <th>Book</th>
                                            <th>Unit price</th>
											<th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
			<?php 
			$i=1;
			while($books_cart_u = $book_cart_u->fetch_assoc()){?>						
                                        <tr>
										  <td><?php echo $i;?></td>
										<td>
                                                <a href="ebook_details.php">
                                                    <img src="https://storage.googleapis.com/justbooks/upcoming/images/<?php echo $books_cart_u['Image'];?>" alt="<?php echo $books_cart_u['Image'];?>">
                                                </a>
                                            </td>
                                            <td><a href="#"><?php echo $books_cart_u['title'];?></a>
                                            </td>
                                           
                                            <td id="pric<?php echo $i;?>">$<?php echo $books_cart_u['Price'];?></td>                                 
                                            <td><?php echo $books_cart_u['date'];?></td>
                                        </tr>
			<?php
$i++;
			}?>
                                    </tbody>
                                    
                                </table>

</div>


</div>
                    <!-- /.box -->
</div>
	<!-- basket-->
</div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
		</div>

        <!-- *** FOOTER ***
 _________________________________________________________ -->



    </div>
    <!-- /#all -->
<?php include 'footer.php';?>

    

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