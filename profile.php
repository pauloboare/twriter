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
                    <a href=<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "home"; ?>> 
                    <span class="material-icons">keyboard_backspace</span></a> <?php echo $nameProfile; ?> 
                    </h2> 

                    <?php echo $postCount['postCounts'];  ?> twreets

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