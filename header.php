<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>twriter</title>
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php
 include "session.php";
 setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
            
                include "connect.php";
                $idProfile=$_SESSION['id-user'];
                $sqlUser="SELECT * FROM tb_users WHERE id_users=$idProfile";
                $resultUser=mysqli_query($connect, $sqlUser);
                
                if (mysqli_num_rows($resultUser)) {
                $dataUser=mysqli_fetch_array($resultUser);
                $avatarProfile=$dataUser['avatar'];
                }

?>
<div id="container" class="fullheight">
<header role="banner" class="fullheight">
    <div id="header-left">
        <nav role="navigation">
        <a href="home" role="link" class="nav-link"><div class="link-title"><img src="img/logo.png" id="nav-logo"></div></a>
        <a href="home" role="link" class="nav-link"><div class="link-title"><span class="material-icons">home</span><span>Página Inicial</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">tag</span><span>Explorar</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">notifications_none</span><span>Notificações</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">mail_outline</span><span>Mensagens</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">bookmark_border</span><span>Itens Salvos</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">subject</span><span>Listas</span></div></a>
        <a href="<?php echo $_SESSION['user-checked'];?>" role="link" class="nav-link"><div class="link-title"><span class="material-icons">perm_identity</span><span>Perfil</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">more_horiz</span><span>Mais</span></div></a>

        </nav>

        <div class="twreetar">
            <?php include "modal.php"; ?>

        </div>

        <div id="acount">

<button id="dropup">
    <?php
       echo "<div id='myacount'>

       <div id='user-avatar'>
       <img src='img/".$avatarProfile."' class='img-avatar'>
       </div>
       <div id='post-single'> <span class='post-name-title'>"
       .$_SESSION['name']."</span>  <br> 

       <span class='post-username-title'>@" 
       .$_SESSION['user-checked'].
       "</span></div>

       <div id='points'> &#8226; &#8226; &#8226; </div>
       </div>";


    ?>   
    </button>   
   <div id="dropup-open">
    <a href="logout.php"> Sair de @<?php echo $_SESSION['user-checked']; ?> </a>
    </div>

        </div>
    </div>
</header>
