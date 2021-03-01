<?php

if(!isset($_SESSION)){
    session_start();  
 }

 
 if($_SESSION['Access'] == "administrator"){  
  
    $_SESSION['UserLogin'];
   
}else {
    echo header("Location: books.php");
}

include_once("../template/header_login.php");
include_once("../connection/server.php"); 

$con = connection();
$limit = 20;
$page = isset($_GET['page']) ?  $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT losts_list.losts_id AS lost_id, books_list.title AS book_name, 
users_list.name AS borrower_name, borrows_list.date_added AS borrow_date, losts_list.date_added AS lost_date,
losts_list.status AS transaction_status

FROM books_list 

INNER JOIN borrows_list 
ON books_list.books_id = borrows_list.books_id 

INNER JOIN losts_list 
ON borrows_list.borrows_id = losts_list.borrow_id 

INNER JOIN users_list 
ON borrows_list.users_id = users_list.users_id 
ORDER BY lost_date DESC LIMIT $start, $limit";


$losts = $con->query($sql) or die ($con->error);
$lost_rows = $losts->fetch_assoc();

$sql2 = "SELECT count(losts_id) AS id FROM losts_list";

$losts2 = $con->query($sql2) or die ($con->error);
$lostCount = $losts2->fetch_all(MYSQLI_ASSOC);
$total = $lostCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;


?>


    <!-- SEARCH FORM -->

        <form class="form-inline my-2 my-lg-0" action="result_returned.php" method="get">
        <input class="form-control mr-sm-1" type="text" placeholder="Search"
      id="search" name="search">
        <button class="btn btn-secondary my-2 my-sm-0" id="search" type="submit">Search</button>
        </form>

    <!-- END SEARCH -->

  <br>

    <!-- LIST OF LOSTS -->

      <table class = "table table-hover">
      <thead>
          <tr class="table-primary">
              <th>BOOKS TITLE</th>
              <th>BORROWERS NAME</th>
              <th>BORROW DATE</th>
              <th>REPORT DATE</th>
          </tr>
      </thead>
      <tbody>
          <?php do{  ?>
              <tr>
                  <td><?php echo $lost_rows['book_name']; ?></td>
                  <td><?php echo $lost_rows['borrower_name']; ?></td>
                  <td><?php echo date('M j, Y',strtotime($lost_rows['borrow_date'])); ?></td>
                  <td><?php echo date('M j, Y',strtotime($lost_rows['lost_date'])); ?></td>
              </tr>
           <?php }while($lost_rows = $losts->fetch_assoc())  ?>
      </tbody>
  </table>

    <!-- END LIST OF RETURNED -->


    <!-- PAGINATION -->

        <div>
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="returned.php?page=<?= $Previous; ?>">&laquo; Previous</a>
            </li>
            <?php for($i = 1; $i<= $pages; $i++) : ?>
            <li class="page-item active">
            <a class="page-link" href="returned.php?page=<?= $i; ?>"><? $i; ?>
            <?= $i; ?></a>
            <?php endfor; ?>
            </li>
            <li class="page-item">
            <a class="page-link" href="returned.php?page=<?= $Next; ?>">Next &raquo;</a>
            </li>
        </ul>
    </div>

    <!-- END PAGINATION -->

<?php include("../template/footer.php"); ?>