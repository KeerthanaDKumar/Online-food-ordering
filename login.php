<?php
$email=$password='';
session_start(); 
$error=''; 
$errors = array('email' => '', 'password' => '');

    if(isset($_POST['submit'])){
        
        // check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
        } else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        // check title
        if(empty($_POST['password'])){
            $errors['password'] = 'A title is required';
        } else{
            $title = $_POST['password'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['password'] = 'Title must be letters and spaces only';
            }
        }}
    
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Email or Password is invalid";
}
else
{include('config/db_connect.php');

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

        // make sql
        $sql = "SELECT * FROM user WHERE email_id = $email AND user_passwd = $password";

        // get the query result

        mysqli_close($conn);
        if(empty($sql)){
            echo '<script>alert("Invalid inputs");</script>';
        }
        else{
			header('Location:cart1.php');
			session_start();
			$_SESSION['email']=$email;
        }


        }

    }

?>

<!DOCTYPE html>
<html>
    
    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Login</h4>
        <form class="white" action="login.php" method="POST">
            <label>Your Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" >
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label>Enter Password</label>
            <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>">
            <div class="red-text"><?php echo $errors['password']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>

</html>
