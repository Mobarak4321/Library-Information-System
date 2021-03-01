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
$limit = 1000;
$page = isset($_GET['page']) ?  $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT borrows_list.borrows_id AS borrow_id, books_list.books_id AS books_id,
books_list.title AS title, 
users_list.name AS borrower_name, users_list.email AS email, borrows_list.status AS 'borrower_status',
borrows_list.date_added AS 'date_added'
 FROM borrows_list

INNER JOIN users_list
ON borrows_list.users_id = users_list.users_id

INNER JOIN books_list
ON borrows_list.books_id = books_list.books_id

WHERE borrows_list.status != 'Returned' AND borrows_list.status != 'Lost' AND borrows_list.status != 'Damaged'
ORDER BY date_added DESC LIMIT $start, $limit";

$borrows = $con->query($sql) or die ($con->error);
$borrows_row = $borrows->fetch_all();

$sql2 = "SELECT count(borrows_id) AS id FROM borrows_list WHERE status != 'Returned'";

$borrows2 = $con->query($sql2) or die ($con->error);
$borrowCount = $borrows2->fetch_all(MYSQLI_ASSOC);
$total = $borrowCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;

?>


        <!-- SEARCH FORM -->

        <form class="form-inline my-2 my-lg-0" action="result_borrow.php" method="get">
        <input class="form-control mr-sm-1" type="text" placeholder="Search"
      id="search" name="search">
        <button class="btn btn-secondary my-2 my-sm-0" id="search" type="submit">Search</button>
        </form>

        <!-- END SEARCH -->

  <br>

        <!-- LIST OF THESIS TITLE -->

      <table class = "table table-hover">
      <thead>
          <tr class="table-primary">
              <th>BOOKS TITLE</th>
              <th>BORROWERS NAME</th>
              <th>BORROWERS EMAIL</th>
              <th>DATE</th>
              <th>STATUS</th>
              <th>ACTION</th>
          </tr>
      </thead>
        <tbody>
          <?php foreach ($borrows_row as $key => $value) :  ?>
                <td><?php echo $borrows_row[$key][2]?></td>
                <td><?php echo $borrows_row[$key][3]?></td>
                <td><?php echo $borrows_row[$key][4]?></td>
                <td><?php echo date('M j, Y',strtotime($borrows_row[$key][5]))?></td>
                <td><?php echo $borrows_row[$key][5]?></td>
                <td>
                <a href="damage_books.php?damage_book=<?php echo $borrows_row[$key][0];
                  $_SESSION['books_id'] = $borrows_row[$key][1];?>" class="btn btn-primary">DAMAGED</a>
                <a href="lost_books.php?lost_book=<?php echo $borrows_row[$key][0];
                  $_SESSION['books_id'] = $borrows_row[$key][1];?>" class="btn btn-primary">LOST</a>
                <a href="return_books.php?return_book=<?php echo $borrows_row[$key][0];
                  $_SESSION['books_id'] = $borrows_row[$key][1];?>" class="btn btn-primary">RETURNED</a>
                  </td>
                  <tr>
           <?php endforeach ?>
      </tbody>
  </table>

        <!-- END OF THESIS TITLE -->


        <!-- PAGINATION -->

      <div>
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="borrows.php?page=<?= $Previous; ?>">&laquo; Previous</a>
            </li>
            <?php for($i = 1; $i<= $pages; $i++) : ?>
            <li class="page-item active">
            <a class="page-link" href="borrows.php?page=<?= $i; ?>"><? $i; ?>
            <?= $i; ?></a>
            <?php endfor; ?>
            </li>
            <li class="page-item">
            <a class="page-link" href="borrows.php?page=<?= $Next; ?>">Next &raquo;</a>
            </li>
        </ul>
    </div>

    <!-- END PAGINATION -->


<?php include("../template/footer.php"); ?>