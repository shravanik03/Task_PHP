<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="resetPass.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="wrapper">

        <?php
        
        if (isset($_POST["submit"])) {
            
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            
            $errors = array();
            if (empty($password) || empty($confirmPassword)) {
                array_push($errors, "All fields are required");
            }
           
            if (strlen($password) < 8) {
                array_push($errors, "Password length must be minimum 8");
            }
            if ($password !== $confirmPassword) {
                array_push($errors, "Password and confirm password should be same");
            }
            
            
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<p class='error-div'>*$error</p>";
                }
            } else {
                require_once "database.php";
                if(isset($_GET['email'])){
                    $email = $_GET['email'];
                }
                $sql = "UPDATE user_info SET password = ? WHERE email='$email'";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "s", $password);
                    mysqli_stmt_execute($stmt);
                    
                    header("Location: signin.php");
                    echo "Password reset successfully!!";
                } else {
                    die("Something went wrong:(");
                }
            }
        }
        ?>
        <div class="container">
            <h2>Set New Password</h2>
            <form method="post">
                <input type="password" name="password" id="email-input" placeholder="New Password">
                <input type="password" style="margin-top:10px;" name="confirm-password" id="email-input" placeholder="Confirm Password" >
                <input type="submit" value="Set Password" name="submit" id="reset-btn">
            </form>
            
        </div>
    </div>
</body>

</html>