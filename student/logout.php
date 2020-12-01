<?php
session_start();
unset($_SESSION["stname"]);
unset($_SESSION["rollno"]);

?>

<script type="text/javascript">
	window.location = "login.php";
</script>