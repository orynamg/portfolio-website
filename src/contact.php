<?php
session_start();
$loggedIn = true;

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $loggedIn = false;
}

require_once "config.php";
 
$email = $name = $tel = $subject = $message= "";
$email_err = $name_err = $tel_err = $subject_err = $message_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";     
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";     
    } else{
        $name = trim($_POST["name"]);
    }

    // Validate tel
    if(empty(trim($_POST["tel"]))){
        $tel_err = "Please enter a phone number.";     
    } else{
        $tel = trim($_POST["tel"]);
    }

    // Validate subject
    if(empty(trim($_POST["subject"]))){
        $subject_err = "Please enter the subject.";     
    } else{
        $subject = trim($_POST["subject"]);
    }

    // Validate message
    if(empty(trim($_POST["message"]))){
        $message_err = "Please enter the message.";     
    } else{
        $message = trim($_POST["message"]);
    }

    if(empty($email_err) && empty($name_err) && empty($tel_err) && empty($subject_err) && empty($message_err)){
            

        $sql = "INSERT INTO contact (email,  name, tel, subject, message) VALUES (?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
    
            mysqli_stmt_bind_param($stmt, "sssss", $param_email, $param_name,  $param_tel, $param_subject, $param_message);
            
    
            $param_email = $email;
            $param_name = $name;
            $param_tel = $tel;
            $param_subject = $subject;
            $param_message = $message;

            if(mysqli_stmt_execute($stmt)){

                header("location: thank-you.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        
            mysqli_stmt_close($stmt);
        }
    }

mysqli_close($link);
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

    <section class="contact">
        <div class="contact-container">
            
            <h3 class="section-title">Contact Me</h3>
            <div class="bottom-line"></div>
                <h2>Here is how you can reach me</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                    <div class="text-fields">

                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name" class="name-input form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="email-input form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Subject" class="subject-input form-control <?php echo (!empty($subject_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $subject; ?>">
                            <span class="invalid-feedback"><?php echo $subject_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="tel" placeholder="Phone" pattern="07[0-9]{3}[0-9]{3}[0-9]{3}" class="phone-input form-control <?php echo (!empty($tel_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tel; ?>">
                            <span class="invalid-feedback"><?php echo $tel_err; ?></span>
                        </div>
                        <div class="form-group message-input">
                            <textarea type="text" name="message" placeholder="Message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $message; ?>"></textarea>
                            <span class="invalid-feedback"><?php echo $message_err; ?></span>
                        </div>

                    </div>
                    <div class="l">
                        <input type="submit" id="submit" value="Submit" class="btn submit-btn">
                    </div>
                </form>
            <div class="icons">
                <div>
                    <i class="fas fa-envelope fa-2x"></i>
                    <h3>Email</h3>
                    <p>arina.goichuk@gmail.com</p>
                </div>

                <div>
                    <i class="fas fa-phone fa-2x"></i>
                    <h3>Phone</h3>
                    <p>07732676634</p>
                </div>

                <div>
                    <i class="fas fa-address-card fa-2x"></i>
                    <h3>Address</h3>
                    <p>20B Feilden House, Westfield Way, E1 4NP, London</p>
                </div>

        </div>
    </div>
        
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.408310435021!2d-0.04256318434291852!3d51.5240704173054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761d2f4ebb40dd%3A0xc0cca7de33120519!2sQueen%20Mary%20University%20of%20London!5e0!3m2!1sen!2suk!4v1616158444397!5m2!1sen!2suk" 
    width="1440" 
    height="350" 
    style="border:0;" 
    allowfullscreen="yes" 
    loading="lazy">
    </iframe>
    </section> 
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