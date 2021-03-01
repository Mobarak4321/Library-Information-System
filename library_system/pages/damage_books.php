<?php

if(!isset($_SESSION)){
    session_start();  
 }

 
 if($_SESSION['Access'] == "administrator"){  
  

    $_SESSION['UserLogin'];
   
}else {
    echo header("Location: borrowers.php");
}


include_once("../template/header_login.php");
include_once("../connection/server.php"); 

$con = connection();
$con2 = connection();
$con3 = connection();


if(isset($_GET['damage_book'])){

    $books_id = $_SESSION['books_id'];
    $borrow_id = $_GET['damage_book'];
    $transaction_status = "Damaged";
    $status_books = "Damaged";
    
    // UPDATE BOOKS INFO
    $sql = "UPDATE books_list SET status = '$status_books' WHERE books_id = '$books_id' ";
    $con->query($sql) or die ($con->error); 


    // UPDATE BORROWS INFO
    $sql2 = "UPDATE borrows_list SET status = '$transaction_status' WHERE borrows_id = '$borrow_id' ";
    $con2->query($sql2) or die ($con2->error); 

    // INSERT RETURNS LIST
    $sql3 = "INSERT INTO `returns_list` (`borrow_id`, `status`) VALUES ('$borrow_id', '$transaction_status')";
    $con3->query($sql3) or die ($con3->error); 
    
    
    echo header("Location: borrowers.php");

}

