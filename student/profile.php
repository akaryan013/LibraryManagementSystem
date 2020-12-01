<?php

include "header.php";

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
                                <h2>Profile</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                             
                             
                              <?php
                         
                               $sql = "SELECT * FROM `student_registration` WHERE `rollno` = '$_SESSION[rollno]'";
                               $result = mysqli_query($conn, $sql);
                               while ($row = mysqli_fetch_array($result)) 
                               {
                                  
                                ?>
                                  <form class="form-control">
                                      Name : <?php echo $_SESSION["stname"]; ?>
                                  </form><hr>
                                  <form class="form-control">
                                      Username : <?php echo $row["username"]; ?>
                                  </form><hr>
                                  <form class="form-control">
                                      Roll No : <?php echo $_SESSION["rollno"]; ?>
                                  </form><hr>
                                  <form class="form-control">
                                      Email : <?php echo $row["email"] ?>
                                  </form><hr>
                                  <form class="form-control">
                                      Contact : <?php echo $row["contact"] ?>
                                  </form><hr>
                                  <form class="form-control">
                                      Semester : <?php echo $row["sem"] ?>
                                  </form><hr>
                                  <a href="search_books.php"><button type="submit" class="btn btn-primary" id="sendMessageButton" name="back">Back</button></a>
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