
<?php


error_reporting(0);
include '_dbconnect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
// echo "the user name is " . $_SESSION['username'];

if(isset($_POST['overall_experience'])) {

    $overall_experience = $_POST['overall_experience'];
    $user_interface = $_POST['user_interface'];
    $features = $_POST['features'];
    $improvements = $_POST['improvements'];
    $bugs_issues = $_POST['bugs_issues'];
    $suggestions = $_POST['suggestions'];
    $recommendation = $_POST['recommendation'];
    $additional_comments = $_POST['additional_comments'];
    $byuser = $_SESSION['username'];

    $byuser = $_SESSION['username'];

    $sql = "INSERT INTO `feedback` ( `overall_experience`, `user_interface`, `features`, `improvements`, `bugs_issues`, `suggestions`, `recommendation`, `additional_comments`,`byuser`)
    VALUES ( '$overall_experience', '$user_interface', '$features', '$improvements', '$bugs_issues', '$suggestions', '$recommendation', '$additional_comments','$byuser');";

    echo "FEEDBACK FORM SUBMITTED";

    $con->query($sql);

    if ($con->query($sql) === TRUE) {
        // Redirect to avoid resubmission
        echo "<script>alert('Feedback submitted successfully!');</script>";
        echo "<script>window.location.href = 'http://localhost/pms/?pg=health';</script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        echo "<script>alert('Feedback submission failed!');</script>";
    }
}


$feedback_info = ""




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
    
                        <h2>Feedback Section ⭐</h2>
                        <hr>

                        <div class="feedbacksection">
                            
                            <?php $feedback_info ?>

                        <form id="feedbackform" action="feedback.php" method="post">
                            <br>
                            <br>
                            <br>
                                    <fieldset id="fff" >
                                        <legend>1. Overall Experience</legend>
                                        <label><input type="radio" name="overall_experience" value="Excellent"> Excellent</label><br>
                                        <label><input type="radio" name="overall_experience" value="Good"> Good</label><br>
                                        <label><input type="radio" name="overall_experience" value="Average"> Average</label><br>
                                        <label><input type="radio" name="overall_experience" value="Poor"> Poor</label><br>
                                    </fieldset>

                                    <fieldset>
                                        <legend>2. User Interface</legend>
                                        <label><input type="radio" name="user_interface" value="Very user-friendly"> Very user-friendly</label><br>
                                        <label><input type="radio" name="user_interface" value="Somewhat user-friendly"> Somewhat user-friendly</label><br>
                                        <label><input type="radio" name="user_interface" value="Neutral"> Neutral</label><br>
                                        <label><input type="radio" name="user_interface" value="Not very user-friendly"> Not very user-friendly</label><br>
                                        <label><input type="radio" name="user_interface" value="Not user-friendly at all"> Not user-friendly at all</label><br>
                                    </fieldset>

                                    <fieldset>
                                        <legend>3. Features you like</legend>
                                        <label><input type="checkbox" name="features" value="Task management"> Task management</label><br>
                                        <label><input type="checkbox" name="features" value="Calendar"> Calendar</label><br>
                                        <label><input type="checkbox" name="features" value="Goal setting"> Goal setting</label><br>
                                        <label><input type="checkbox" name="features" value="Reminder/notification system"> Reminder/notification system</label><br>
                                        <label><input type="checkbox" name="features" value="Note-taking"> Note-taking</label><br>
                                        <label><input type="checkbox" name="features" value="Others"> Others (please specify): <input type="text" name="other_features"></label><br>
                                    </fieldset>

                                    <fieldset>
                                        <legend>4. Improvements</legend>
                                        <textarea name="improvements" rows="4" cols="50"></textarea>
                                    </fieldset>

                                    <fieldset>
                                        <legend>5. Bugs or Issues</legend>
                                        <textarea name="bugs_issues" rows="4" cols="50"></textarea>
                                    </fieldset>

                                    <fieldset>
                                        <legend>6. Suggestions</legend>
                                        <textarea name="suggestions" rows="4" cols="50"></textarea>
                                    </fieldset>

                                    <fieldset>
                                        <legend>7. Would you recommend our personal management system to others?</legend>
                                        <label><input type="radio" name="recommendation" value="Yes"> Yes</label><br>
                                        <label><input type="radio" name="recommendation" value="No"> No</label><br>
                                    </fieldset>

                                    <fieldset>
                                        <legend>8. Additional Comments</legend>
                                        <textarea name="additional_comments" rows="4" cols="50"></textarea>
                                    </fieldset>

                                    <input type="submit" value="Submit">
                                </form>
                        
                        </div>

                        
</div>
<script src = "script.js"></script>