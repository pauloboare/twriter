<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | twriter</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form method="post">
<input type="text" name="username" placeholder="Username" required /> <br/>
<input type="text" name="name" placeholder="Name" required /> <br/>
<input type="password" name="password" placeholder="Password" required /> <br/>
<input type="password" name="r-password" placeholder="Repeat password" required /> <br/>
<input type="submit" value="Register" />
</form> 

    <?php 
    include "connect.php";
    if(isset($_POST['username'],$_POST['name'],$_POST['password'])){
    $a=$_POST['username'];
    $b=$_POST['name'];
    $c=md5(md5($_POST['password']."#?*&#"));
    $d=md5(md5($_POST['r-password']."#?*&#"));;
        if($c==$d){
        $register="INSERT INTO tb_users VALUES (NULL,'$a', '$b', '$c')";
        $result=mysqli_query($connect, $register);
            if ($result) {
            header('location:logout.php');
            echo "Sucesseful";
        }
    }
    else {
        echo "Passwords do not match";
        }
    }

    mysqli_close($connect);
    ?>

</body>
</html>