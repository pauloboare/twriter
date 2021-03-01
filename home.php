<?php include "header.php";


?>


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





</div>
</body>
</html>