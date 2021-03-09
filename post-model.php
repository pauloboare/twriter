 <?php
                
                $userSession=$_SESSION['id-user'];

                include "connect.php";
if((basename($_SERVER['PHP_SELF'],'.php')=='home') AND (!isset($_GET['search']))){
                $sql = mysqli_query($connect, "SELECT * FROM tb_posts
                left JOIN tb_follow ON tb_posts.fk_user = tb_follow.user_following
                inner join tb_users on tb_posts.fk_user = tb_users.id_users
                WHERE tb_follow.user_on=$userSession
                OR tb_posts.fk_user =$userSession
                GROUP BY id_posts
                ORDER BY datatime DESC");
}

else {
    $sql = mysqli_query($connect, "SELECT * FROM tb_posts
    left JOIN tb_follow ON tb_posts.fk_user = tb_follow.user_following
    inner join tb_users on tb_posts.fk_user = tb_users.id_users
    WHERE tb_posts.fk_user=$idProfile
    GROUP BY id_posts
    ORDER BY datatime DESC");
}

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
                    <a href='".$result['username']."'><img src=img/".$result['avatar']." class='img-avatar'></a>
                    </div>
                    <div id='post-single'> <a href='".$result['username']."' class='post-name-title'>".
                    $result['name']."</a> <a href='".$result['username']."' class='post-username-title'> @".$result['username']."</a> - <span class='post-chronology-title'> <a href=status.php?status=".$result['timestamp'].">".$crhonology. " ".$typeTime. "</a></span><br>".
                    $result['post'].
                    "</div>
                    </article>";
                }
                mysqli_close($connect);
                ?>