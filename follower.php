<?php 
include "header.php";

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

           $url = $_SERVER["REQUEST_URI"];
           //$userProfile = substr($url, strrpos($url,"?")+1);
           if(empty($_GET)){
               http_response_code(404);
               include('404.php'); 
               die();}
           else {
               $userProfile=$_GET['userfollow'];
           }
           $sqlUser="SELECT * FROM tb_users WHERE username='$userProfile'";
           $resultUser=mysqli_query($connect, $sqlUser);
           
           if (mysqli_num_rows($resultUser)) {
           $dataUser=mysqli_fetch_array($resultUser);
           $idProfile=$dataUser['id_users'];
           $nameProfile=$dataUser['name'];
           }
           else {
               http_response_code(404);
               include('404.php'); 
               die();
           }
           

           $sqlFollower = mysqli_query($connect, "SELECT * FROM tb_follow
           left join tb_users on tb_follow.user_following = tb_users.id_users 
           WHERE tb_follow.user_on=$idProfile
           AND tb_users.activated='activated'");


while ($result=mysqli_fetch_array($sqlFollower)) {
    echo "<article id='posts'>
    <div id='user-avatar'>
    <a href='".$result['username']."'><img src='img/".$result['avatar']."' class='img-avatar'></a>
    </div>
    <div id='post-single'> <a href='".$result['username']."' class='post-name-title'>".
    $result['name']."</a> <a href='".$result['username']."' class='post-username-title'> @".$result['username']."</a>
    
    
    <span class='post-name-title'>";
    if( $result['id_users'] == $_SESSION['id-user'] ){
        echo "";
    }
    elseif( mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_follow 
    WHERE user_on=".$_SESSION['id-user']. " AND user_following=".$result['user_following'] )) === 0){
    echo    "<form method=post>
            <button name='btn-follow'> Seguir </button>
            </form>";
           
            if(isset($_POST['btn-follow'])){
            $sql="INSERT INTO tb_follow VALUES (NULL, ".$_SESSION['id-user'].", ".$result['user_following'].")";
            $resultF=mysqli_query($connect, $sql);
                if ($resultF) {
               // echo "<meta HTTP-EQUIV='refresh' CONTENT='0.1';URL=follower?userfollow=".$userProfile.">";
                 }
                }
            }
             elseif( mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_follow 
            WHERE user_on=".$_SESSION['id-user']. " AND user_following=".$result['user_following'] )) > 0){
            echo    "<form method=post>
            <button name='btn-follow'> Deixar de seguir </button>
            </form>";
            
            if(isset($_POST['btn-follow'])){
            $sql="DELETE FROM tb_follow WHERE user_on=".$_SESSION['id-user']. " AND user_following=".$result['user_following'];
            $resultD=mysqli_query($connect, $sql);
                if ($resultD) {
            //  echo "<meta HTTP-EQUIV='refresh' CONTENT='0.1';URL=follower?userfollow=".$userProfile.">";
                    }
                }
            }

    echo "</span></div></article>";
}

mysqli_close($connect);
?>
                
            </section>
        </div>
    </div>

    <<?php include "sidebar.php"; ?>

</main>




<?php include "footer.php"; ?>