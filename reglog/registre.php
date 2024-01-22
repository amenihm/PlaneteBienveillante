<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate=mysqli_query($conn,"SELECT * from tab_user where username='$username'or email='$email'");
if(mysqli_num_rows($duplicate)>0){
    echo
    "<script> alert('Username or Email has already taken ');</script>";
}
else{
    if($password == $confirmpassword){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hasher le mot de passe

        $query = "INSERT INTO tab_user (name, username, email, password) VALUES ('$name', '$username', '$email', '$hashedPassword')";
        mysqli_query($conn, $query);

        echo "<script> alert('Registration successfully');</script>";
    } else {
        echo "<script> alert('Password does not match');</script>";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regstration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container">
        <div class="form-box">
            <h1 id="title">S'inscrire</h1>
            <form method="post" autocomplete="off">
                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user" style="color: #15b23c;"></i>
                        <input type="text" name="name" id="name"placeholder="Nom">
                    </div>
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user" style="color: #15b23c;"></i>
                        <input type="text" name="username" id="username"placeholder="prenom">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope" style="color: #15b23c;"></i>
                        <input type="email" id="email"name="email" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock" style=" color: #15b23c; "></i>
                        <input type="password" id="password"name="password" placeholder="Mot de passe">
                        <br><br>
                        <i class="fa-solid fa-eye" style="color: #297613;" id="afficherMotDePasse" onclick="togglePassword()"></i>

                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock" style=" color: #15b23c; "></i>
                        <input type="password" id="confirmpassword"name="confirmpassword" placeholder="Confirm Mot de passe">
                    </div>
                    <p>Mot de passe oublié <a href="">Clicker ici!</a></p>
                </div>
                <div class="btn-field">
                    <button type="submit" name="submit" >Registre</button>
                    <a href="login.php" class="button-link">login</a>

                </div>

            </form>
        </div>
    </div>
    <br>
</body>
</html>