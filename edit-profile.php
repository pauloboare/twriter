<?php include "header.php"; ?>

<form method="POST" enctype="multipart/form-data">
	<input type="file" required name="userfile"/>
	<input type="submit" value="Alterar foto"/>

	<?php 
	include "connect.php";
    $userProfile=$_SESSION['id-user'];
    
	if (isset($_FILES['userfile'])){
		$extension = strtolower(substr($_FILES['userfile']['name'], -4));
		$new_name = md5(time()) . $extension;
		$dir = "img/";
		move_uploaded_file($_FILES['userfile']['tmp_name'], $dir . $new_name);
		
        $sql_code ="UPDATE tb_users SET avatar='$new_name' WHERE id_users=$userProfile";
	if (mysqli_query($connect, $sql_code)) {
		echo "Sua imagem foi enviada com Sucesso";
	}
	else {
		echo "Sua imagem não foi enviada";
        echo "<br>";
        echo $userProfile;
        echo "<br>";
        echo $new_name;
	}
}
mysqli_close($connect);
?>
</form>

<?php include "footer.php"; ?>
