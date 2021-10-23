<?php

require_once "config.php";
 
$email = $name = $tel = $password = $confirm_password = "";
$email_err = $name_err = $tel_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{

        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = trim($_POST["email"]);

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
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
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
 
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($tel_err)) {
        

        $sql = "INSERT INTO users (email, password, name, tel) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
     
            mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_password,  $param_name, $param_tel);
            
      
            $param_email = $email;
            $param_name = $name;
            $param_tel = $tel;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            

            if(mysqli_stmt_execute($stmt)){

                header("location: login.php");
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1200px)" href="mobile.css">
</head>
<body class="img-bg">
    <div class="wrapper bigger">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <h3 class="section-title">Register</h3>
        <div class="bottom-line"></div> 
        <fieldset>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="tel" placeholder="Phone" pattern="07[0-9]{3}[0-9]{3}[0-9]{3}" class="form-control <?php echo (!empty($tel_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tel; ?>">
                <span class="invalid-feedback"><?php echo $tel_err; ?></span>
            </div>
            <div class="buttons">
                <input type="submit" class="btn"  value="Register">
                <input type="reset" class="btn " value="Clear">
            </div>
        </fieldset> 
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>   
</body>
</html>


