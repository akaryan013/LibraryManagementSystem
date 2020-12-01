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
                                <h2>Return Books</h2>

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
                                      ?>
                                       <table class="table table-bordered">
                                          <tr>
                                           <th>
                                               Student Name
                                           </th>
                                           <th>
                                               Roll no.
                                           </th>
                                           <th>
                                               Sem
                                           </th>
                                           <th>
                                               Books Name
                                           </th>
                                           <th>
                                               Issue date
                                           </th>
                                           <th>
                                               Return book
                                           </th>
                                       </tr>
                                       
                                       <?php
                                        $sql = "SELECT * FROM issue_books WHERE `student_rollno` = '$_POST[enr]'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) 
                                        {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $row["student_name"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["student_rollno"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["student_sem"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["books_name"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["books_issue_date"];
                                            echo "</td>";
                                            echo "<td>";
                                            ?> <a href="return.php?id=<?php echo $row["id"]; ?>">Return Book</a><?php 
                                            echo "</td>";
                                            echo "</tr>";
                                        }


                                       ?>
                                       </table>
                                    <?php
                                      

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