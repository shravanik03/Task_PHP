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
        require('script.php');
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            if (empty($email)) {
                echo "<div><p class='error-div'>*You have not entered your email ID.</p></div>";
            } else {
                require_once "database.php";
                $sql = "SELECT * from user_info WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if ($user) {
                    $subject = "Reset Password";
                    $body = "Hi," . $user['name'] . " Click here to reset your password http://localhost/Task_PHP/setNewPassword.php?email=$email";
                    $name = $user["name"];
                    $response = sendMail($email, $subject, $body, $name);
                    echo $response;

                } else {
                    echo "<div><p class='error-div'>*Entered email ID does not exist.</p></div>";
                }
            }
        }
        ?>
        <div class="container">
            <h2>Reset Password</h2>
            <form method="post">
                <input type="email" name="email" id="email-input" placeholder="Email ID">
                <input type="submit" value="Send Reset Link" name="submit" id="reset-btn">
            </form>
            <p class="below-button">Don't have an account? <span onclick="redirectToSignup()" id="create-account">Sign
                    Up</span></p>
        </div>
    </div>
</body>

</html>