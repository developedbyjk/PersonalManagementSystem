<?php
    $user=false;
    $showerror = false;
 
if($_SERVER['REQUEST_METHOD'] ==='POST'){
   
    include '_dbconnect.php';

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
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">
<body>

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
            Welcome Back!
            </div>

            <div>
            <form action="login.php" method="post" id="loginform">
                
                                        <fieldset>
                                            <legend>Username</legend>
                                            <input type="text" name="username" placeholder="Enter Name" id="username" required>
                                        </fieldset>
                            
                                        <fieldset>
                                            <legend>Password</legend>
                                            <input type="password" name="password" placeholder="Enter Password" id="password" required>
                                        </fieldset>
                                        <button>
                                            <input type="submit" value="Submit">
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