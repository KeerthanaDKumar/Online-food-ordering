<?php 
session_start();
$email= $_SESSION['email'];

	include('config/db_connect.php');
    $orders = mysqli_real_escape_string($conn, $_SESSION['email']);
	// write query for all pizzas
	$sql = "SELECT * FROM orders where email_id =$email ";

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$orders = mysqli_fetch_assoc($result);


	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('menuheader.php'); ?>

	<h4 class="center grey-text">Previous orders!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($orders as $order): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<img src="images/pizza1.jpg"class="pizza">
						<div class="card-content center">
                            <h6><?php echo htmlspecialchars($orders['pizza_name']); ?></h6>
                            <h6><?php echo htmlspecialchars($orders['area']); ?></h6>
                             <h6><?php echo htmlspecialchars($orders['qty']); ?></h6>
                             <h6><?php echo htmlspecialchars($orders['total']); ?></h6>
                             <h6><?php echo htmlspecialchars($orders['time']); ?></h6>

						</div>
						
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>