<?php include 'header.php';?>
<?php include_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<body>

<div id="all">

        <div id="content">
    <br/><br/><br/>
	<div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h3> Add New Book Details</h3>
                        </div>
                    </div>
                </div>
				<div class="container">
				<div class="panel panel-default">
                  <div class="panel-body">
    
<div class="col-md-12">
<label style="font-weight:bold; color:red;" for="Bookname">* Fields are Required!! Add button will be enabled after filling these fields</label>
        <form action="addbooks_insert.php" method="post" id="commentform">
		
		<div class="col-md-3" Style="margin:5px;font-weight:bold;">
			<label style="font-weight:bold;" for="Bookname">Book Title:	*</label>
		</div>

		<div class="col-md-8" Style="margin:5px;">
		   <input class="form-control" Style="width:100%;" id="Bookname" name="Bookname" type="text" placeholder="Bookname" class="required" />
		</div>
		<div  class="col-md-3" Style="margin:5px;">	
			<label style="font-weight:bold;" for="Author">Author:	*</label>
		</div>
		<div class="col-md-8" Style="margin:5px;">
            <input class="form-control" Style="width:100%;" id="Author" name="Author" type="text" placeholder="Author"  class="required" />
		</div>
		<div  class="col-md-3" Style="margin:5px;">
			<label style="font-weight:bold;" for="Genre">Genre:	*</label>
		</div>
		<div class="col-md-8" Style="margin:5px;">
			<input class="form-control" Style="width:100%;" id="Genre" name="Genre" type="text" placeholder="Genre"  class="required" />
		</div>
		<div  class="col-md-3" Style="margin:5px;">
			<label style="font-weight:bold;" for="image">Image:	*</label>
		</div>
		<div class="col-md-8" Style="margin:5px;">
			<input class="form-control" Style="width:100%;" id="image" name="image" type="text" placeholder="image"  class="required" />
		</div>
		<div  class="col-md-3" Style="margin:5px;">	
			<label style="font-weight:bold;" for="Stock">Stock:	*</label>
		</div>
		<div class="col-md-8" Style="margin:5px;">
			<input class="form-control" Style="width:100%;" id="Stock" name="Stock" type="text" placeholder="Stock"  class="required" />
		</div>
		<div  class="col-md-3" Style="margin:5px;">	
			<label style="font-weight:bold;" for="price">Price:	*</label>
		</div>
		<div class="col-md-8" Style="margin:5px;">
            <input class="form-control" Style="width:100%;" id="price" name="price" type="text" placeholder="Price"  class="required" />
           
		</div >
		<div  class="col-md-3" Style="margin:5px;">	
			<label style="font-weight:bold;" for="rating">Rating:</label>
		</div>
		<div class="col-md-8" Style="margin:5px;">
            <input class="form-control" Style="width:100%;" id="rating" name="rating" type="text" placeholder="rating"  class="required" />
           
		</div >
		<div  class="col-md-3" Style="margin:5px;">
			<label style="font-weight:bold;" for="description">Description:</label>
		</div>
		<div class="col-md-8" Style="margin:5px;">
            <textarea class="form-control" Style="width:100%;" id="description" name="description" placeholder="Description" rows="8"></textarea>
			
		</div>
		<div  class="col-md-3" Style="margin:5px;"></div>
		<div class="col-md-8" Style="margin:5px;">
            <input  class="btn btn-primary navbar-btn " name="submit" type="submit"  id="submit" value="Add Book" />
		</div>
        </form>
</div>
</div>
</div>
</div>
</div>
</div></div>

<?php include 'footer.php';?>

    </div>
    <!-- /#all -->
    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
   
 <script type="text/javascript">
    $(document).ready(function(){
	$('input[type="submit"]').attr('disabled', true);
   $('#price,#Stock,#image,#Genre,#Author,#Bookname').blur(function(){   
	var price = 	$('#price').val();
		var Stock = 	$('#Stock').val();
			var image = 	$('#image').val();
				var Genre = 	$('#Genre').val();
					var Author = 	$('#Author').val();
						var Bookname = 	$('#Bookname').val();
						
if((price!="")&&(Stock!="")&&(image!="")&&(Genre!="")&&(Author!="")&&(Bookname!="") ){

 $('input[type="submit"]').attr('disabled', false);
}
                
 });       
           
      

      
    });
</script>

   </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>