<?php

if($_SERVER['REQUEST_METHOD'] ==='POST'){
   
    include '_dbconnect.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
     $password = $_POST['password'];
     $emoji = $_POST['emoji'];
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` ( `username`, `email`, `password`, `emoji`) VALUES ( '$username', '$email', '$password',' $emoji')";

    $result = mysqli_query($con, $sql);

    if($result){
        echo "The record has been inserted successfully!<br>";
        $user = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['emoji'] = $emoji;
        $_SESSION['username'] = $username;
        header("location: index.php");
    }
    else{
        echo "The record was not inserted successfully because of this error ---> ". mysqli_error($con);
    }

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meowgram</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
            <form action="signup.php" method="post">
           
            <fieldset>
                <legend>Name</legend>
                <input type="text" name="username" placeholder="Enter Name" id="username" required>
            </fieldset>

            <fieldset>
                <legend>Email</legend>
                <input type="email" name="email" placeholder="Enter Email" id="email" required>
            </fieldset>

            <fieldset>
                <legend>Password</legend>
                <input type="password" name="password" placeholder="Enter Password" id="password" required>
            </fieldset>

            <fieldset>
                <legend>Emoji</legend>
                <input type="text" name="emoji" placeholder="Enter Emoji" id="emoji" required>
            </fieldset>
            <button>
                <input type="submit" value="Submit">
            </button>
            <br>
            <br>
            <p>Alredy have an account? <a href="login.php" >Login</a></p>
            </form> 
    </div>
</body>
</html>

