<?php
session_start();
echo "Hi" . htmlspecialchars($_SESSION['username']);
?>

// if (isset($_SESSION['username'])) {
//     echo "Hi " . htmlspecialchars($_SESSION['username']);
//     // unset($_SESSION['username']); // optional: clear after showing once
// } else {
//     echo "Welcome to Linkup!";
// }
?>