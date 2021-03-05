<?php include "header.php";


?>


<main role="main" class="fullheight">
    
        
    <div id="feed-container">
                <div id="header-home">
                    <h2 id="title-feed">  Página Inicial </h2> 
                </div>


        <div id="feed">
           
                    <?php include "form-post.php"; ?>      
   
            <section id="feed-posts">
                

               <?php include "post-model.php"; ?>
                
            </section>
        </div>
    </div>

    <?php include "sidebar.php"; ?>
    
</main>




<?php include "footer.php"; ?>