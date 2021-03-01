<?php

if(!isset($_SESSION)){
    session_start();  
 }

 
 if($_SESSION['Access'] == "administrator"){  
  
    $_SESSION['UserLogin'];
   
}else {
    echo header("Location: index.php");
}

    include_once("../template/header_login.php");
    include_once("../connection/server.php");

    $con = connection();
    $con2 = connection();


    if (isset($_POST['submit']) ){

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_published = $_POST['year_published'];
    $status = $_POST['status'];
    $sql = "INSERT INTO `books_list`(`title`, `author`, `year_published`,`status` ) VALUES ('$title', 
    '$author', '$year_published', '$status')";
    $con2->query($sql) or die ($con2->error);

    echo header("Location: books.php");
    }
?>

<form action="" method="post">
    <h1 style="text-align:center;">ADD BOOKS</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Books Title" id="inputDefault" name="title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Author" id="inputDefault" name="author">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Year" id="inputDefault" name="year_published">
        </div>
        <div class="form-group">
                <select class="form-control" name="status">
                <option value="disabled Selected">Select Status</option>
                <option value="Good">Good</option>
                <option value="Damaged">Damaged</option>
                <option value="Lost">Lost</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submit">SUBMIT</button>
    </form>

<?php include("../template/footer.php"); ?>