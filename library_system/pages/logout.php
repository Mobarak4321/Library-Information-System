<?php

session_start();

unset($_SESSION['UserLogin']);
unset($_SESSION['Access']);
unset($_SESSION['books_id']);

echo header("Location: index.php");

?>