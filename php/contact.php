<?php

$loggedIn = isset($_SESSION['user_id']);
?>
<?php if ($loggedIn): ?>
    <p>Welcome to the Contact for logged-in users.</p>
<?php else: ?>
    <p>Welcome to the Contact for non-logged-in users.</p>
<?php endif; ?>
