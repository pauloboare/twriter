<?php include "header.php";

include "connect.php";
$url = $_SERVER["REQUEST_URI"];
//$userProfile = substr($url, strrpos($url,"?")+1);
if(empty($_GET)){
    http_response_code(404);
    include('404.php'); 
    die();}
else {
    $userProfile=$_GET['userurl'];
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

$postUserCount = mysqli_query($connect, "SELECT COUNT(*) as postCounts FROM tb_posts WHERE fk_user=$idProfile");
$postCount=mysqli_fetch_assoc($postUserCount);

?>
<main role="main" class="fullheight">
    
        
    <div id="feed-container">
                <div id="header-home">

                    <h2 id="title-feed">
                    <a href="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "home";?>"> 
                    <span class="material-icons">keyboard_backspace</span></a> <?php echo $nameProfile;?>
                    </h2> 

                    <?php echo $postCount['postCounts'];?>
                    twreets

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
                        if( $idProfile == $_SESSION['id-user'] ){
                            echo "<form method=post>
                            <button> Editar Perfil </button>
                            </form>";
                        }
                        elseif( mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_follow 
                        WHERE user_on=".$_SESSION['id-user']. " AND user_following=".$idProfile )) === 0){
                        echo    "<form method=post action=".$userProfile.">
                                <button name='btn-follow'> Seguir </button>
                                </form>";
                               
                                if(isset($_POST['btn-follow'])){
                                $sql="INSERT INTO tb_follow VALUES (NULL, ".$_SESSION['id-user'].",".$idProfile.")";
                                $resultF=mysqli_query($connect, $sql);
                                    if ($resultF) {
                                       echo "<meta HTTP-EQUIV='refresh' CONTENT='0.1;URL=".$userProfile."'>";
                                     }
                                    }
                                }
                                 elseif( mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_follow 
                                WHERE user_on=".$_SESSION['id-user']. " AND user_following=".$idProfile )) > 0){
                                echo    "<form method=post action=".$userProfile.">
                                <button name='btn-follow'> Deixar de seguir </button>
                                </form>";
                                
                                if(isset($_POST['btn-follow'])){
                                $sql="DELETE FROM tb_follow WHERE user_on=".$_SESSION['id-user']. " AND user_following=$idProfile";
                                $resultD=mysqli_query($connect, $sql);
                                    if ($resultD) {
                                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0.1;URL=".$userProfile."'>";
                                        }
                                    }
                                }
                        
                    
                     echo "<p> <a href='follower.php?userfollow=$userProfile'>".
                            $followResult['followers']." Seguindo </a> 
                            <a href='following.php?userfollow=".$userProfile."/following'>".
                            $followingResult['followings']." Seguidores ". 
                            "</a>
                        </p>";
                        
                        mysqli_close($connect);
                    ?>
                    </div>

              
            </div>
            <section id="feed-posts">
                

            <?php include "post-model.php"; ?>


                
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