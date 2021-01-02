<?php 
$qty='';
$errors = array('aty' => '');
$pizza_name=$_SESSION['pizza_name'];
$cost=$_SESSION['cost'];
if(isset($_POST['submit'])){
    
    // check email
    if(empty($_POST['qty'])){
        $errors['qty'] = 'Enter Quantity';
    } else{
        $email = $_POST['qty'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['qty'] = 'Enter quantity';
        }
	}
}
	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT * FROM order_pizza';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$order_pizza = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('adminheader.php'); ?>

	<section class="container grey-text">
    <h4 class="center">ORDER</h4>
    <form class="white" action="cart.php" method="POST">
        <div class="red-text"><?php echo $pizza_name; ?></div>
        <label>name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
         <div class="red-text"><?php echo $cost; ?></div>
        <label>Enter Quantity</label>
        <input type="text" name="qty" value="<?php echo htmlspecialchars($ph_no) ?>">
        <div class="red-text"><?php echo $errors['qty']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

	<?php include('templates/footer.php'); ?>

</html>