<?php
session_start();
$loggedIn = true;

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $loggedIn = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9de2faaa7b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1240px)" href="mobile.css">
    <title>Oryna Goichuk || Portfolio Website</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav  class="blog-nav" id="main-nav">
        <a href="index.php" class="logo"><img src="project_resources/IMG_0669.PNG" alt="" class="logo"></a>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php#about">ABOUT</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="projects.php">PROJECTS</a></li>
            <li><a href="contact.php">CONTACT</a></li>

            <?php if ($loggedIn) { ?>
                <li><a class="user" href="my-account.php"><i class="fas fa-user-circle fa-2x"></i></a></li>
            <?php } else { ?>
                <li><a href="login.php">LOG IN</a></li>
            <?php } ?>
            
        </ul>
    </nav>
    <div class="pad"></div>
    <section class="thank-you-section">
        <div>
            <h3 class="section-title">Thank You!<i class="fas fa-check-circle"></i></h3>
            <h2>Thank you for contacting me. I have recieved your message</h2>
            <h2>and will get back to you within 10 days.</h2>
            <div class="extra">
                <h2> Have you checked my blog yet?</h2>
            </div>
            <a href="blog.php" class="btn">My Blog</a>
        </div>
        <div>
            <img src="project_resources/pngfind.com-computer-clipart-png-233621.png" alt="">
        </div>
        
        

    </section>
    
            
    <footer class="footer">
        <div class="social">
            <a href="#"><i class="fab fa-github fa-2x"></i></a>
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
            <a href="#"><i class="fab fa-snapchat fa-2x"></i></a>
        </div>
        <p>Copyright &copy; 2021 - Oryna Goichuk</p>
    </footer>
</body>
</html> 