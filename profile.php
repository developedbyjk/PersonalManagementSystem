<?php
error_reporting(0);
include '_dbconnect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


?>

<div class="task" id="task">
    
                        <h2>Profile Section 👤</h2>
                        <hr>

                        <div class="profilesection">

                            <!-- <div class="profilepic">🍰</div>
                            <div class="profilename">Lala</div>
                            <div class="profileemail">lala@gmail.com</div> -->

                            <div class="profilepic">
                                <?php
                           echo $_SESSION['emoji']
                            ?>
                            </div>
                            <div class="profilename"><?php echo $_SESSION['username'] ?></div>
                            <div class="profileemail"><?php echo $_SESSION['email'] ?></div>

                        </div>
</div>