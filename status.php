<?php include "header.php"; ?>

<main role="main" class="fullheight">
        
    <div id="feed-container">
                <div id="header-home">
                    <h2 id="title-feed">  Página Inicial </h2> 
                </div>


        <div id="feed">
                   
   
            <section id="feed-posts">
                

            <?php

include "connect.php";
$status=$_GET['status'];
$sqlStatus = mysqli_query($connect, "SELECT * FROM tb_posts
left JOIN tb_follow ON tb_posts.fk_user = tb_follow.user_following
inner join tb_users on tb_posts.fk_user = tb_users.id_users
WHERE tb_posts.timestamp = $status
AND tb_users.activated='activated'
GROUP BY id_posts
ORDER BY datatime DESC");

while ($resultStatus=mysqli_fetch_array($sqlStatus)) {
                   
    $dataStart = $resultStatus['datatime'];
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
        $date = $resultStatus['datatime'];
        $crhonology=strftime('%d de %b', strtotime( $date ));
        $typeTime="";
    }

    echo "<article id='posts'>
    <div id='user-avatar'>
    <a href='".$resultStatus['username']."'> <img src='img/".$resultStatus['avatar']."' class='img-avatar'> </a>
    </div>
    <div id='post-single'> <a href='".$resultStatus['username']."' class='post-name-title'>"
    .$resultStatus['name']."</a> <a href='".$resultStatus['username']."' class='post-username-title'> @"
    .$resultStatus['username']."</a> - <span class='post-chronology-title'> <a href=status.php?status="
    .$resultStatus['timestamp'].">".$crhonology. " ".$typeTime. "</a></span><br>"
    .$resultStatus['post'].
    "</div>
    </article>";
}
mysqli_close($connect);
?>
                
            </section>
        </div>
    </div>

    <?php include "sidebar.php"; ?>
    
</main>

<?php include "footer.php"; ?>