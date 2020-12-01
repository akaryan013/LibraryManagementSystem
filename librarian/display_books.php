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
                                <h2>Display Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
        <form name="form1" action="" method="post">
            <table class="table">
                <tr>
             <td> <input type="text" name="t1" placeholder="Enter Book Name" class="form-control" required></td>
             <td> <input type="submit" name="search" value="Search books" class="form-control btn btn-default"></td>
                </tr>
              </table>
        </form>                          
     <?php

     if(isset($_POST['search']))
     {  
        
        $sql = "SELECT * FROM `add_books` WHERE `books_name` LIKE '%$_POST[t1]%'";
      $result = mysqli_query($conn, $sql);

      echo "<table class='table table-bordered'>";
      echo "<tr>";
      echo "<th>"; echo "Books name"; echo "</th>";
      echo "<th>"; echo "Books Image"; echo "</th>";
      echo "<th>"; echo "Author"; echo "</th>";
      echo "<th>"; echo "Publication"; echo "</th>";
      echo "<th>"; echo "Purchase date"; echo "</th>";
      echo "<th>"; echo "Price"; echo "</th>";
      echo "<th>"; echo "books quantity"; echo "</th>";
      echo "<th>"; echo "Avilable quantity"; echo "</th>";
      echo "</tr>";
       while($row = mysqli_fetch_array($result))
       {
          echo "<tr>";
          echo "<td>"; echo $row["books_name"]; echo "</td>";
          echo "<td>"; ?> <img src="<?php echo $row["books_img"]; ?>" height="120" width="90"> <?php   echo "</td>";
          echo "<td>"; echo $row["books_author_name"]; echo "</td>";
          echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
          echo "<td>"; echo $row["books_purchase_date"]; echo "</td>";
          echo "<td>"; echo $row["books_price"]; echo "</td>";
          echo "<td>"; echo $row["books_qty"]; echo "</td>";
          echo "<td>"; echo $row["avilable_qty"]; echo "</td>";
          echo "</tr>";

       }
       echo "</table>";
     }
     else
     {
          $sql = "SELECT * FROM `add_books`";
          $result = mysqli_query($conn, $sql);

          echo "<table class='table table-bordered'>";
          echo "<tr>";
          echo "<th>"; echo "Books name"; echo "</th>";
          echo "<th>"; echo "Books Image"; echo "</th>";
          echo "<th>"; echo "Author"; echo "</th>";
          echo "<th>"; echo "Publication"; echo "</th>";
          echo "<th>"; echo "Purchase date"; echo "</th>";
          echo "<th>"; echo "Price"; echo "</th>";
          echo "<th>"; echo "books quantity"; echo "</th>";
          echo "<th>"; echo "Avilable quantity"; echo "</th>";
          echo "<th>"; echo "Delete Book"; echo "</th>";
          echo "</tr>";
           while($row = mysqli_fetch_array($result))
           {
              echo "<tr>";
              echo "<td>"; echo $row["books_name"]; echo "</td>";
              echo "<td>"; ?> <img src="<?php echo $row["books_img"]; ?>" height="120" width="90"> <?php   echo "</td>";
              echo "<td>"; echo $row["books_author_name"]; echo "</td>";
              echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
              echo "<td>"; echo $row["books_purchase_date"]; echo "</td>";
              echo "<td>"; echo $row["books_price"]; echo "</td>";
              echo "<td>"; echo $row["books_qty"]; echo "</td>";
              echo "<td>"; echo $row["avilable_qty"]; echo "</td>";
              echo "<td>"; ?><a href="delete_book.php?id=<?php echo $row["id"] ?>">Delete book</a> <?php echo "</td>";
              echo "</tr>";

           }
           echo "</table>";
     }

     ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


<?php

include "footer.php";

?>