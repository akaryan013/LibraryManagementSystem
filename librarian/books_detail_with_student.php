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
                                <h2>Books detail with students</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                    <form name="form1" action="" method="post">
                        <table class="table">
                            <tr>
                         <td> <input type="text" name="t1" placeholder="Enter Book Name" class="form-control" required></td>
                         <td> <input type="submit" name="search" value="Search Students" class="form-control btn btn-default"></td>
                            </tr>
                          </table>
                    </form>   

                                <?php

                                if(isset($_POST['search']))
                                {
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>";
                                       echo "Book name";
                                    echo "</th>";
                                    echo "<th>";
                                       echo "Rollno";
                                    echo "</th>";
                                    echo "<th>";
                                       echo "Student name";
                                    echo "</th>";
                                    echo "<th>";
                                       echo "Email";
                                    echo "</th>";
                                    echo "<th>";
                                       echo "Contact";
                                    echo "</th>";
                                    echo "<th>";
                                       echo "Issue Date";
                                    echo "</th>";
                                    echo "</tr>";
                                    
                                    $sql = "SELECT * FROM `issue_books` WHERE `books_name` LIKE '%$_POST[t1]%'";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result))
                                    { 
                                        echo "<tr>";
                                       echo "<td>"; echo $_POST['t1'];echo "</td>";
                                       echo "<td>"; echo $row["student_rollno"];echo "</td>";
                                       echo "<td>"; echo $row["student_name"];echo "</td>";
                                       echo "<td>"; echo $row["student_email"];echo "</td>";
                                       echo "<td>"; echo $row["student_contact"];echo "</td>";
                                       echo "<td>"; echo $row["books_issue_date"];echo "</td>";
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