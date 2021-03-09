
<!-- Modal HTML embedded directly into document -->
<div id="ex3" class="modal">
 
 
  <p>
	<?php 
	include "connect.php";
    $idProfile=$_SESSION['id-user'];
	$update=0;

	if (isset($_POST['name'],$_POST['bio'],$_POST['site'])){
		$name=$_POST['name'];
		$bio=$_POST['bio'];
		$site=$_POST['site'];
		$local=$_POST['local'];	
		$since=$_POST['since'];
		$sql_code ="UPDATE tb_users SET tb_users.name='$name', bio='$bio', site='$site', local='$local' WHERE id_users=$idProfile";
	if (mysqli_query($connect, $sql_code)) : $update++; endif;
}
	if ((isset($_FILES['userfile'])) and ($_FILES['userfile']['size'] > 0)){
		$extension = strtolower(substr($_FILES['userfile']['name'], -4));
		$new_name = md5(time()) . $extension;
		$dir = "img/";
		move_uploaded_file($_FILES['userfile']['tmp_name'], $dir . $new_name);
        $sql_code ="UPDATE tb_users SET avatar='$new_name' WHERE id_users=$idProfile";
	if (mysqli_query($connect, $sql_code)): $update++; endif;
}
if((isset($_POST['name'],$_POST['bio'],$_POST['site'])) or (isset($_FILES['userfile'])) and ($_FILES['userfile']['size'] > 0)){
	if($update>0)
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0.1';URL='$userProfile'>";
}

?>
  <form method="POST" enctype="multipart/form-data">
  <h3 id="h3-edit-profile"> Editar Perfil </h3> <input type="submit" value="Salvar" id="submit-profile">
  	
  	<div id='avatar-current' style="background: url('img/<?php echo $avatarProfile;?>'); background-size: cover;">
	  		<div class="cam-edit-container">
				<div class="cam-edit">           
							<input type="file" id="cam" name="userfile" accept=".jpg, .jpeg, .png" >
				</div>
         	</div>
	</div>
	
<div class="box-profile">
<input type="text" name="name" value="<?php echo $nameProfile;?>" placeholder="Nome" class="field-profile" required >
<label for="name" class="label-profile">Nome</label>
</div>
<div class="box-profile">
<textarea name="bio" placeholder="Bio" class="field-profile"><?php echo $bioProfile;?></textarea>
<label for="bio" class="label-profile">Bio</label>
</div>
<div class="box-profile">
<input type="text" name="site" value="<?php echo $siteProfile;?>" placeholder="Site" class="field-profile">
<label for="site" class="label-profile">Site</label>
</div>
<div class="box-profile">
<input type="text" name="local" value="<?php echo $localProfile;?>" placeholder="Localização" class="field-profile">
<label for="local" class="label-profile">Localização</label>
</div>
</form>



</p>


</div>

<!-- Link to open the modal -->
<p><button id="btn-post"><a href="#ex3" rel="modal:open">Editar Perfil</a></button></p>









