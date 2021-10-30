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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1240px)" href="mobile.css">
    <title>Oryna Goichuk || Portfolio Website</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="home-nav" id="main-nav">
        <a href="index.php" class="logo"><img src="project_resources/Screenshot 2021-03-15 at 16.30.14.png" alt="" class="logo"></a>
        <ul>
            <li><a href="#home">HOME</a></li>
            <li><a href="#about">ABOUT</a></li>
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
    <div id="home" class="index-pad"></div>
    <header id="header-home">
        <section class="header-content">
            <div class="typewriter">
                <h1>Oryna Goichuk </h1>
            </div>  
            <h2>I specialise in UI Design & Front End, Data Analysis and Software Engineering</h2>
            <a href="projects.php" class="btn">My Projects</a>
        </section>
    </header>

<article id="about">
    <div class="index-pad"></div>
    <div class="about-container">
        <div class="about-content">
            <div class="text-content">
                <h3 class="section-title">About Me</h3>
                <div class="bottom-line"></div> 
                <p>
                    Currently, I am a student at Queen Mary University of London studying Computer Science and Management looking for work in my placement year.
                </p>
               
                <p>
                    I am a very passionate programmer currently working on multiple projects: a Java OOP project simulating the trends of the stock market and a Python 'News Aggregator Application' that uses machine learning and NLP python libraries.
                    
                    Additionally, I have a reasonable amount of experience in front end using Js React, Bootstrap, HTML and Sass. I pair this with Python Flask API or PHP for the backend and with MySQL for databases, creating beautiful websites. 
                    
                    These are some projects Ido in my spare time to extend my software engineering knowledge and build skills useful in a work environment. 
                </p>
            </div>
            <div class="img-content">
                <img src="project_resources/45A0C1BE-E234-41D5-A706-8362704A28C9.png" alt="">
            </div>
        </div>
    </div>


</article>
<article class="skills">
    <div class="container">
        <h3 class="section-title">My Skills</h3>
        <div class="bottom-line"></div>
        <h2>These are some of the skills I've gained over time studying Computer Science...</h2>
        <div class="skill-set">
            <div>
                <i class="fas fa-server fa-2x"></i>
                <h3>Backend</h3>
                <p>Intermediate in Java, PHP, & Python Programming, as well as sqlite3 and MySQL</p>
            </div>

            <div>
                <i class="fas fa-object-group fa-2x"></i>
                <h3>Frontend</h3>
                <p>Versatile in UI and Web Design, intermediate in HTML & CSS & Js, Bootstrap and React. Developing Graphic Design skills.</p>
            </div>

            <div>
                <i class="fas fa-file-alt fa-2x"></i>
                <h3>Other</h3>
                <p>Developing skills in Machine Learning and Data Analysis & Visualisation.</p>
            </div>

            <div>
                <i class="fas fa-thumbs-up fa-2x"></i>
                <h3>Qualities</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum suscipit porro quos magnam neque voluptas!</p>
            </div>
        </div>
    </div>
</article>

<section class="achievements">
    <h3 class="section-title">My Achievements</h3>
    <div class="bottom-line"></div>
    <h2>Here are my greatest life achievements...</h2>
    <horizontal-timeline></horizontal-timeline>
</section>

<article class="education">
        <h3 class="section-title">My Education</h3>
        <div class="bottom-line"></div>
        <div class="education-set">

            <div class="dark-card">
                <h3>Queen Mary University of London</h3>
                <p>Computer Science & Management BSc</p>
                <p>2020-2023</p>
             
            </div>

            <div class="light-card">
                <h3>Queen Mary University of London</h3>
                <p>MSc Degree</p>
                <p>2023-2024 </p>
                
            </div>

            <div class="dark-card" >
                <h3>Woodhouse College</h3>
                <p>Predicted A levels of A*A*A</p>
                <p>2020 (unable to sit exam due to COVID-19)</p>
            
            </div>

            <div class="light-card" >
                <h3>Fortismere School</h3>
                <p>GCSEs of 4A* and 5As</p>
                <p>2016-2018</p>
          
            </div>
        </div>
</article>
<article class="experience">
    <div class="container">
        <h3 class="section-title">My Experience</h3>
        <div class="bottom-line"></div>
        <h2>Here is some Work Experience I participated in...</h2>
        <div class="experience-set">
            <div class="left">
                <i class="fas fa-briefcase fa-4x icon"></i>
                <h2>Thomson Reuters - London</h2>
                <h2>August 2019 to August 2019</h2>
                <p>I joined Refinitiv Labs for my work experience in A-Levels. I observed Labs engineering, Data Science and User Experience teams collaborating, while working on ongoing projects. I learned some of the toolsused by the teams, such as Jupiter Notebooks, Git, Visual Studio Code which I used in my A-levels projectlater. I learned the importance of data and Machine Learning in modern software services.</p>
            </div>

            <div class="right">
                <i class="fas fa-chart-bar fa-4x icon"></i>
                <h2>Iris - London</h2>
                <h2>September 2018 to December 2018</h2>
                <p>I worked on a series of reports that visualised information about available guest orders in a Hotel company Iris. I visualised data for their main product using Matplotlib for data visualisation and Pandas for datamanipulation.</p>
            </div>
        </div>

    </div>
</article>

<footer class="footer">
    <div class="social">
        <a href="https://github.com/orynamg"><i class="fab fa-github fa-2x"></i></a>
        <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
        <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
        <a href="https://www.snapchat.com/add/arina_goichuk"><i class="fab fa-snapchat fa-2x"></i></a>
    </div>
    <p>Copyright &copy; 2021 - Oryna Goichuk</p>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      // Add smooth scrolling to all links
      $("a").on('click', function(event) {
    
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();
    
          // Store hash
          var hash = this.hash;
    
          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
    
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });
    </script>
</body>
<script type="module" src="components/timeline/timeline.js"></script>
</html> 