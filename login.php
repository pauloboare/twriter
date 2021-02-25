<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | twriter</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<form method="post">
<input type="text" name="username" placeholder="User" required /> <br/>
<input type="password" name="password" placeholder="Password" required /> <br/>
<input type="submit" value="Login" />
</form> 

	<?php 
	include "connect.php";
	if(isset($_POST['username'],$_POST['password'])){
		session_start();
		$username=$_POST['username'];
		$password=md5(md5($_POST['password']."#?*&#"));;
		$check=mysqli_query($connect, "SELECT * FROM tb_users WHERE username ='$username' AND password ='$password'");

            

		if(mysqli_num_rows($check) > 0 ) {
            
                $data=mysqli_fetch_array($check);
                $id_user=$data['id_users'];

            $_SESSION['id-user']=$id_user;
			$_SESSION['user-checked']=$username;
			$_SESSION['password-checked']=$password;
			header('location:index.php');
		}
		else {
            unset ($_SESSION['id-user']);
			unset ($_SESSION['user-checked']);
			unset ($_SESSION['password-checked']);
			echo "Incorrect username or password";
		}
	}
	mysqli_close($connect);
	?>

	<p> Don't have a registration?<a href="register.php"> Make your registration!</a> </p>
    
</body>
</html>