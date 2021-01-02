
<?php
session_start();
unset($_SESSION["shopping_cart"]);
unset($_SESSION['email']);
header("Location:Main.php");
?>