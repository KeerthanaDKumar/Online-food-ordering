<?php
  $order_id='';

	include('config/db_connect.php');

	// write query for all pizzas
	$sql = "SELECT * FROM orders where email_id = 'keerthana5112k@gmail.com'";

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
   
    if(isset($_POST['delete'])){

		$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);

		$sql = "DELETE FROM orders WHERE order_id = $order_id";

		if(mysqli_query($conn, $sql)){
            echo '<script>alert("Deleted Order");</script>';
			
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

    }
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<!DOCTYPE html>  
 <html>  <head>
 <title>History</title>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	  <body>  
	  <nav class="black lighten-2">
     <div class="container " >
     <a href="#" class="brand-logo brand-text">Tasty Grab!!</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li><a href="cart1.php" class="btn brand z-depth-0">ORDER</a></a></li>
		<li><a href="logot.php" class="btn brand z-depth-0">LOGOUT</a></li>
		<li><a href="vieworders.php" class="btn brand z-depth-0">VIEW ORDERS</a></li>
      </ul>
    </div>
  </nav>

           
 
	<h4 class="center grey-text">ORDER DETAILS</h4>
    <div class="table-responsive">

    </div>
    <?php foreach($pizzas as $pizza): ?>
        <div class="table-responsive">
        <table class="table">

  <tbody>
 
    <tr>
      
      <td width="10%"><h6><?php echo htmlspecialchars($pizza['pizza_name']); ?></h6></td>
      <td width="20%"><h6><?php echo htmlspecialchars($pizza['area']); ?></h6></td>
      <td width="10%"><h6><?php echo htmlspecialchars($pizza['qty']); ?></h6></td>
      <td width="10%"><h6><?php echo htmlspecialchars($pizza['total']); ?></h6></td>
      <td width="15%"><h6><?php echo htmlspecialchars($pizza['time']); ?></h6></td>
    <td width ="15%"> <form action="vieworders.php" method="POST">
				<input type="hidden" name="order_id" value="<?php echo $pizza['order_id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>
    </td>
    </tr>
  </tbody>
</table>
        </div>
			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>
</body>
</html>