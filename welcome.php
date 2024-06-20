<?php



// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     // echo $_SESSION['loggedin'];
//     // header("location: welcome.php");
//     // exit;
//     $shownoauth = true;
// }

// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
//     // User is logged in
//     // Add your code here for logged in users
//     $shownoauth = false;
//     echo $shownoauth;
//     echo "You are logged in";
    
// } else {

//     $shownoauth = true;
//     echo $shownoauth;
//     // User is not logged in
//     // Add your code here for non-logged in users
//     echo "You are not logged in";
// }

session_start();
$shownoauth = true;

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    // User is logged in
    // Add your code here for logged in users
    // echo "<script>alert('wow you are logged in')</script>";
    // echo "You are logged in";

    // echo "your name is ". $_SESSION['username'] ;
    // header("location: index.php");
    $shownoauth = false;
    
    // exit;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


   <?php 
   if ($shownoauth){

     include 'navbarnoauth.php';

    //  echo "<span style='background-color:crimson;color:white;z-index:9999'>You need to login first</span>";

   }else{

     include 'navbar.php';
     
   }
   
   
   ?>
    <div class="container">

        <div class="hero">
            <h1>Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'You'; ?> to </h1>
            <p>
                पर्सनल मैनेजमेंट सिस्टम
      
            </p>
            <button id="herobtn"><a href="/pms/signup.php">Try Now</a></button>
            <img id="img1" src="https://i.giphy.com/RMlE1VnIHzdneThR6w.webp" alt="">
                <img id="img2" src="https://i.giphy.com/iIT5Y3Tz5AJ6yr4j55.webp" alt="">
                <img id="img3" src="https://i.giphy.com/kLOkqcrdC5mrCE7k7G.webp" alt="">
                <img id="img4" src="https://i.giphy.com/d15kGggSJHwn7lGPrf.webp" alt="">
        </div>
    </div>



    <div class="quebeforefeatures">A Place to Mange Your...</div>

    <section>
            <div class="features">
                <div class="featuresbox">
                    <h1>✅</h1>
                    <h2>To-do</h2>
                    <p>
                        Keep track of your daily tasks and manage your time effectively.
                    </p>
                </div>

                <div class="featuresbox">
                    <h1>💰</h1>
                    <h2>Finance</h2>
                    <p>
                        Keep track of your income and expenses and manage your finances effectively.
                    </p>
                </div>

                <div class="featuresbox">
                    <h1>❤️</h1>
                    <h2>Health</h2>
                    <p>
                        Keep track of your health and fitness and manage your health effectively.
                    </p>
                </div>

             

            </div>

            <div class="features">
                
                
                <div class="featuresbox">
                    <h1>📒</h1>
                    <h2>Journal</h2>
                    <p>
                        <p>
                            Keep a personal journal and record your thoughts, experiences, and reflections.
                        </p>
                    </p>
                </div>

                <div class="featuresbox">
                    <h1>🔖</h1>
                    <h2>Bookmark</h2>
                    <p>
                        Keep track of your favorite websites and easily access them whenever you want.
                    </p>
                </div>

                <div class="featuresbox">
                    <h1>⏳</h1>
                    <h2>Time</h2>
                    <p>
                        <p>
                            Keep track of your schedule and manage your time effectively.
                        </p>
                    </p>
                </div>

                

            </div>
    </section>

    <br>
    <br>
    <br>
    <section id="forsceenshot">

        <div class="screenshot1">
            <img src=" Images\homepage.png" alt="">
            <button><a href="\pms\signup.php">Make it Yours</a></button>
        </div>

        <div class="welcomeabout">

            <div>
                <h1 id="aboutonpage">About Us👀</h1>
                <br>
                <br>
           
                <img src="https://i.giphy.com/2ce2NqZPa04PZvT1Xn.webp" alt="">
            </div>
            <div>
                
                <p>
                    We are a team of developers who are passionate about creating innovative solutions to everyday problems. 
                    Our goal is to help people manage their personal lives more effectively and efficiently. We believe that by providing tools and resources to help people stay organized and focused,
                    we can make a positive impact on their lives. 
               <br>
               <br>
                    Our Personal Management System is designed to help you keep track of your tasks, finances, health, and more, all in one convenient place. 
                    Try it out today and see how it can help you stay on top of your busy life!
                </p>
            </div>
    
        </div> 

        
    </section>


    <footer>
            <div class="footer">
                <div class="footer-logo">
                    <img src="" alt="">
                    <h1><a href="welcome.php">Peronal Management System</a></h1>
                    <p>Oraganize your life Efficently </p>
                </div>
                <div class="footer-links">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="aboutonpage">About</a></li>
                        <li><a href="/pms/?pg=health">Contact</a></li>
                        <li><a href="/pms/?pg=finance">Privacy</a></li>
                        <li><a href="/pms/?pg=todo">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>

</body>
</html>