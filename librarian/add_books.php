<?php

session_start();

if(!isset($_SESSION["librarian"]))
{
  ?>
  <script type="text/javascript">
    window.location = "login.php";
  </script>
  <?php
}
include "connection.php";
include "header.php";

?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>IIITDM LIBRARY</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
   
   <form name="form1" class="col-lg-6" action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered">
    <tr>
        <td><input class="form-control" type="text" name="booksname" placeholder="Book Name"></td>
    </tr>
     <tr>
        <td> Select Your Image:<input class="form-control" type="file" name="file" placeholder="Book Image"></td>
    </tr>
     <tr>
        <td><input class="form-control" type="text" name="author" placeholder="Author Name"></td>
    </tr>
     <tr>
        <td><input class="form-control" type="text" name="publication" placeholder="Publication Name"></td>
    </tr>
     <tr>
        <td><input class="form-control" type="text" name="purchasedate" placeholder="Purchase Date"></td>
    </tr>
     <tr>
        <td><input class="form-control" type="text" name="price" placeholder="Price"></td>
    </tr>
     <tr>
        <td><input class="form-control" type="text" name="quantity" placeholder="Quantity"></td>
    </tr>
     <tr>
        <td><input class="form-control" type="text" name="avilablequantity" placeholder="Avilable Quantity"></td>
    </tr>

    <td>
       <input type="submit" name="submit" value="Insert book" style="border-radius: 12px; background: rgb(23,5,7); color: white; padding: 4px 11px">
    </td>
</table>
   </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
  
if(isset($_POST['submit']))
 { 
   $tm = md5(time()); 
   $filename = $_FILES["file"]["name"];
   $destination = "./books_image/".$tm.$filename;
   $dst1 = "books_image/".$tm.$filename;

   move_uploaded_file($_FILES["file"]["tmp_name"], $destination);                    

   $sql = "INSERT INTO `add_books` (`id`, `books_name`, `books_img`, `books_author_name`, `books_publication_name`, `books_purchase_date`, `books_price`, `books_qty`, `avilable_qty`, `librarian_name`) VALUES ('', '$_POST[booksname]', '$dst1', '$_POST[author]', '$_POST[publication]', '$_POST[purchasedate]', '$_POST[price]', '$_POST[quantity]', '$_POST[avilablequantity]', '$_SESSION[name]')";

    mysqli_query($conn, $sql);
    
    ?>
     <script type="text/javascript">
         alert("Book inserted succesfully");
     </script>

    <?php

    mysqli_close($conn);

 }

?>

<?php

include "footer.php";

?>