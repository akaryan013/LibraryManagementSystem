<?php
include 'connection.php';

$id = $_GET["id"];

$books_name = "";
$result = mysqli_query($conn, "SELECT * FROM `issue_books` WHERE `issue_books`.`id` = $id");
while ($row = mysqli_fetch_array($result))
{
	$books_name = $row["books_name"];
}
//update avilable quantity of books 
mysqli_query($conn, "UPDATE `add_books` SET `avilable_qty` = avilable_qty+1 WHERE `add_books`.`books_name` = '$books_name'");

$sql = "DELETE FROM `issue_books` WHERE `issue_books`.`id` = $id";
mysqli_query($conn, $sql);

 ?>
<script type="text/javascript">
	alert("Book Returned succesfully");
</script>
<?php

?>

<script type=text/javascript>
	window.location = "return_books.php";
</script>