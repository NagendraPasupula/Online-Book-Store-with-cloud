<?php

include_once("config.php");
?>
<?php include 'header.php';?>
<?php 
    $input = $_GET['data'];
    $rows = $conn->query("Select * from category where id='$input';");
    $row = $rows->fetch_assoc();
    $category = $row['category'];
?>
<?php 
    $query = "Select * from inventory where Genre='$category' and del=0;";
    $books_ex = $conn->query($query);
    $num_rows = mysqli_num_rows($books_ex);
?>
 <!-- *** NAVBAR END *** -->
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
                        <h2><?php echo $row['category'];?></h2>
                        <p><?php echo $row['description'];?></p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-sm-12 col-md-3 products-showing">
                                 <strong><?php echo $num_rows;?></strong> Books Found
                            </div>

                            <div class="col-sm-12 col-md-6  products-number-sort">
                                <div class="row">
                                    <div class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <form action="searchbyprice.php?id=<?php echo $input;?>&book=b" method="post" >
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
                        </div>
                    </div>
                </div>
                   
<div id="hot">
    <div class="container" >
        <?php 

            while($book_cat = $books_ex->fetch_assoc()){
                
        ?>    
                      <div class=" col-md-2 item" >
                            <div class="product-slider" id="flip" style="width:165px;">
                        <div class="product" style="width:165px;">
                            <div class=="flip-container" >
                                <div class="flipper" >
                                        <div class="front" >
                                            <a href="book_detail.php?ID=<?php echo $book_cat['BookID'];?>">
                                                <?php echo'
                                                <img src="https://storage.googleapis.com/justbooks/images/'.$book_cat['Image']. '" alt="" class="img-responsive">'; 
                                                ?>
                                            </a>

                                        </div>
                                        <div class="back">
                                            <a href="book_detail.php?ID=<?php echo $book_cat['BookID'];?>">
                                               <?php echo'
                                                <img src="https://storage.googleapis.com/justbooks/images/'.$book_cat['Image']. '" alt="" class="img-responsive">'; 
                                                ?>
                                            </a>
                                        </div>
                                </div>           
                            </div>
                                <a href="book_detail.php?ID=<?php echo$book_cat['BookID'];?>" class="invisible">
                                    <img src="" alt="" class="img-responsive">
                                </a>
                                <div class="text" style="height:75px; text-align: center;">
                                    <h4 style=" width:135px; overflow:hidden; white-space:nowrap; "><a href="book_detail.php?ID=<?php echo $book_cat['BookID'];?>" title="<?php echo $book_cat['title'];?>"><?php echo $book_cat['title']; ?></a></h4>
                                    <p class="price" style="font-size:18px;">$ <?php echo $book_cat['Price']; ?></p>
                                    
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
        <!-- /#content -->

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
