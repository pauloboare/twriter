<?php include "header.php"; ?>
<main role="main" class="fullheight">
    
        
    <div id="feed-container">
                <div id="header-home">
                    <h2 id="title-feed"> Página Inicial </h2> 
                </div>


        <div id="feed">
            <div id="feed-form">
                <form method="post">
                    <textarea name="post" id="twretar" placeholder="O que está acontecendo?"></textarea>
                    <div class="twreetar">
                        <input type="submit" value="Twreetar">
                    </div>
                    <?php 
                    include "connect.php";
                    include "session.php";
                    if(isset($_POST['post'])){
                    $a=$_SESSION['id-user'];
                    $b=$_POST['post'];
                    $sql="INSERT INTO tb_posts VALUES (NULL, '$a','$b', NOW())";
                    $result=mysqli_query($connect, $sql);
                    if ($result) {
                        header('location:index.php');;
                    }
                    else {
                        echo "Failed!";
                    }
                    }
                    mysqli_close ($connect);
                    ?>
                    </form>

              
            </div>
            <section id="feed-posts">
                

                <?php
                date_default_timezone_set('America/Sao_Paulo');
                include "connect.php";
                $sql = mysqli_query($connect, "SELECT * FROM tb_posts INNER JOIN tb_users ON tb_posts.fk_user = tb_users.id_users ORDER BY datatime DESC");
                while ($result=mysqli_fetch_array($sql)) {

                    $dataStart = $result['datatime'];
                    $dataNow = date("Y-m-d H:i:s");

                    $unix_Start = strtotime($dataStart);
                    $unix_Now = strtotime($dataNow);

                    $hours    = floor(($unix_Now - $unix_Start) / 3600);
                    $minutes  = floor((($unix_Now - $unix_Start) - ($hours * 3600)) / 60);

                    if($hours<1){
                        $crhonology= round($minutes,0);
                        $typeTime=" min";
                    }
                    elseif($hours>=1){
                        $crhonology= round($hours,0);
                        $typeTime=" h";
                    }

                    echo "<article id='posts'>
                    <div id='user-avatar'>
                        <img src='img/default.png' id='img-avatar'>
                    </div>
                    <div id='post-single'> @".
                    $result['username']." ".$result['name']." - " .$crhonology. " ".$typeTime. "<br>".
                    $result['post'].
                    "</div>
                    </article>";
                }
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





</div>
</body>
</html>