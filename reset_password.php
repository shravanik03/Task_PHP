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
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
        require 'vendor/autoload.php';

        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            if (empty($email)) {
                echo "<div><p class='error-div'>*You have not entered your email ID.</p></div>";
            } else {
                require_once "database.php";
                $sql = "SELECT * from user_info WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                echo $email;
                echo $user["name"];
                if ($user) {
                    $mail = new PHPMailer(true);
                   
                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isMail();                                            //Send using SMTP
                        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                        $mail->Username = 'shravanikul2003@gmail.com';                     //SMTP username
                        $mail->Password = 'rlmuawahuhiwzxup';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
                        //Recipients
                        $mail->setFrom('shravanikul2003@gmail.com', 'BloomNursery');
                        $mail->addAddress($email, $user["name"]);     //Add a recipient
                        //Content
                        $subject = "Reset Password";
                        $body = "Hi," . $user['name'] . "Click here to reset your password http://localhost/Task_PHP/setNewPassword.php";
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body = $body;

                        if ($mail->send()) {
                            echo "Mail has been sent check your email";
                        } else {
                            echo "Mail sending failed";
                        }

                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    
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