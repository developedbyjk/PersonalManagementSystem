<?php

// session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// }


include '_dbconnect.php';


$sql = "SELECT * FROM users";
$result  = mysqli_query($con, $sql);

if($result){
    echo "The query is executed successfully";
}
else{
    echo "The query is not executed successfully";
}


if(isset($_GET['deleteuser'])) {
    $id = $_GET['deleteuser'];
    // $sql = "UPDATE todos SET completed=1 WHERE id=$id";
    $sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
    $con->query($sql);

       // Redirect to avoid resubmission
       echo "<script>window.location.href = 'http://localhost/pms/myadmin.php';</script>";
       exit;
}


$feedbacksql = "SELECT * FROM feedback";
$feedbackresult = $con->query($feedbacksql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="adminbody">
    

<div class="admindataholder">
<br>
<br>
<h1>USERS 👤</h1>
<br>
<br>

<?php
while($row = $result->fetch_assoc()):
?>

            <div class="admindata">

                    <div>
                    <h1><?php echo $row['emoji'] ?></h1> 
                    </div> 

                    <div>  
                        <h3><?php echo $row['username'] ?></h3>
                        <p><?php echo $row['email'] ?></p>
                    </div>

                    <div id="admindeletebtn">
                        <a href="?deleteuser=<?php echo $row['id']; ?>">Delete</a>
                    </div>
            </div>

<?php endwhile; ?>

<br>
<br>
<h1>FEEDBACK ✍️</h1>
<br>
<br>
<?php
 while($row = $feedbackresult->fetch_assoc()):
?>
<div class="feedback-container">

                        <div>
                                   
                                        <div class="feedback-section">
                                            <h3>✨Overall Experience </h3>
                                            <p><?php echo $row['overall_experience'] ?></p>
                                        </div>
                                        <div class="feedback-section">
                                            <h3>🖥️User Interface </h3>
                                            <p><?php echo $row['user_interface'] ?></p>
                                        </div>
                                        <div class="feedback-section">
                                            <h3>🌟Features</h3>
                                            <p><?php echo $row['features'] ?></p>
                                        </div>
                                        <div class="feedback-section">
                                            <h3>🧩Improvements </h3>
                                            <p><?php echo $row['improvements'] ?></p>
                                        </div>
                        </div>

                        <div>

                                    <div class="feedback-section">
                                        <h3>🛠️Bugs/Issues </h3>
                                        <p><?php echo $row['bugs_issues'] ?></p>
                                    </div>
                                    <div class="feedback-section">
                                        <h3>🤔Suggestions </h3>
                                        <p><?php echo $row['suggestions'] ?></p>
                                    </div>
                                    <div class="feedback-section">
                                        <h3>🎀Recommendation </h3>
                                        <p><?php echo $row['recommendation'] ?></p>
                                    </div>
                                    <div class="feedback-section">
                                        <h3>📜Additional Comments </h3>
                                        <p><?php echo $row['additional_comments'] ?></p>
                                    </div>

                        </div>

            <div class="feedbackusername">
                <h3> 👤By User</h3>
                <p><?php echo $row['byuser'] ?></p>
            </div>

    </div>

<?php endwhile; ?>
            
</div>



                                <form action="logout.php" method="post">
                                
                                    <input  id="adminlogoutbtn" type="submit" value="Logout 🌃">
                                
                                
                                </form>

</body>
</html>