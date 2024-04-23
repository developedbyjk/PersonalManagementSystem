<?php


$financesql = "SELECT emoji FROM users WHERE username = '".$_SESSION['username']."'";
$financeresult = $con->query($financesql);
$emoji = $financeresult->fetch_assoc()['emoji'];


?>

<div class="col1">
                    <div class="page">

                        <div class="box">
                            <a  href="/pms">Task 🔥</a>
                        </div>
    
                        <div class="box">
                            <a  href="?pg=health">Health 🍎</a>
                        </div>

                        <div class="box">
                            <a href="?pg=finance">Finance 💸</a>
                        </div>

                        <div class="box">
                            <a href="?pg=journal">Journal 📝</a>
                        </div>

                        <div class="box">
                            <!-- <a href="?pg=study">Study ✍️</a> -->
                            <h4>
                            <a href="?pg=profile">
                               
                            <!-- <i class="fa-regular fa-circle-user"></i> -->
                            <?php
                                 echo $_SESSION['username'] . " ". $emoji;
                                ?>
                            </h4>
                            </a>
                        </div>

          
                        <div class="box">
                        <form action="logout.php" method="post">
                       
                        <input type="submit" value="Logout">
                        
                        </form>
                        </div>
                    </div>
                </div>