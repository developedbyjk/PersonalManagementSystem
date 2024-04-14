<?php


session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


include '_dbconnect.php';

date_default_timezone_set('Asia/Kolkata');
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Add new todo item
if(isset($_POST['task'])) {
    $task = $_POST['task'];
    $byuser = $_SESSION['username'];
    $sql = "INSERT INTO todos (task, completed, byuser) VALUES ('$task', 0, '$byuser')";
    echo $sql;
    $con->query($sql);

       // Redirect to avoid resubmission
       header("Location: " . $_SERVER['PHP_SELF']);
       exit;
}

if(isset($_POST['bookmark_title'])) {
    $bookmark_title = $_POST['bookmark_title'];
    echo $bookmark_title;
    $bookmark_link = $_POST['bookmark_link'];
    // echo $bookmark_link;

    $byuser = $_SESSION['username'];
    // $sql = "INSERT INTO `bookmarks` ( `bookmark_title`, `bookmark_link` `byuser`,) VALUES ( '$bookmark_title', '$bookmark_link', '$byuser');";
   $sql =  "INSERT INTO `bookmarks` ( `bookmark_title`, `bookmark_link`, `byuser`) VALUES ( '$bookmark_title', '$bookmark_link', '$byuser');";

    $con->query($sql);

       // Redirect to avoid resubmission
       header("Location: " . $_SERVER['PHP_SELF']);
       exit;
}



// Mark todo item as completed
if(isset($_GET['complete'])) {
    $id = $_GET['complete'];
    $sql = "UPDATE todos SET completed=1 WHERE id=$id";
    $con->query($sql);

       // Redirect to avoid resubmission
       header("Location: " . $_SERVER['PHP_SELF']);
       exit;
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    echo "<script>
            if(confirm('Are you sure you want to delete with ID number $id?')) {
            }
        </script>";

    // $sql = "UPDATE todos SET completed=1 WHERE id=$id";
    $sql = "DELETE FROM `todos` WHERE `todos`.`id` = $id";
    $con->query($sql);

       // Redirect to avoid resubmission
       header("Location: " . $_SERVER['PHP_SELF']);
       exit;
}

if(isset($_GET['deletebookmarid'])) {
    $id = $_GET['deletebookmarid'];
    // $sql = "UPDATE todos SET completed=1 WHERE id=$id";
    $sql = "DELETE FROM `bookmarks` WHERE `bookmarks`.`id` = $id";
    $con->query($sql);

       // Redirect to avoid resubmission
       header("Location: " . $_SERVER['PHP_SELF']);
       exit;
}
// $renderpage = 'col2';
$renderpage = 'col2';

if(isset($_GET['pg'])) {
    $id = $_GET['pg'];
    // $sql = "UPDATE todos SET completed=1 WHERE id=$id";
    $renderpage = $id;
    // $sql = "DELETE FROM `bookmarks` WHERE `bookmarks`.`id` = $id";
    // $con->query($sql);

       // Redirect to avoid resubmission
    //    header("Location: " . $_SERVER['PHP_SELF']);
    //    exit;
}

// FOR DELETION OF HEALTH BOX ITEM

if(isset($_GET['deletehealthbox'])) {
    $id = $_GET['deletehealthbox'];
    // $sql = "UPDATE todos SET completed=1 WHERE id=$id";
    $sql = "DELETE FROM `health` WHERE `health`.`id` = $id";
    $con->query($sql);

       // Redirect to avoid resubmission
       echo "<script>window.location.href = 'http://localhost/pms/?pg=health';</script>";
       exit;
}

if(isset($_GET['deletenotes'])) {
    $id = $_GET['deletenotes'];
    // $sql = "UPDATE todos SET completed=1 WHERE id=$id";
    $sql = "DELETE FROM `journal` WHERE `journal`.`id` = $id";
    $con->query($sql);

       // Redirect to avoid resubmission
       echo "<script>window.location.href = 'http://localhost/pms/?pg=journal';</script>";
       exit;
}





// Fetch todo list
$sql = "SELECT * FROM todos WHERE byuser = '".$_SESSION['username']."'";
$result = $con->query($sql);

//fetch pages
// $pagesql = "SELECT * FROM pages WHERE byuser = '".$_SESSION['username']."'";
// $pageresult = $con->query($pagesql);

//fetch bookmarks
$booksql = "SELECT * FROM bookmarks WHERE byuser = '".$_SESSION['username']."'";
$bookresult = $con->query($booksql);


?>






</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<?php
                    echo  "the page is " .  $renderpage;
                ?>

    <div class="main">
  


        <div class="container">
          
                <?php 
                include 'col1.php';
                ?>

                <?php
                include $renderpage . '.php';
                ?>
            
                <?php
                include 'col3.php';
                ?>
        </div>
        
    </div>
    <script>
        // Function to open the popup
        function openPopup(x) {
            console.log(x.id)
            document.getElementById(x.id).style.display = "block";
        }

        // Function to close the popup
        function closePopup(y) {
            document.getElementById(y.id).style.display = "none";
        }
    </script>
    <!-- <script src="script.js"></script> -->

</body>

</html>