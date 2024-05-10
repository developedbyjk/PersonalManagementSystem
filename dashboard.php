<?php

// echo "Welcome to the dashboard";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="task" id="task">
            
            <!-- <h2>journal Section 📝</h2>
            h1
    
            <hr> -->

            <h1 id="welcomemsg" >Welcom <?php echo $_SESSION['username'] ?></h1>

            <div class="dashboard">
                

           
                <div class="blocks taskblock ">
                    <a href="?pg=task" id="blocklinks">
                                <h3><i class="fa-solid fa-square-check"></i></h3>
                                <p>To do</p>
                    </a>
                </div>
         

            
          
                <div class="blocks healthblock">
                    <a href="?pg=health" id="blocklinks">
                                <h3><i class="fa-solid fa-heart"></i></h3>
                                <p>Health</p>
                    </a>
                </div>


                          
                <div class="blocks financeblock">
                    <a href="?pg=finance" id="blocklinks">
                                <h3><i class="fa-solid fa-sack-dollar"></i></h3>
                                <p>Finance</p>
                    </a>
                </div>
         

            
          
                <div class="blocks journalblock">
                    <a href="?pg=journal" id="blocklinks">
                                <h3><i class="fa-solid fa-note-sticky"></i></h3>
                                <p>Journal</p>
                    </a>
                </div>


                          
                <div class="blocks profileblock">
                    <a href="?pg=profile" id="blocklinks">
                                <h3><i class="fa-solid fa-user"></i></h3>
                                <p>Profile</p>
                    </a>
                </div>


                <div class="blocks dashboardblock">
                    <a href="?pg=dashboard" id="blocklinks">
                                <h3><i class="fa-solid fa-house-user"></i></h3>
                                <p>Home</p>
                    </a>
                </div>

            </div>


        </div>

        <div class="feedback">
            <h3><a href="?pg=feedback">Please Leave Feedback Here</a></h3>
        </div>
</body> 
</html>