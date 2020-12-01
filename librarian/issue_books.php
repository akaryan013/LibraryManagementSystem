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
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                                <select name="enr" class="form-control selectpicker">
                                                    <?php
                                                      $sql = "SELECT * FROM `student_registration` ORDER BY `student_registration`.`rollno` ASC";
                                                      $result = mysqli_query($conn, $sql);
                                                      while($row = mysqli_fetch_array($result))
                                                      {
                                                        echo "<option>";
                                                        echo $row["rollno"];
                                                        echo "</option>";
                                                      }
                                                    ?>    
                                                </select>
                                            </td>
                                            <td>
                                                <input type="submit" name="submit1" value="search" class="form-control btn btn-default" style="margin-top: 5px; margin-left: 15px">
                                            </td>
                                        </tr>
                                    </table>
                                   
                                    <?php
                                    if(isset($_POST['submit1']))
                                    {
                                          $res = mysqli_query($conn, "SELECT * FROM student_registration WHERE rollno='$_POST[enr]'");
                                          while ($row = mysqli_fetch_array($res))
                                           {
                                               $firstname = $row["firstname"];
                                               $lastname = $row["lastname"];
                                               $email = $row["email"];
                                               $contact = $row["contact"];
                                               $sem = $row["sem"];
                                               $rollno = $row["rollno"];
                                               $student_name= $firstname." ".$lastname;
                                               $_SESSION["rollno"] = $rollno;
                                           } 
                                        ?>
                                           <table class="table table-bordered">
                                            <tr>
                                                <td><input class="form-control" type="text" name="rollno" placeholder="Roll No" value="<?php echo $rollno; ?>" disabled></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" type="text" name="student_name" placeholder="student_name" value="<?php echo $student_name; ?>"></td>
                                            </tr>
                                             <tr>
                                                <td><input class="form-control" type="text" name="student_sem" placeholder="SEMESTER" value="<?php echo $sem; ?>"></td>
                                            </tr>
                                             <tr>
                                                <td><input class="form-control" type="text" name="student_contact" placeholder="Contact" value="<?php echo $contact; ?>"></td>
                                            </tr>
                                             <tr>
                                                <td><input class="form-control" type="text" name="student_email" placeholder="Email" value="<?php echo $email; ?>"></td>
                                            </tr>
                                             <tr>
                                                <td>
                                                    <select name="books_name" class="form-control selectpicker">
                                                    <?php
                                                        $sql = "SELECT * FROM `add_books` ORDER BY `add_books`.`books_name` ASC";
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($result)) 
                                                        {
                                                            echo "<option>";
                                                            echo $row["books_name"];
                                                            echo "</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" type="text" name="books_issue_date" placeholder="Issue Date" value="<?php echo date("d/M/Y"); ?>"></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" type="text" name="books_return_date" placeholder="Return Date"></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" type="text" name="fine" placeholder="Fine" value="None"></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control btn btn-default" type="submit" name="submit2" value="Issue book" style="border-radius: 12px; background: rgb(23,5,7); color: white; padding: 4px 11px"></td>
                                            </tr>
                                            </table>
                                        <?php
                                    }

                                    ?>
                                </form>

                                <?php
                                  if(isset($_POST['submit2']))
                                  {

                                    $qty = 0;
                                    $res = mysqli_query($conn, "SELECT * FROM `add_books` WHERE `books_name` = '$_POST[books_name]'");
                                    while($row = mysqli_fetch_array($res))
                                    {
                                      $qty = $row["avilable_qty"];
                                    }

                                    if($qty == 0)
                                    {
                                       ?>
                                         <hr>
                                         <div class="alert alert-danger col-lg-0 col-lg-push-0">
                                         <strong style="color:white">This book is unavilable in stock</strong>
                                         </div>
                                       <?php
                                    }
                                    else
                                    {
                                    $sql = "INSERT INTO `issue_books` (`id`, `student_rollno`, `student_name`, `student_sem`, `student_contact`, `student_email`, `books_name`, `books_issue_date`, `books_return_date`, `fine`) VALUES ('', '$_SESSION[rollno]', '$_POST[student_name]', '$_POST[student_sem]', '$_POST[student_contact]', '$_POST[student_email]', '$_POST[books_name]', '$_POST[books_issue_date]', '', 'None')";
                                    mysqli_query($conn, $sql);
                                   //update avilable quantity of books
                                    $sql1 = "UPDATE `add_books` SET `avilable_qty` = avilable_qty-1 WHERE `add_books`.`books_name` = '$_POST[books_name]'";
                                    mysqli_query($conn, $sql1);

                                     ?>
                                     <script type="text/javascript">
                                         alert("Book issued succesfully");
                                     </script>

                                    <?php
                                     }
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