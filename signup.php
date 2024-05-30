<?php

session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    // User is logged in
    // Add your code here for logged in users
    echo "You are logged in";
    header("location: index.php");
    exit;
    
}


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

<?php include 'navbar.php'; ?>
    <div class="container">
                               

            
                        <div class="logincontainer">

                            <div class="loginwelcome">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player src="https://lottie.host/5bb20adb-57de-4c18-b60e-707c208479dc/X1lPpFlUUE.json" background="" speed="1" style="width: 500px; height: 500px" loop  autoplay direction="1" mode="normal"></lottie-player>
                            </div>

                            <div>
                            

                            <form action="signup.php" method="post" id="loginform">
                            
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
                                <select name="emoji" id="emoji" required>
                                    <option value="">Select Emoji</option>
                                    <option value="😀">😀</option>
                                    <option value="😃">😃</option>
                                    <option value="😄">😄</option>
                                    <option value="😊">😊</option>
                                    <option value="😉">😉</option>
                                    <option value="😍">😍</option>
                                    <option value="🥰">🥰</option>
                                    <option value="😘">😘</option>
                                    <option value="😎">😎</option>
                                    <option value="🤩">🤩</option>
                                </select>
                            </fieldset>
                            <button  id="signupbtn">
                                <input type="submit" value="Submit">
                            </button>
                            <br>
                            <br>
                            <p>Alredy have an account? <a href="login.php" >Login</a></p>
                            </form> 
                            </div>

                        </div>


    </div>
</body>
</html>

