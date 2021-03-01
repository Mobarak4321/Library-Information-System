<?php

if(!isset($_SESSION)){
    session_start();  
 }

 
 if($_SESSION['Access'] == "administrator" || $_SESSION['Access'] == "students"){  
    
    $_SESSION['UserLogin'];
   
}else {
    echo header("Location: index.php");
}

include_once("../template/header_login.php");
include_once("../connection/server.php"); 

$con = connection();
$search = $_GET['search'];

$sql = "SELECT * FROM books_list WHERE title LIKE '%$search%' OR author LIKE '%$search%' ORDER BY title";
$books = $con->query($sql) or die ($con->error);
$books_row = $books->fetch_assoc();
?>

<!-- SEARCH FORM -->


<form class="form-inline my-2 my-lg-0" action="result_books.php" method="get">
    <input class="form-control mr-sm-1" type="text" placeholder="Search"
      id="search" name="search">
    <button class="btn btn-secondary my-2 my-sm-0" id="search" type="submit">Search</button>
        <?php if($_SESSION['Access'] == "administrator"){ ?>
        <a href="<?php echo("add_books.php"); ?>" style ="margin-left: 15px;"class="btn btn-success my-2 my-sm-0">ADD BOOKS</a>
        <?php }?>
</form>

  <!-- END SEARCH -->

  <br>

      <!-- LIST OF THESIS TITLE -->

      <table class = "table table-hover">
      <thead>
          <tr class="table-primary">
              <th>BOOKS TITLE</th>
              <th>AUTHOR</th>
              <th>YEAR</th>
              <th>STATUS</th>
              <th>ACTION</th>
          </tr>
      </thead>
      <tbody>
          <?php do{  ?>
              <tr>
                  <td><?php echo $books_row['title']; ?></td>
                  <td><?php echo $books_row['author']; ?></td>
                  <td><?php echo $books_row['year_published']; ?></td>
                  <td><?php echo $books_row['status']; ?></td>
                  <td>
                  <?php if($_SESSION['Access'] == "administrator"){ ?>
                  <a href="" class="btn btn-primary" href="books.php?books_id=<?php echo $books_row['books_id']; ?>">EDIT</a>
                  <a href="" class="btn btn-primary" href="books.php?books_id=<?php echo $books_row['books_id']; ?>">REMOVE</a>
                  <?php }?>
                  <?php if($_SESSION['Access'] == "students"){ ?>
                  <a href="student_borrow.php?books_borrow=<?php echo $books_row['books_id']; ?>" name="borrow" type="submit" class="btn btn-primary">BORROW</a>
                  <?php }?>
                  </td>
              </tr>
           <?php }while($books_row = $books->fetch_assoc())  ?>
      </tbody>
  </table>

<?php include("../template/footer.php"); ?>