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
                        <button id="login-nav" onclick="redirectToSignin()">Login</button>
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
                    <button id="sign-in-bottom" onclick="redirectToSignin()">Sign In to view more</button>
                </div>
                <img class="flower-img" src="./Images/pexels-madelynn-kuntz-16463047.jpg" alt="">
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/4f52b70ee0.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>