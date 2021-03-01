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
 if (!isset($_SESSION)) { 
     session_start(); 
 }
?>
<div id="container" class="fullheight">
<header role="banner" class="fullheight">
    <div id="header-left">
        <nav role="navigation">
        <a href="index.php" role="link" class="nav-link"><div class="link-title"><img src="img/origami.png" id="nav-logo"></div></a>
        <a href="index.php" role="link" class="nav-link"><div class="link-title"><span class="material-icons">home</span><span>Página Inicial</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">tag</span><span>Explorar</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">notifications_none</span><span>Notificações</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">mail_outline</span><span>Mensagens</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">bookmark_border</span><span>Itens Salvos</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">subject</span><span>Listas</span></div></a>
        <a href="profile.php?id_users=<?php echo $_SESSION['user-checked'];?>" role="link" class="nav-link"><div class="link-title"><span class="material-icons">perm_identity</span><span>Perfil</span></div></a>
        <a href="#" role="link" class="nav-link"><div class="link-title"><span class="material-icons">more_horiz</span><span>Mais</span></div></a>

        </nav>

        <div class="twreetar">
            <button id="btn-nav">Twreetar</button>
        </div>

        <div id="myacount">
        <?php
       
        echo "<div id='user-avatar'>
        <img src='img/default.png' class='img-avatar'>
        </div>
        <div id='post-single'> <span class='post-name-title'>"
        .$_SESSION['name']."</span> <br> 
        <span class='post-username-title'>@" 
        .$_SESSION['user-checked'].
        "</span></div>";
        ?>
        </div>
    </div>
</header>
    
