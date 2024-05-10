<?php


// session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// }

error_reporting(0);
include '_dbconnect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
// echo "the user name is " . $_SESSION['username'];

if(isset($_POST['health_title'])) {
    $health_title = $_POST['health_title'];
  
    $health_details = $_POST['health_details'];
    // echo $bookmark_link;

    $byuser = $_SESSION['username'];
    
  
   $sql = "INSERT INTO `health` ( `health_title`, `byuser`, `health_details`) VALUES ('$health_title', '$byuser', ' $health_details ');";//    $sql = "INSERT INTO `health` ( `health_title`, `byuser`, `health_details`) VALUES ('$health_title', '$byuser', '- go to clinic\r\n- go to medical store\r\n- check up of eye on sunday\r\n');"

    $con->query($sql);

       // Redirect to avoid resubmission
       echo "<script>window.location.href = 'http://localhost/pms/?pg=health';</script>";
       exit;
}


$healthsql = "SELECT * FROM health WHERE byuser = '".$_SESSION['username']."'";
$healthesult = $con->query($healthsql);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<div class="task" id="task">
    
                        <h2>Health Section 🍎</h2>
                        <hr>

                        <div class="healthsection">

                            <!-- <div class="shortbox">
                                <h3>Medical History</h3>
                                <p>- dentist checku</p>
                                <p>- got cought and cold</p>
                                <p>- had hedace</p>

                                <div class="buttons">
                                    <button>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button>
                                    <a id="deletebutton" href="?deletehealthbox=<?php echo $row['id']; ?>" >  <i class="fa-regular fa-trash-can"></i> </a>
                                    </button>
                                </div>
                            </div> -->

                            <?php while($row = $healthesult->fetch_assoc()): ?>

                                <div class="shortbox">
                                <h3><?php echo isset($row['health_title']) ? $row['health_title'] : ''; ?></h3>
                                    <?php echo isset($row['health_details']) ? $row['health_details'] : ''; ?>

                                    <div class="buttons">
                                        <!-- <button>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button> -->
                                        <button id="deletebuttons">
                                        <a  href="?deletehealthbox=<?php echo $row['id']; ?>" >  <i class="fa-regular fa-trash-can"></i> </a>
                                        </button>
                                    </div>
                                </div>

                            <?php endwhile; ?>


<!-- 
    
                            <div class="shortbox">
                                <h3>Medical History</h3>
                                <p>- dentist checku</p>
                                <p>- got cought and cold</p>
                                <p>- had hedace</p>
    
                            </div> -->

                        </div>

                        <div id="healthpopup" class="popup">
                            <h3>Add in Health Section</h3>
                            <form id="healthForm" method="post" action="health.php">
                                <input type="text" name="health_title" placeholder="Enter Title"/>
                                <!-- <input type="textbox" name="details" placeholder="Enter Description"/> -->
                                <textarea name="health_details" form="healthForm"  placeholder="Enter Details"></textarea>
                                <button type="submit" id="addbutton" >Add</button>
                                <button type="button" id="cancleicon" onclick="closePopup(healthpopup)"><i id="plusicon" class="fa-solid fa-xmark"></i></button>
                            </form>
                        </div>

                        <button id="add" onclick="openPopup(healthpopup)"><i id="plusicon" class="fa-solid fa-plus"></i></button>

                        
</div>
<script src = "script.js"></script>

</body>
</html>