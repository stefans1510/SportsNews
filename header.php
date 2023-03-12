<?php
include('classes/Server.php');
?>
<head>
    <title>Sports News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time() ?>">
    <link rel="shortcut icon" type="image/png" href="img/favicon.img">
    <script src="https://kit.fontawesome.com/bebdb9b186.js" crossorigin="anonymous"></script>
</head>
<header>
    <div class="navbar">
        <label class="logo"><a href="index.php">Sports News</label>
        <ul class="nav-list" id="nav-list">
            <li class="nav-item"><a href="football.php">Football</a></li>
            <li class="nav-item"><a href="basketball.php">Basketball</a></li>
            <li class="nav-item"><a href="formula1.php">Formula 1</a></li>
            <li class="nav-item"><a href="motogp.php">Moto GP</a></li>
            <?php
            if (isset($_SESSION['id'])):
                ?>
                <li class="nav-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;<?php echo explode(" ", $_SESSION['username']) [0]; ?></a></li>
                <li class="nav-item"><a href="UserController.php?q=logout">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a href="login.php">Log In</a></li>
            <?php endif ?>
        </ul>
        <div class="menu" id="toggle-btn">
            <div class="menu-line"></div>
            <div class="menu-line"></div>
            <div class="menu-line"></div>
        </div>
    </div><br>
</header>

<script>
    const toggleButton = document.getElementById("toggle-btn");
    const navList = document.getElementById("nav-list");

    toggleButton.addEventListener('click', () => {
        navList.classList.toggle("active");
    });
</script>
