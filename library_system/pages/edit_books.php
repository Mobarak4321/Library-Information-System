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
    $book_id = $_GET['book_id'];

    $sql = "SELECT * FROM books_list WHERE books_id = '$book_id'";
    $books = $con->query($sql) or die ($con->error);
    $books_row = $books->fetch_assoc();


    if (isset($_POST['submit']) ){

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_published = $_POST['year_published'];
    $status = $_POST['status'];
    $sql = "UPDATE books_list SET title='$title', author='$author', year_published='$year_published', 
    status='$status' WHERE books_id= $book_id";
    $con2->query($sql) or die ($con2->error);

    echo header("Location: books.php");
    }
?>

<form action="" method="post">
    <h1 style="text-align:center;">UPDATE BOOKS</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Books Title" id="inputDefault" name="title"
            value="<?php echo $books_row['title']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Author" id="inputDefault" name="author"
            value="<?php echo $books_row['author']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Year" id="inputDefault" name="year_published"
            value="<?php echo $books_row['year_published']; ?>">
        </div>
        <div class="form-group">
                <select class="form-control" name="status" value="<?php echo $books_row['status']; ?>">
                <option value="disabled Selected">Select Status</option>
                <option value="Good">Good</option>
                <option value="Damaged">Damaged</option>
                <option value="Lost">Lost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">SUBMIT</button>
    </form>

<?php include("../template/footer.php"); ?>