<?php
include 'config.php';
include 'head.php';
include 'navbar.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

// Retrieve user-specific data, e.g., user's name
$userID = $_SESSION['user_id'];
$query = "SELECT name FROM users WHERE id = $userID"; // fetching 'name' column from database
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $userName = $row['name'];
} else {
  $userName = 'User'; // Default to 'User' if the name is not found
}
?>
<h1>Welcome, <?php echo $userName; ?>!</h1>
<p>This is the welcome page for logged-in users.</p>