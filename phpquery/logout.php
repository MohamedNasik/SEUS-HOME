
<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
// $_SESSION = array();
 
// Destroy the session.
// session_destroy();

// Destroy the session.
unset($_SESSION['p_id']);
unset($_SESSION['username']);

 
// Redirect to login page
header("location: ..\index.php");
exit;
?>