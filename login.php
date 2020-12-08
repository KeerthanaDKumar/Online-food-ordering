<?php
    $er='';

	include('config/db_connect.php');

	$lemail = $lpassword = '';
    $errors = array('lemail' => '', 'lpassword' => '');
    $pizza=array('user_name' =>'','email_id' =>'','ph_no'=>'','user_password'=>'','area'=>'');

	if(isset($_POST['submit'])){
		
		// check email
		if(empty($_POST['lemail'])){
			$errors['lemail'] = 'An email is required';
		} else{
			$email = $_POST['lemail'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['lemail'] = 'Email must be a valid email address';
			}
		}

		// check password
		if(empty($_POST['lpassword'])){
			$errors['[lpassword'] = 'A password is required';
		} else{
			$lpassword = $_POST['lpassword'];
			if(!preg_match('/^[a-zA-Z0-9\s]+$/', $lpassword)){
				$errors['lpassword'] = 'password is not valid';
			}
		}

	    // check GET request id param
	      if(isset($_POST['submit'])){
              session_start();
              
              $_SESSION['email']=$_POST['lemail'];
              $_SESSION['password']=$_POST['lpassword'];
            
          }
          if(!array_filter($errors)){
            //echo 'errors in form';
        } else { 
           include('config/db_connect.php');
		
		// escape sql chars
        $lemail = mysqli_real_escape_string($conn, $_POST['lemail']);
        $lpassword = mysqli_real_escape_string($conn, $_POST['lpassword']);

		// make sql
		$sql = "SELECT email_id,user_password FROM user WHERE ('email_id' == $lemail)";
          if(mysqli_query($conn, $sql)){
		 $result = mysqli_query($conn, $sql);

		 // fetch result in array format
          $pizza = mysqli_fetch_assoc($result);
         if($pizza['email_id']== "dvpk511@gmail.com" && $pizza['user_passwd'] == '12345676'){
            header('Location:admin.php');
        }
        elseif($pizza['email_id']===$lemail && $pizza['user_passwd']===$lpassword)
        {
            header('Location:menu.php');
        }
        else{
            //printing the error
            $er="Invalid Data";
        }
    }
        else {
            echo 'query error: '. mysqli_error($conn);
        }  

	}}

	 // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Login</h4>
		<form class="white" action="login.php" method="POST">
			<label>Your Email</label>
			<input type="text" name="lemail" value="<?php echo htmlspecialchars($lemail); ?>" >
			<div class="red-text"><?php echo $errors['lemail']; ?><?php echo $er ?></div>
			<label>Enter Password</label>
			<input type="text" name="lpassword" value="<?php echo htmlspecialchars($lpassword); ?>">
			<div class="red-text"><?php echo $errors['lpassword']; ?><?php echo $er ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
