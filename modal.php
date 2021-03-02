<!-- Modal HTML embedded directly into document -->
<div id="ex1" class="modal">
  <p><?php 
  if(isset($_POST["btn-post"])){
     include "form-post.php";
     } ?></p>
</div>

<!-- Link to open the modal -->
<p><button id="btn-post"><a href="#ex1" rel="modal:open">Twreetar</a></button></p>