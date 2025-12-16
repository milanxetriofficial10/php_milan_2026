<?php
// header.php
session_start(); // Start session for login/logout handling
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responsive Centered Header</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<style>
/* Reset & base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Roboto', sans-serif;
}

/* Header */
header {
    width: 100%;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    transition: 0.3s all ease;
}

.header-container {
    max-width: 1200px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 20px;
}

/* Logo */
.logo {
    font-size: 1.8rem;
    color: #fff;
    font-weight: bold;
    letter-spacing: 1px;
    cursor: pointer;
    transition: transform 0.3s ease;
}
.logo:hover {
    transform: scale(1.1) rotate(-5deg);
}

/* Navbar container */
nav {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

nav ul {
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
    gap: 30px;
}

nav ul li {
    position: relative;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: 500;
    padding: 8px 5px;
    transition: color 0.3s ease;
}
nav ul li a:hover {
    color: #ffdd59;
}

/* Underline animation */
nav ul li a::after {
    content: '';
    display: block;
    height: 2px;
    width: 0;
    background: #ffdd59;
    transition: width 0.3s ease;
    position: absolute;
    bottom: -2px;
    left: 0;
}
nav ul li a:hover::after {
    width: 100%;
}

/* Login button on right */
.login-btn {
    margin-left: auto;
}
.login-btn a {
    background: #ffdd59;
    color: #1e3c72;
    padding: 7px 15px;
    border-radius: 5px;
    font-weight: 600;
    transition: 0.3s ease;
}
.login-btn a:hover {
    background: #ffc700;
    color: #000;
}

/* Hamburger menu */
.menu-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
    margin-left: 20px;
}
.menu-toggle span {
    height: 3px;
    width: 25px;
    background: #fff;
    margin-bottom: 5px;
    border-radius: 3px;
    transition: all 0.3s ease;
}

/* Responsive styles */
@media (max-width: 768px) {
    nav {
        justify-content: flex-start;
    }

    nav ul {
        position: fixed;
        top: 70px;
        left: -100%;
        width: 100%;
        flex-direction: column;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        padding: 20px 0;
        gap: 20px;
        transition: left 0.3s ease;
        z-index: 999;
    }

    nav ul li {
        text-align: center;
    }

    nav.active ul {
        left: 0;
    }

    .login-btn {
        margin-left: 0;
    }

    .menu-toggle {
        display: flex;
    }
}

/* Menu toggle animation */
.menu-toggle.open span:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}
.menu-toggle.open span:nth-child(2) {
    opacity: 0;
}
.menu-toggle.open span:nth-child(3) {
    transform: rotate(-45deg) translate(6px, -6px);
}
</style>
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo">MyBrand</div>

        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="login-btn">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                <?php endif; ?>
            </div>
            <div class="menu-toggle" id="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>
</header>

<script>
// Mobile menu toggle
const menuToggle = document.getElementById('menu-toggle');
const nav = document.querySelector('nav');

menuToggle.addEventListener('click', () => {
    nav.classList.toggle('active');
    menuToggle.classList.toggle('open');
});
</script>

</body>
</html>
