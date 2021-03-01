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
$limit = 1000;
$page = isset($_GET['page']) ?  $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM books_list ORDER BY title LIMIT $start, $limit";
$books = $con->query($sql) or die ($con->error);
$books_row = $books->fetch_assoc();

$sql3 = "SELECT * FROM books_list WHERE status != 'Damaged'
AND status != 'Lost' ORDER BY title ";
$books3 = $con->query($sql3) or die ($con->error);
$books_rows2 = $books3->fetch_assoc();

$sql2 = "SELECT count(books_id) AS id FROM books_list";

$books2 = $con->query($sql2) or die ($con->error);
$booksCount = $books2->fetch_all(MYSQLI_ASSOC);
$total = $booksCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;
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

  <?php if($_SESSION['Access'] == "administrator"){ ?>

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
                  <a class="btn btn-primary" href="edit_books.php?book_id=<?php echo $books_row['books_id']; ?>">EDIT</a>
                  <?php }?>
                  <?php if($_SESSION['Access'] == "students"){ ?>
                  <a href="student_borrow.php?books_borrow=<?php echo $books_row['books_id']; ?>" name="borrow" type="submit" class="btn btn-primary">BORROW</a>
                  <?php }?>
                  </td>
              </tr>
           <?php }while($books_row = $books->fetch_assoc())  ?>
      </tbody>
  </table>

  <?php } ?>

    <!-- END LIST OF BOOKS -->

    <!-- LIST OF THESIS TITLE FOR STUDENTS -->

<?php if($_SESSION['Access'] == "students"){ ?>
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
                  <td><?php echo $books_rows2['title']; ?></td>
                  <td><?php echo $books_rows2['author']; ?></td>
                  <td><?php echo $books_rows2['year_published']; ?></td>
                  <td><?php echo $books_rows2['status']; ?></td>
                  <td><a href="student_borrow.php?books_borrow=<?php echo $books_rows2['books_id']; ?>" name="borrow" type="submit" class="btn btn-primary">BORROW</a></td>
              </tr>
           <?php }while($books_rows2 = $books3->fetch_assoc())  ?>
      </tbody>
  </table>

  <?php } ?>

    <!-- END LIST OF BOOKS -->

    <!-- PAGINATION -->

      <div>
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="books.php?page=<?= $Previous; ?>">&laquo; Previous</a>
            </li>
            <?php for($i = 1; $i<= $pages; $i++) : ?>
            <li class="page-item active">
            <a class="page-link" href="books.php?page=<?= $i; ?>"><? $i; ?>
            <?= $i; ?></a>
            <?php endfor; ?>
            </li>
            <li class="page-item">
            <a class="page-link" href="books.php?page=<?= $Next; ?>">Next &raquo;</a>
            </li>
        </ul>
    </div>

    <!-- END PAGINATION -->

<?php include("../template/footer.php"); ?>