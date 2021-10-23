<?php
session_start();
$loggedIn = true;

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $loggedIn = false;
}

require_once "config.php";

$new_name = $new_tel = "";
$new_name_err = $confirm_tel_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["name"]))){
        $new_name_err = "Please enter your name.";     
    } else{
        $new_name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["tel"]))){
        $new_tel_err = "Please enter your phone number.";     
    } else{
        $new_tel = trim($_POST["tel"]);
    }

    $sql = "UPDATE users SET name = ?, tel = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
 
            mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_tel, $param_id);
          
            $param_name = $new_name;
            $param_tel = $new_tel;
            $param_id = $_SESSION["id"];

            if(mysqli_stmt_execute($stmt)){
    
                $_SESSION["user_name"] = $new_name;
                $_SESSION["user_tel"] = $new_tel;

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
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
                <li><a class="user" href="logout.php"><i class="fas fa-user-circle fa-2x"></i></a></li>
            <?php } else { ?>
                <li><a href="login.php">LOG IN</a></li>
            <?php } ?>

        </ul>
    </nav>
    <div class="pad"></div>
    
    <!-- Settings Area -->
    <aside class="settings">
    <h3 class="section-title">MY ACCOUNT</h3>
        <div class="bottom-line"></div>
        <h2>View my details</h2>
        <div class="settings-set">
            <div class="photo-box">
                <i class="fas fa-user-circle fa-10x"></i>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="file" name="photo" class="file-input" accept="image/png, image/jpeg">
                </form>
            
                <div class="button-set">
                    <a href="reset-password.php" class="btn">Reset Password</a>
                    <a href="logout.php" class="btn">Logout</a>
                </div>
                
            </div>
            <div class="details">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="name"  value="<?= $_SESSION["user_name"]; ?>">
                    <input type="email" name="email" value="<?= $_SESSION["email"]; ?>" readonly>
                    <input type="tel" name="tel" value="<?= $_SESSION["user_tel"]; ?>">
                    
                    <input type="submit" class="btn" value="Save Changes">
                    </form>
            </div>
        </div> 
    </aside>

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