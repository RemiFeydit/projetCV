<?php
session_name(); 
session_start();
session_destroy();
header('Location: login.php');
exit;
?>