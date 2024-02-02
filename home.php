<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        echo "<p class='user-name'>Welcome, $name!</p>";
    } else {
        // Handle the case where the name is not provided
        echo "<p class='user-name'>Welcome</p>";
    }
    ?>
    <div id="wrapper">
        <div class="navbar">
            <header>
                <div class="logo">
                    <img src="./Images/logo.png" alt="" class="logo-img">
                    <span>BloomNursery</span>
                </div>
                <div class="nav-btn">
                    <button id="logout-nav" onclick="logOut()">Logout</button>
                </div>
            </header>

        </div>
        <h2>Explore our wide range of flowers!</h2>
        <div class="hero-section">
            <img class="flower-img" src="./Images/flowers-home.jpg" alt="">
            <div class="content-para">
                <p>
                    Embark on a journey through the lush wonders of our nursery . Our virtual gates open to reveal a
                    diverse tapestry of beautiful plants, each waiting to captivate your senses and transform your
                    space into a haven of
                    natural splendor. From the delicate petals of exotic flowers to the sturdy leaves of resilient
                    shrubs, our collection
                    encompasses the vibrant spectrum of botanical beauty.
                    <br><br>
                    Embark on a journey through the lush wonders of our nursery . Our virtual gates open to reveal a
                    diverse tapestry of beautiful plants, each waiting to captivate your senses and transform your
                    space into a haven of
                    natural splendor. From the delicate petals of exotic flowers to the sturdy leaves of resilient
                    shrubs, our collection
                    encompasses the vibrant spectrum of botanical beauty.
                </p>
            </div>
            
            
        </div>
    </div>
    <script>
        function logOut(){
            window.location.href = "index.php";
        }
    </script>
</body>

</html>