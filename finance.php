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

if(isset($_POST['amount'])) {

    $total = $_POST['total'];
    $amount = $_POST['amount'];
    $ie = $_POST['gender'];
    $note = $_POST['note'];
    $byuser = $_SESSION['username'];

    if($ie == 'income'){
        $total = $total + $amount;
     
    }
    else{
        $total = $total - $amount;
       
    }
    
  
   $sql = "INSERT INTO `finance` ( `total`, `amount`, `ie`, `note`, `byuser`, `date`) VALUES ( '$total', '$amount', '$ie', '$note', '$byuser', current_timestamp());";

    $con->query($sql);

    //    Redirect to avoid resubmission
       echo "<script>window.location.href = 'http://localhost/pms/?pg=finance';</script>";
       exit;



}

$gettotal = "SELECT  total FROM finance WHERE byuser = '".$_SESSION['username']."'  ORDER BY id DESC LIMIT 1";
$totalresult = $con->query($gettotal);
$total = $totalresult->fetch_assoc()['total'];



$financesql = "SELECT * FROM finance WHERE byuser = '".$_SESSION['username']."'";
$financeresult = $con->query($financesql);






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
    
</body>
</html>
<div class="task" id="task">
    
                        <h2>Finance Section 💸  |  <i>Total Balance </i> <?php echo $total ?></h2>
                        <hr>

                        <div class="financesection">

                            <!-- <div class="topbars">
                                <div>
                                    <h4>
                                        Income 📈
                                    </h4>
                                    <h2>
                                        $ 1500 
                                    </h2>

                                </div>
                            </div>

                            <div class="topbars">
                                <div>
                                    <h4>
                                        Expense 📉
                                    </h4>
                                    <h2>
                                        $ 400 
                                    </h2>

                                </div>
                            </div> -->

                            <!-- <div class="topbars">
                                <div>
                                    <h4>
                                        Total 💰
                                    </h4>
                                    <h2>
                                    
                                    </h2>

                                </div>
                            </div> -->




                        </div>

                        
                        <?php 
                            while($row = $financeresult->fetch_assoc()):
                                
                                if($row['ie'] == 'income'){
                                    $notecolor = '#79ea86';
                                }
                                else{
                                    $notecolor = '#e75757';
                                }
                            
                                echo "<div class='notes' style='background-color:". $notecolor ." '>";
                                echo "<div class='ienumber' > ";
                                echo "<h1>" . $row['amount'] . "</h1>";
                                echo "<h3 >" . $row['ie'] . "</h3>";
                                echo "</div>";
                                echo "<div class='ienote'>";
                                echo "<p>" . $row['note'] . "</p>";
                                echo "</div>";
                                echo "<i id='dateoffinancenote'>" . $row['date'] . "</i>";

                                ?>        
                                <div class="buttons">
                                        <button>
                                        <a id="deletebutton" href="?deletefinance=<?php echo $row['id']; ?>" >  <i class="fa-regular fa-trash-can"></i> </a>
                                        </button>
                                    </div>

                                    <?php

                                echo "</div>";

                         
                                
                            endwhile; 
                                 
                            ?>
                       
                        <div id="financepopup" class="popup">
                            <h3>Total Balance : <?php echo $total ?></h3>
                            <form id="financeForm" method="post" action="finance.php">
                            
                            <?php
                            // if ($totalresult->num_rows > 0) {
                             
                            //     // while($row = $totalresult->fetch_assoc()) {
                            //     //     echo "total: " . $row["total"]. "<br>";
                            //     // }
                            //    echo  " ";
                            // } else {
                            //    echo "<input type='number' name='total' placeholder='Enter Total'/>";
                            // }
                            
                            ?>

                            <?php
                                        if ($total == 0) {
                                            echo "<input type='number' name='total' placeholder='Enter Total'/>";
                                        }
                                        else {
                                            echo "<input type='number' name='total' value='$total' readonly/>";
                                        }
                            ?>
                            <input type="number" name="amount" placeholder="Enter Amount"/>
                          
                            <fieldset>
                            <legend>Choose:</legend>
                                <label for="income">Income</label>
                                <input type="radio" name="gender" id="income" value="income" checked>
                                <label for="expense">Expense</label>
                                <input type="radio" name="gender" id="expense" value="expense">
                            </fieldset>

                            <input type="text" name="note" placeholder="Enter Note"/>
                                
                                <button type="submit" id="addbutton" >Add</button>
                                <button type="button" id="cancleicon" onclick="closePopup(financepopup)"><i id="plusicon" class="fa-solid fa-xmark"></i></button>
                            </form>
                        </div>

                        <button id="add" onclick="openPopup(financepopup)"><i id="plusicon" class="fa-solid fa-plus"></i></button>


                        
</div>
<script src = "script.js"></script>