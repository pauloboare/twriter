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
                                        <input type="submit" id="btn-post" value="Twreetar" onClick='window.location.reload()'>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            include "connect.php";
                           
                            if(isset($_POST['post'])){
                            $a=$_SESSION['id-user'];
                            $b=$_POST['post'];
                            $sql="INSERT INTO tb_posts (id_posts, fk_user, post, datatime) VALUES (NULL, '$a','$b', NOW())";
                                if (mysqli_query($connect, $sql)): endif;
                            }
                            mysqli_close ($connect);
                            ?>
                            </form>
                    </div>
</div>