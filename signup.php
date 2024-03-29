<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="sign-up-wrapper">
        <?php
        require_once("functions.php");
        if (isset($_POST["submit"])) {
            $firstname = sanitizeInput($_POST['firstname']);
            $lastname = sanitizeInput($_POST['lastname']);
            $email = sanitizeInput($_POST['email']);
            $password = sanitizeInput($_POST['password']);
            $confirmPassword = sanitizeInput($_POST['confirm-password']);
            $name = $firstname . ' ' . $lastname;
            $sanitizedInputs = array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $password,
                'confirm-password' => $confirmPassword
            );
            $errors = checkForErrorsSignUp($sanitizedInputs);

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<p class='error-div'>*$error</p>";
                }
            } else {
                require_once "database.php";
                $token = uniqid();
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user_info (name,email,password,token) values(?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword, $token);
                    mysqli_stmt_execute($stmt);
                    header("Location: home.php");
                    exit();
                } else {
                    die("Something went wrong:(");
                }
            }
        }
        ?>
        <div id="sign-up-box">
            <div class="form-head-su">
                <h2>Sign Up Form</h2>
            </div>
            <form id="sign-up-form" action="signup.php" method="post">
                <input type="text" name="firstname" class="sign-up-name-inp" placeholder="First Name">
                <input type="text" name="lastname" class="sign-up-name-inp" placeholder="Last Name"><br>
                <input type="email" name="email" class="sign-up-input" placeholder="Email"><br>
                <input type="password" name="password" class="sign-up-input" placeholder="Password"><br>
                <input type="password" name="confirm-password" class="sign-up-input" placeholder="Confirm Password">
                <input type="submit" id="sign-up-submit" value="Sign Up" name="submit" />
                <p class="below-button">Already have an account? <span onclick="redirectToSignin()" id="already-account">Sign In</span></p>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>