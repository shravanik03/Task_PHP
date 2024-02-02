<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Portal</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <div id="home-page">
            <div class="navbar">
                <header>
                    <div class="logo">
                        <img src="./Images/logo.png" alt="" class="logo-img">
                        <span>BloomNursery</span>
                    </div>
                    <div class="menu">
                        <i id="menuIcon" class="fa-solid fa-bars"></i>
                    </div>
                    <div class="nav-btn">
                        <button id="login-nav">Login</button>
                        <button id="signup-nav" onclick="redirectToSignup()">Signup</button>
                    </div>
                </header>

            </div>
            <div class="hero-section">

                <div class="content-para">
                    <p>
                        Embark on a journey through the lush wonders of our nursery . Our virtual gates open to reveal a
                        diverse tapestry of beautiful plants, each waiting to captivate your senses and transform your
                        space into a haven of
                        natural splendor. From the delicate petals of exotic flowers to the sturdy leaves of resilient
                        shrubs, our collection
                        encompasses the vibrant spectrum of botanical beauty.
                    </p>
                    <button id="sign-in-bottom">Sign In to view more</button>
                </div>
                <img class="flower-img" src="./Images/pexels-madelynn-kuntz-16463047.jpg" alt="">
            </div>
        </div>
        
        <!-- <div id="sign-in-wrapper">
            <div id="sign-in-box">
                <div class="form-head">
                    <h2>Sign In</h2>
                </div>
                <form id="sign-in-form">
                    <input type="text" name="username" placeholder="Username"><br><br>

                    <input type="password" name="password-signin" placeholder="Password"><br><br><br>
                    <a id="forgot-password" href="">Forgot password?</a>
                    <input id="sign-in-submit" type="submit" value="Sign In" />
                    <p class="below-button">Don't have an account? <span id="create-account">Create One</span></p>
                </form>
            </div>
        </div> -->

        
    </div>
    <script src="https://kit.fontawesome.com/4f52b70ee0.js" crossorigin="anonymous"></script>
    <script>
        function redirectToSignup() {
            window.location.href = "signup.php";
        }
    </script>
</body>

</html>