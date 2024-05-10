<?php


$financesql = "SELECT emoji FROM users WHERE username = '".$_SESSION['username']."'";
$financeresult = $con->query($financesql);
$emoji = $financeresult->fetch_assoc()['emoji'];

//get the pg value

$pg = isset($_GET['pg']) ? $_GET['pg'] : '';

// Function to check if a particular page is active
function isActive($page) {
    global $pg;
    return ($pg == $page) ? 'active' : '';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS</title>
</head>
<body>
    



<div class="col1">
                    <div class="page">


                            <a  href="?pg=dashboard" id="boxlink">
                                <div class="box <?php echo isActive('dashboard'); ?>"  >
                                Home 🏠
                                </div>
                            </a>
                        
                            <a  href="?pg=task" id="boxlink">
                                <div class="box <?php echo isActive('task'); ?>"  >
                                Task 🔥
                                </div>
                            </a>
                       
    
                       
                            <a  href="?pg=health" id="boxlink">
                            <div class="box <?php echo isActive('health'); ?> "> Health 🍎</div>
                            </a>
                        

                     
                            <a href="?pg=finance" id="boxlink">
                            <div class="box  <?php echo isActive('finance'); ?>" > Finance 💸 </div>
                            </a>
                       

                       
                            <a href="?pg=journal" id="boxlink">
                            <div class="box <?php echo isActive('journal'); ?> ">  Journal 📝</div>
                            </a>
                        

                        <div class="box <?php echo isActive('profile'); ?>">
                            <!-- <a href="?pg=study">Study ✍️</a> -->
                            <h4>
                            <a href="?pg=profile" id="boxlink">
                               
                           
                            <?php
                                 echo $_SESSION['username'] . " ". $emoji;
                                ?>
                            </h4>

                            </a>
                        </div>

          
                        <!-- <div class="box">
                        <form action="logout.php" method="post">
                       
                        <input type="submit" value="Logout">
                        
                        </form>
                        </div> -->
                    </div>
                </div>


                </body>
</html>