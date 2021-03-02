<?php include "header.php";


?>


<main role="main" class="fullheight">
    
        
    <div id="feed-container">
                <div id="header-home">
                    <h2 id="title-feed">  Página Inicial </h2> 
                </div>


        <div id="feed">
           

              
   
            <section id="feed-posts">
                
           <?php 
           include "connect.php";
           $userSession=$_SESSION['id-user'];

           $sqlFollower = mysqli_query($connect, "SELECT * FROM tb_follow
           left join tb_users on tb_follow.user_following = tb_users.id_users
           WHERE tb_follow.user_on=$userSession");


while ($result=mysqli_fetch_array($sqlFollower)) {
    echo "<article id='posts'>
    <div id='user-avatar'>
    <a href='".$result['username']."'><img src='img/default.png' class='img-avatar'></a>
    </div>
    <div id='post-single'> <a href='".$result['username']."' class='post-name-title'>".
    $result['name']."</a> <a href='".$result['username']."' class='post-username-title'> @".$result['username']."</a>
    </div>
    </article>";
}

mysqli_close($connect);
?>
                
            </section>
        </div>
    </div>

    <aside id="feed-right">
        <div id="aside-search">
            <input type="text" id="search-home" placeholder="Buscar no Twriter">
        </div>
        <section id="trendings">
            <h3 id="title-trendings"> O que está acontecendo </h3>      
        </section>
    </aside>

</main>




<?php include "footer.php"; ?>