
<?php


error_reporting(0);
include '_dbconnect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
// echo "the user name is " . $_SESSION['username'];

if(isset($_POST['journal_details'])) {

  
    $journal_details = $_POST['journal_details'];
    $journal_date = $_POST['journal_date'];

    // echo $bookmark_link;

    $byuser = $_SESSION['username'];
    
  
  
   $sql = " INSERT INTO `journal` ( `journal_details`, `journal_date`, `byuser`) VALUES ( '$journal_details', current_timestamp(),'$byuser');";
    $con->query($sql);

       // Redirect to avoid resubmission
       echo "<script>window.location.href = 'http://localhost/pms/?pg=journal';</script>";
       exit;
}


$journalsql = "SELECT * FROM journal WHERE byuser = '".$_SESSION['username']."'";
$journalresult = $con->query($journalsql);




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
    
                        <h2>journal Section 📝</h2>
                        <hr>

                        <div class="journalsection">

                        <?php while($row = $journalresult->fetch_assoc()): ?>
                            <div class="notes">
                                
                                <p>
                                    <?php echo isset($row['journal_details']) ? $row['journal_details'] : ''; ?> 
                                </p>
                                
                                <i>-<b>
                                    <?php echo isset($row['journal_date']) ? $row['journal_date'] : ''; ?>
                                </b></i>

                                
                                <div class="buttons">
                                        <button>
                                        <a id="deletebutton" href="?deletenotes=<?php echo $row['id']; ?>" >  <i class="fa-regular fa-trash-can"></i> </a>
                                        </button>
                                    </div>
                            </div>
                        <?php endwhile; ?>
                          

                        </div>

                        <div id="journalpopup" class="popup">
                            <h3>Write a Note for Today</h3>
                            <form id="journalForm" method="post" action="journal.php">
                            
                                <textarea name="journal_details" form="journalForm"  placeholder="Start typing your note here..."></textarea>
                                <button type="submit" id="addbutton" >Add</button>
                                <button type="button" id="cancleicon" onclick="closePopup(journalpopup)"><i id="plusicon" class="fa-solid fa-xmark"></i></button>
                            </form>
                        </div>

                        <button id="add" onclick="openPopup(journalpopup)"><i id="plusicon" class="fa-solid fa-plus"></i></button>

                        
</div>
<script src = "script.js"></script>