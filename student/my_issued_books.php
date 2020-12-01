<?php

include "connection.php";
include "header.php";

if(!isset($_SESSION["rollno"]))
{
  ?>
  <script type="text/javascript">
    window.location = "login.php";
  </script>
  <?php
}

?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Student Panel</h3>
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
                                <h2>My Issued Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                          <table class="table table-bordered">
                             <tr>
                              <th>
                                  student Roll.no.
                              </th>
                               <th>
                                  Issued Book.
                              </th>
                               <th>
                                  Issued date.
                              </th>
                             </tr>
                              <?php
                         
                               $sql = "SELECT * FROM `issue_books` WHERE `student_rollno` LIKE '$_SESSION[rollno]'";
                               $result = mysqli_query($conn, $sql);
                               while ($row = mysqli_fetch_array($result)) 
                               {
                                   echo "<tr>";
                                   echo "<td>"; echo $row["student_rollno"]; echo "</td>";
                                   echo "<td>"; echo $row["books_name"]; echo "</td>";
                                   echo "<td>"; echo $row["books_issue_date"]; echo "</td>";
                                   echo "</tr>";
                               }

                              ?>
                          </table>
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