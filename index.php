<?php

http_response_code(404);
include('404.php'); 
die();
header("Location: home");
 
     
 mysqli_close($connect);      
		
?>
