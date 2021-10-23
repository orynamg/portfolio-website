<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
require_once "config.php";
 
$email = $password = $name = $tel = "";
$param_email = $email;
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter an email.";
    } else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, email, password, name, tel FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            

            $param_username = $email;
            

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){                    

                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password, $name, $tel);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){

                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["user_name"] = $name; 
                            $_SESSION["user_tel"] = $tel; 
                            
                                                
                            header("location: blog.php");
                        } else{
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid email or password.";
                }
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
    <title>Login</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1200px)" href="mobile.css">
</head>
<body class="img-bg">
    <div class="wrapper">
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3 class="section-title">Log in</h3>
            <div class="bottom-line"></div> 
            <fieldset> 
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" placeholder="Email" name="email" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"  placeholder="Password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" value="Login">
                </div>
            </fieldset>
            <p>Don't have an account? <a href="register.php">Sign up now</a></p>
        </form>

    </div>
</body>
</html>
