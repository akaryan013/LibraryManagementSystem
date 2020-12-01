<?php

include "connection.php";

$id = $_GET["id"];

mysqli_query($conn, "DELETE FROM `add_books` WHERE `id` = $id");

?>

<script type=text/javascript>
	window.location = "display_books.php";
</script>