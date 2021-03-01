<?php

if(!isset($_SESSION)){
    session_start();  
 }

 
 if($_SESSION['Access'] == "students"){  
  

    $_SESSION['UserLogin'];
   
}else {
    echo header("Location: books.php");
}


include_once("../template/header_login.php");
include_once("../connection/server.php"); 

$con = connection();
$con2 = connection();
$users_id = $_SESSION['Users_id'];


if(isset($_GET['books_borrow'])){

    $books_id = $_GET['books_borrow'];

    $books_status = "Borrowed";
    $transaction_status = "Unreturned";

    // UPDATE BOOKS STATUS
    $sql = "UPDATE books_list SET status = '$books_status' WHERE books_id = $books_id ";
    $con->query($sql) or die ($con->error); 

    // INSERT BORROW LIST
    $sql2 = "INSERT INTO `borrows_list`(`books_id`, `users_id`, `status`) VALUES ('$books_id', 
    '$users_id', '$transaction_status')";
    $con2->query($sql2) or die ($con2->error); 
    
    echo header("Location: books.php");

}

