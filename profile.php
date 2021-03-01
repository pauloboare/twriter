<?php include "header.php";

if (!isset($_SESSION)) { 
    session_start(); 
}
include "connect.php";
$url = $_SERVER["REQUEST_URI"];
$userProfile = substr($url, strrpos($url,"=")+1);

$sqlUser="SELECT * FROM tb_users WHERE username='$userProfile'";
$resultUser=mysqli_query($connect, $sqlUser);

if (mysqli_num_rows($resultUser)) {
$dataUser=mysqli_fetch_array($resultUser);
$idProfile=$dataUser['id_users'];
$nameProfile=$dataUser['name'];
}

$postUserCount = mysqli_query($connect, "SELECT COUNT(*) as postCounts FROM tb_posts WHERE fk_user=$idProfile");
$postCount=mysqli_fetch_assoc($postUserCount);

?>
<main role="main" class="fullheight">
    
        
    <div id="feed-container">
                <div id="header-home">
                    <h2 id="title-feed"> <?php echo $nameProfile; ?> </h2> 
                    <?php echo $postCount['postCounts'];  ?> trweets
                </div>


        <div id="feed">
            <div id="feed-profile">
                    <div id='profile-avatar'>
                        <img src='img/default.png' id='img-avatar'>
                    </div>
                    <div id='header-profile'>
                       
                    </div>
                    <div id="bio-profile">
                    <?php
                 
             

                $follow = mysqli_query($connect, "SELECT COUNT(*) as followers FROM tb_follow WHERE user_on=$idProfile");
                $following = mysqli_query($connect, "SELECT COUNT(*) as followings FROM tb_follow WHERE user_following=$idProfile");
                $followResult=mysqli_fetch_assoc($follow);
                $followingResult=mysqli_fetch_assoc($following);
               
                    echo "<span class='post-name-title'>"
                        .$nameProfile."</span> <br> 
                        <span class='post-username-title'>@" 
                        .$userProfile."</span>";
                    
                     echo "<p>".
                            $followResult['followers']." Seguindo ". $followingResult['followings']." Seguidores 
                        </p>";
                        
                        mysqli_close($connect);
                    ?>
                    </div>

              
            </div>
            <section id="feed-posts">
                

                <?php
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                

                include "connect.php";
                $sql = mysqli_query($connect, "SELECT * FROM tb_posts
                left JOIN tb_follow ON tb_posts.fk_user = tb_follow.user_following
                inner join tb_users on tb_posts.fk_user = tb_users.id_users
                WHERE tb_posts.fk_user =$idProfile
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





</div>
</body>
</html>