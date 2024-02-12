<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <link rel="stylesheet" href="signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="sign-in-wrapper">
        <?php
        require_once("functions.php");
        if (isset($_POST["submit"])) {

            $email = sanitizeInput($_POST["email"]);
            $password = sanitizeInput($_POST["password"]);

            if (empty($email) || empty($password)) {
                echo "<p class='error-div'>*All the fields are required.</p>";
            } else {
                require_once "database.php";
                $sql = "SELECT * from user_info WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        $name = $user["name"];
                        header("Location: home.php?name=$name");
                        exit();
                    } else {
                        echo "<p class='error-div'>*Incorrect email or password</p>";
                    }
                } else {
                    echo "<p class='error-div'>*Incorrect email or password</p>";
                }
            }
        }
        ?>
        <div id="sign-in-box">
            <div class="form-head">
                <h2>Sign In</h2>
            </div>
            <form id="sign-in-form" method="post">
                <input type="email" name="email" placeholder="Email ID"><br><br>
                <input type="password" name="password" placeholder="Password"><br><br><br>
                <a href="reset_password.php" id="forgot-password">Forgot password?</a>
                <input type="submit" id="sign-in-submit" name="submit" value="Sign In" />
                <p class="below-button">Don't have an account? <span onclick="redirectToSignup()"
                        id="create-account">Create One</span></p>
            </form>
        </div>
    </div>
   <script src="script.js"></script>
</body>

</html>