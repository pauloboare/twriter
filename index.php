<?php include "header.php"; ?>
<main role="main" class="fullheight">
    
        
    <div id="feed-container">
                <div id="header-home">
                    <h2 id="title-feed"> Página Inicial </h2> 
                </div>


        <div id="feed">
            <div id="feed-form">
                <form method="post">
                    <textarea name="post"></textarea>
                    <div class="twreetar">
                        <input type="submit" value="Twreetar">
                    </div>
                    <?php 
                    include "connect.php";
                    include "session.php";
                    if(isset($_POST['post'])){
                    $a=$_SESSION['id-user'];
                    $b=$_POST['post'];
                    $sql="INSERT INTO tb_posts VALUES (NULL, $a,'$b', '')";
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
                <article class="posts">

                <?php
                include "connect.php";
                $sql = mysqli_query($connect, "SELECT * FROM tb_posts INNER JOIN tb_users ON tb_posts.fk_user = tb_users.id_users");
                while ($result=mysqli_fetch_array($sql)) {
                    echo "@".$result['username']." | ".$result['name'] ;
                    echo "<br>";
                    echo $result['post'];
                    echo "<hr>";
                }
                ?>



                </article>
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