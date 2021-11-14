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
    <link rel="stylesheet" media="screen and (max-width: 1200px)" href="mobile.css">
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
    <div class="projects">
        <h3 class="section-title">My Projects</h3>
        <div class="bottom-line"></div>
        <h2>Take a look on what I've been working on</h2>
        <div class="project-set">

            <a href="https://github.com/orynamg/news-grid"><div class="project">
                <div class="project-img">
                    <img src="project_resources/Screenshot 2021-03-19 at 17.38.48.png" alt="">
                </div>
                <div class="project-text">
                    <div class="wrap-text">
                        <h3>NewsGrid</h3>
                        <h2>Front End for a Sports Website</h2>
                    </div>
                </div>
            </div></a>

            <a href="https://github.com/orynamg/donate-easy"><div class="project">
                <div class="project-img">
                    <img src="project_resources/donate-easy ss.png" alt="">
                </div>
                <div class="project-text">
                    <div class="wrap-text">
                        <h3>Donate-Easy</h3>
                        <h2>React Application</h2>
                    </div>
                </div>
            </div></a>

            <a href="https://github.com/orynamg/blog-heads"><div class="project">
                <div class="project-img">
                    <img src="project_resources/Screenshot 2021-03-19 at 18.04.14.png" alt="">
                </div>
                <div class="project-text">
                    <div class="wrap-text">
                        <h3>BlogHeads</h3>
                        <h2>Front End for a Blogging Website</h2>
                    </div>
                </div>
            </div></a>

            <a href="https://github.com/orynamg/stock-market-simulation"><div class="project">
                <div class="project-img">
                    <img src="project_resources/Screenshot 2021-03-19 at 14.57.39.png" alt="">
                </div>
                <div class="project-text">
                    <div class="wrap-text">
                        <h3>Stock Market Simulation</h3>
                        <h2>Application developed in Java</h2>
                    </div>
                </div>
            </div></a>

            <a href="https://github.com/orynamg/portfolio-website"><div class="project">
                <div class="project-img">
                    <img src="project_resources/portfolio site ss.png" alt="">
                </div>
                <div class="project-text">
                    <div class="wrap-text">
                        <h3>Portfolio Website</h3>
                        <h2>Current Portfolio website</h2>
                    </div>
                </div>
            </div></a>

            <a href="https://github.com/orynamg/nea2020"><div class="project">
                <div class="project-img">
                    <img src="project_resources/Screenshot 2021-03-19 at 17.44.20.png" alt="">
                </div>
                <div class="project-text">
                    <div class="wrap-text">
                        <h3>NAPP</h3>
                        <h2>News App using ML, NLP & Python</h2>
                    </div>
                </div>
            </div></a>
            
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="social">
            <a href="https://github.com/orynamg"><i class="fab fa-github fa-2x"></i></a>
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
            <a href="https://www.snapchat.com/add/arina_goichuk"><i class="fab fa-snapchat fa-2x"></i></a>
        </div>
        <p>Copyright &copy; 2021 - Oryna Goichuk</p>
    </footer>
</body>
</html> 