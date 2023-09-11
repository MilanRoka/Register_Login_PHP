<?php include 'head.php'; ?>
<?php include 'navbar.php'; ?>

<?php
// Include the database configuration
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Perform basic validation
    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo '<script>alert("All fields are required.")</script>';
    } elseif ($password !== $confirmPassword) {
        echo '<script>alert("Passwords do not match.")</script>';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo '<script>alert("Registration successful. You can now log in.") </script>';
            header('Location: login.php');
        } else {
            echo '<script>alert("Registration failed. Please try again later.")</script>';
        }
    }
}
?>

<h1>Register</h1>
<div class="form">
    <form method="POST" action="">
        <label>Name :</label>
        <div class="form-group">
            <input required autocomplete="name" type="text" name="name" placeholder="Enter your name" />
        </div>
        <label>Email :</label>
        <div class="form-group">
            <input required autocomplete="email" type="email" name="email" placeholder="Enter your email" />
        </div>
        <label>Password :</label>
        <div class="form-group">
            <input required autocomplete="new-password" type="password" name="password" placeholder="Enter your password" />
        </div>
        <label>Confirm Password :</label>
        <div class="form-group">
            <input required autocomplete="new-password" type="password" name="confirm-password" placeholder="Confirm your password" />
        </div>
        <button class="messageBtn" type="submit">Register</button>
        <span>Already have an account!<a href="login.php">Login</a></span>

    </form>
</div>

<?php include 'footer.php'; ?>