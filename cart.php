<?php include_once 'config.php';?>
<?php include 'header.php';?>
            <!--/.nav-collapse -->

<?php
if(isset($_COOKIE['user'])){
$user_name = $_COOKIE['user'];	
}else{
	$user_name="";
}
$query = "select i.title,i.BookID, i.Price, i.Image from inventory as i join (select Book_id from user_cart where user ='$user_name') as d on d.Book_id = i.BookID where i.del=0;";

$book_cart = $conn->query($query);

if(!$book_cart){
	$num_items = 0;
}else{
	$num_items = mysqli_num_rows($book_cart);
}

?>

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>
<div class="col-md-12">
                <div class="col-md-9" id="basket">
                    <div class="box">
                        <form method="post" action="checkout.php">
                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <span id="count"><?php echo $num_items;?> </span>Book(s) in your cart.</p>
							<p class="text-muted" style="color:red;">The quantity is maximum one due to limited stock.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
											<th> Row </th>
                                            <th colspan="2">Book</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                         
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
			<?php 
			$i=1;
			$books_ids=[];
			$qaun =[];
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
                                            <td >
                                                <input type="number" value="1" min="1" max="1" class="form-control" id="quan<?php echo $i;?>" onchange="myfunc()">
                                            </td>
                                            <td id="pric<?php echo $i;?>"><?php echo $books_cart['Price'];?></td>                                 
                                            <td id="tot<?php echo $i;?>"><?php echo $books_cart['Price'];?></td>
                                            <td><a href="delete_cart.php?id=<?php echo $books_cart['BookID'];?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
			<?php
			$i++;		
			}?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2" id="tot_notax">$0.00</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <button class="btn btn-default"><a href="index.php" style="color:lightseagreen;" ><i class="fa fa-chevron-left"></i> Continue shopping</a></button>
                                </div>
                                <div class="pull-right">
                                   
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->

</div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th id="subtot">$0.00</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th id="ship">$0.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th id="tax">$0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th id="cumtot">$0.00</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>
                <!-- /.col-md-3 -->

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

<script>
$(document).ready(function(){
	myfunc();
});
function myfunc(){
	var i=parseInt($("#count").text());
	var st=0;
	//alert(i);
	while(i>0){
		var q="quan"+i;
		//alert(q);
		var p="pric"+i;
		var t="tot"+i;
		var quan = parseFloat($("#"+q).val());
		var pric = parseFloat($("#"+p).text());
		var prod = (quan*pric);
		$("#"+t).text(prod);
		st=st+prod;
		$("#subtot").text(st);
		$("#tot_notax").text(st);
		var tax=+(st/10).toFixed(2);
		$("#tax").text(tax);
		var ship = 5;
		var ct= +(st+tax+ship).toFixed(2);
		$("#cumtot").text(ct);
		$("#ship").text("$5.00");
		i--;
	}
	
	
}
</script>

</body>