<?php
require 'config.php';;
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result=mysqli_query($conn,"SELECT * from tab_user where username='$usernameemail'or email='$usernameemail'");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($password == $row["password"]){
           $_SESSION["login"]=true;
           $_SESSION["id"]=$row["id"];
           header("Location: aff.php");
        }
    else{
        echo
        "<script> alert('Wrong Password ');</script>";
    }
    }
    else{
        echo
        "<script> alert('User not registered ');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <form method="post" autocomplete="off"ation="aff.php">
                <div class="input-group">
                 
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user" style="color: #15b23c;"></i>
                        <input type="text" name="usernameemail" id="usernameemail"placeholder="Username or Email"required>
                    </div>
                  
                    <div class="input-field">
                        <i class="fa-solid fa-lock" style=" color: #15b23c; "></i>
                        <input type="password" id="password"name="password" placeholder="Mot de passe">
                        <br><br>
                    </div>
                  
                <div class="btn-field">
                    <button type="submit" name="submit" >Login</button>
                    <a href="registre.php" class="button-link">Registration</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>