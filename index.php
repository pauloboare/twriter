<?php include "header.php"; ?>
<main role="main" class="fullheight">
    
        
    <div id="feed-container">
                <div id="header-home">
                    <h2 id="title-feed"> Página Inicial </h2> 
                </div>


        <div id="feed">
            <div id="feed-form">
                    <div id='form-avatar'>
                        <img src='img/default.png' id='img-avatar'>
                    </div>
                    <div id='mypost'>
                        <form method="post">
                            <textarea name="post" id="twretar" placeholder="O que está acontecendo?"></textarea>
                            <div class="twreetar">
                                <div id="btns-forms">
                                    <div id="btns-left">
                                       <span class="material-icons btns-left">insert_photo</span>
                                       <span class="material-icons btns-left">gif</span>
                                       <span class="material-icons btns-left">poll</span>
                                       <span class="material-icons btns-left">mood</span>
                                       <span class="material-icons btns-left">schedule_send</span>
                                    </div>
                                    <div id="btns-right">
                                        <input type="submit" id="btn-post" value="Twreetar">
                                    </div>
                                </div>
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

              
            </div>
            <section id="feed-posts">
                

                <?php
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $userSession=$_SESSION['id-user'];

                include "connect.php";
                $sql = mysqli_query($connect, "SELECT * FROM tb_posts
                inner JOIN tb_follow ON tb_posts.fk_user = tb_follow.user_following
                inner join tb_users on tb_posts.fk_user = tb_users.id_users
                WHERE tb_follow.user_on=$userSession
                OR tb_posts.fk_user =$userSession
                GROUP BY id_posts
                ORDER BY datatime DESC");
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
                    elseif($hours>=1 and $hours<24){
                        $crhonology= round($hours,0);
                        $typeTime=" h";
                    }
                    else {
                        $date = $result['datatime'];
	                    $crhonology=strftime('%d de %b', strtotime( $date ));
                        $typeTime="";
                    }

                    echo "<article id='posts'>
                    <div id='user-avatar'>
                        <img src='img/default.png' class='img-avatar'>
                    </div>
                    <div id='post-single'> <span class='post-name-title'>".
                    $result['name']."</span> <span class='post-username-title'> @".$result['username']." - " .$crhonology. " ".$typeTime. "</span><br>".
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