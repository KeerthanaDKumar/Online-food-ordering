<?php

	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT * FROM pizza ORDER BY pizza_name ASC ';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
   
    if(isset($_POST['delete'])){

		$pizza_name = mysqli_real_escape_string($conn, $_POST['pizza_name']);

		$sql = "DELETE FROM pizza WHERE pizza_name = $pizza_name";
    $res=mysqli_query($conn, $sql);
		if(mysqli_query($conn, $sql)){
            echo '<script>alert("Deleted Pizza Successfully");</script>';
			
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

    }
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/adminheader.php'); ?>

	<h4 class="center grey-text">Pizzas!</h4>
    <div class="table-responsive">
<table>
    <thead>
    <tr>
      <th scope="col" width="40%">Pizza Name</th>
      <th scope="col" width="30%">Cost in Rs.</th>
      <th scope="col" width="30%"></th>

    </tr>
  </thead>
</table>
    </div>
    <?php foreach($pizzas as $pizza): ?>
        <div class="table-responsive">
        <table class="table">

  <tbody>
 
    <tr>

      <td width="30%"><h6><?php echo htmlspecialchars($pizza['pizza_name']); ?></h6></td>
      <td width="10%"><h6><?php echo htmlspecialchars($pizza['cost']); ?></h6></td>
    <td width ="15%"> <form action="delete.php" method="POST">
	
				<input type="hidden" name="pizza_name" value="<?php echo $pizza['pizza_name']; ?>">
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

</html>