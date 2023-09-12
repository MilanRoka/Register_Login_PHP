<?php

// Check if the user is logged in
$loggedIn = isset($_SESSION['user_id']);
?>

<!-- Your HTML code for the page -->

<?php if ($loggedIn): ?>
    <!-- Display content for logged-in users -->
    <p>Welcome to the Services for logged-in users.</p>
<?php else: ?>
    <!-- Display content for non-logged-in users -->
    <p>Welcome to the Services for non-logged-in users.</p>
<?php endif; ?>
<div>
    <h1>Services Page</h1>
</div>