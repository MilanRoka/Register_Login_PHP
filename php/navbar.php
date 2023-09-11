<nav class="navbar">
    <div class="logo">
        <a href="#"><img src="../logo.svg" alt="Your Logo"></a>
    </div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
    <div class="burger-menu">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const burgerMenu = document.querySelector(".burger-menu");
    const navLinks = document.querySelector(".nav-links");

    burgerMenu.addEventListener("click", () => {
        navLinks.classList.toggle("active");
    });

    const links = document.querySelectorAll(".nav-links li a");

    links.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

            const targetHref = link.getAttribute("href");

            // Redirect to the PHP file
            window.location.href = targetHref;

            // Close the navigation menu if needed
            navLinks.classList.remove("active");
        });
    });
});
</script>