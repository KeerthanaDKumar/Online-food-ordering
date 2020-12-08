<?php

	include('config/db_connect.php');

    $sql = SELECT * FROM `order_pizza` ORDER BY 'order_time' DESC;
    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);

// fetch result in array format
$pizza = mysqli_fetch_assoc($result);
print_r($pizza)


}
<!DOCTYPE html>
<html>
	

</html>
