<?php

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
   
// }
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    // User is logged in
    // Add your code here for logged in users
    echo "You are logged in";
    header("location: index.php");
    exit;
    
}



    $user=false;
    $showerror = false;
 
if($_SERVER['REQUEST_METHOD'] ==='POST'){
   
    include '_dbconnect.php';

    $shownoauth = false;

    $username = $_POST['username'];
    $password = $_POST['password'];



    
    $sql = "select * from users where username = '$username' and password ='$password'";
    // $sql = "Select * from 'signup' where email = '$email' and pass ='$password'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);

    
    if($num==1){
     
        // echo "<br> Data inserted";
        $user = true;
        session_start();
        $_SESSION['loggedin']= true;
        $_SESSION['username']=$username;
        header("location:index.php");
    }
    else{
        $error = "INVALID CRENDITALS";
        $showerror = true;
        
    }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
<?php include 'navbar.php'; ?>

<?php
if($user){
    echo" <span style='background-color:crimson;color:white;z-index:9999'>You Successfully logged in 😁</span>";
}

if($showerror){
    echo "<br/>";
    echo"<span style='background-color:crimson;color:white;z-index:9999'>Error😢' .$error.'</span>";
}


?>
<div class="container">

        <div class="logincontainer">

            <div class="loginwelcome">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://lottie.host/f88d7758-9d77-4502-bc61-145a6954f140/LYmDJ1xGaS.json" background="##FFFFFF" speed="1" style="width: 400px; height: 400px" loop  autoplay direction="1" mode="normal"></lottie-player>
            </div>

            <div>
            <form action="login.php" method="post" id="loginform">
                
                                        <fieldset>
                                            <legend>Username</legend>
                                            <input type="text" name="username" placeholder="Enter Name" id="username" required>
                                        </fieldset>
                            <br>
                                        <fieldset>
                                            <legend>Password</legend>
                                            <input type="password" name="password" placeholder="Enter Password" id="password" required>
                                        </fieldset>
                            <br>
                                        <button id="loginbtn">
                                            <input type="submit" value="Submit" >
                                        </button>
                                        <br>
                                        <br>
                                        
                                        <p>Dont have an account? <a href="signup.php" >Sign up</a></p>
            </form>
            </div>
            
        </div>
 



</div>




</body>
</html>