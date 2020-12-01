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
                                <h2>Message from library</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
                             <tr>
                              <th>
                                  librarian Name.
                              </th>
                               <th>
                                  Tittle
                              </th>
                               <th>
                                  Message
                              </th>
                             </tr>
                              <?php
                         
                               $sql = "SELECT * FROM `messages` WHERE `rollno` LIKE '$_SESSION[rollno]'";
                               $result = mysqli_query($conn, $sql);
                               while ($row = mysqli_fetch_array($result)) 
                               {
                                   if($tot == 0)
                                  {
                                   echo "<tr>";
                                   echo "<td>"; echo $row["susername"]; echo "</td>";
                                   echo "<td>"; echo $row["tittle"]; echo "</td>";
                                   echo "<td>"; echo $row["msg"]; echo "</td>";
                                   echo "</tr>";
                                   }
                                   else
                                   {
                                   echo "<tr>";
                                   echo "<td style='color:black'>"; echo $row["susername"]; echo "</td>";
                                   echo "<td style='color:black'>"; echo $row["tittle"]; echo "</td>";
                                   echo "<td style='color:black'>"; echo $row["msg"]; echo "</td>";
                                   echo "</tr>";
                                    $tot--;
                                   }
                                   
                               }

                               mysqli_query($conn, "UPDATE `messages` SET `seen` = 'yes' WHERE `messages`.`rollno` = '$_SESSION[rollno]' AND `messages`.`seen` = 'no'");

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