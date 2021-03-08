<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="favicon.png">

    <title>Entrar no Twriter / Twriter</title>
    <style>
body {
	font-family: BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
	}
#container-login{
	margin: 20px auto;
	width:300px;
}
#logo {
	width: 50px;
	height: 50px;
}
h2 {
	font-size: 32px;
}
.box-login {
  position: relative;
}
.field-login {
	width: 100%;
	height: 50px;
	border: 1px solid rgba(29,161,242,1.00);
	border-radius: 9px;
	margin: 10px 0;
	font-size: 18px;
	padding-left: 5px;
	position: relative;
  	z-index: 1;
}
.field-login:focus::placeholder {
	color: transparent;
}
.label-login {
  margin: 10px 0;
  padding-left: 5px;
  width: 100%;
  position: absolute;
  color: rgba(29,161,242,1.00);
  font-size: 18px;
  top: 0; bottom: 0; left: 0; right: 0;
  transition: 0.5s;                
}

.field-login:focus + .label-login{
  font-size: 10px;
  z-index: 1;
  transition: 0.7s;  
}
#submit-login{
	width: 302px;
	height: 50px;
	font-size: 20px;
	background: rgba(29,161,242,1.00);
	color: #FFFFFF;
	text-align: center;
	border: none;
	border-radius: 9px;
	font-weight: bold;
}
p {
	text-align: center;
	font-size: 14px;
}
p a {
	color: rgba(29,161,242,1.00);
	text-decoration: none;
}
p a:hover {
	text-decoration: underline;
}
	</style>
</head>
<body>
<?php include "register.php"; ?>
<div id="container-login">
<img src="img/logo.png" id="logo">
<h2> Entrar no Twriter </h2>
<form method="post" action="login.php">
<div class="box-login">
<input type="text" name="username" placeholder="Celular, e-mail ou nome de usuário" class="field-login" required />
<label for="username" class="label-login">Celular, e-mail ou nome de usuário</label>
</div>
<div class="box-login">
<input type="password" name="password" placeholder="Senha" class="field-login" required />
<label for="password" class="label-login">Senha</label>
</div>
<input type="submit" value="Entrar" id="submit-login" />
</form> 
<p>
<a href="#">Esqueceu sua senha?</a> · 
<a href="register.php"><a href="#ex1" rel="modal:open">Inscrever-se no Twitter</a>

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
                $name=$data['name'];

            $_SESSION['id-user']=$id_user;
            $_SESSION['name']=$name;
			$_SESSION['user-checked']=$username;
			$_SESSION['password-checked']=$password;
			header('location:index.php');
		}
		else {
            unset ($_SESSION['id-user']);
            unset ($_SESSION['name']);
			unset ($_SESSION['user-checked']);
			unset ($_SESSION['password-checked']);
			echo "Incorrect username or password";
		}
	}
	echo (isset($_GET['status']) and ($_GET['status']=='cadastrado')) ?  "Usuário cadastrado. Faça o login!" : "";
	mysqli_close($connect);
	?>
</p>
	</div>
    
<?php include "footer.php"; ?>