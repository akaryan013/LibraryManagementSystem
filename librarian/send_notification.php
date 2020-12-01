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
                                <h2>Send Notification</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
        <form name="sentMessage" id="contactForm" action="" method="post" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" placeholder="Student Name" name="name" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div> 
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Roll Number</label>
              <input type="tel" class="form-control" placeholder="Roll Number" name="rollno" id="rollno" required data-validation-required-message="Please enter your Roll number.">
              <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Tittle</label>
              <input type="text" class="form-control" placeholder="Tittle" name="tittle" id="tittle" required data-validation-required-message="Please enter your tittle">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message" required data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton" name="send">Send</button>
        </form>   

        <?php
        
        if(isset($_POST['send']))
        {
          $sql = "INSERT INTO `messages` (`id`, `susername`, `dusername`, `rollno`, `tittle`, `msg`, `seen`) VALUES ('', '$_SESSION[name]', '$_POST[name]', '$_POST[rollno]', '$_POST[tittle]', '$_POST[message]', 'no')";
          $result = mysqli_query($conn, $sql);

           ?>
           <script type="text/javascript">
              alert("message sent succesfully");
           </script>

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