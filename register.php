<!-- Modal HTML embedded directly into document -->
<div id="ex1" class="modal">
 
 
  <p>
<img src="img/logo.png" id="logo">
<form method="post" action="register.php">
<div class="box-login">
<input type="text" name="username" placeholder="Celular, e-mail ou nome de usuário" class="field-login" required /> 
<label for="username" class="label-login">Celular, e-mail ou nome de usuário</label>
</div>
<div class="box-login">
<input type="text" name="name" placeholder="Nome" class="field-login" required /> 
<label for="username" class="label-login">Nome</label>
</div>
<div class="box-login">
<input type="password" name="password" placeholder="Senha" class="field-login" required /> 
<label for="username" class="label-login">Senha</label>
</div>
<div class="box-login">
<input type="password" name="r-password" placeholder="Repita a senha" class="field-login" required >
<label for="username" class="label-login">Repita a senha</label>
</div>
<input type="submit" value="Inscreva-se" id="submit-login" >
</form> 

    <?php 
    include "connect.php";
    if(isset($_POST['username'],$_POST['name'],$_POST['password'])){
    $a=$_POST['username'];
    $b=$_POST['name'];
    $c=md5(md5($_POST['password']."#?*&#"));
    $d=md5(md5($_POST['r-password']."#?*&#"));;
        if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_users WHERE username='$a'"))>0){
            echo "Esse nome de usuário já existe";
        }
        else {
            if($c==$d){
            $register="INSERT INTO tb_users VALUES (NULL,'$a', '$b', '$c')";
            $result=mysqli_query($connect, $register);
                if ($result) {
                header("Location: login.php?status=cadastrado");
                }
                }
                else {
                    echo "Senhas não coincidem";
                    }
        }
    }

    mysqli_close($connect);
    ?>

</p>


</div>