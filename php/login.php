<?php include 'head.php'; ?>
<?php include 'navbar.php'; ?>

<?php
include 'config.php';

if (isset($_SESSION['user_id'])) {
    header('Location: welcome.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo '<script>alert("Both email and password are required.")</script>';
    } else {
        // Perform user authentication
        $query = "SELECT * FROM users WHERE email = '$email'"; // Check if the user's email exists in the database
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                // Set the user ID in the session
                $_SESSION['user_id'] = $row['id'];

                header('Location: welcome.php');
                exit();
            } else {
                echo '<script>alert("Incorrect password. Please try again.")</script>';
            }
        } else {
            echo '<script>alert("User with this email does not exist.")</script>';
        }
    }
}
?>

<h1>Login</h1>
<div class="form">
    <form method="POST" action="">
        <label>Email :</label>
        <div class="form-group">
            <input required autocomplete="email" type="email" name="email" placeholder="Enter your email" />
        </div>
        <label>Password :</label>
        <div class="form-group">
            <input required autocomplete="current-password" type="password" name="password" placeholder="Enter your password" />
        </div>
        <button class="messageBtn" type="submit">Login</button>
        <span>Don't have an account!<a href="register.php">Register</a></span>
    </form>
</div>
<?php include 'footer.php'; ?>