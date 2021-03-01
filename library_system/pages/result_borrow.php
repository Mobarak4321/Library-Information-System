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
$search = $_GET['search'];

$sql = "SELECT borrows_list.date_added AS 'date_added', borrows_list.status AS 'borrower_status', borrows_list.borrows_id AS borrow_id, 
books_list.books_id AS books_id, books_list.title AS title, 
users_list.name AS borrower_name, users_list.email AS email FROM borrows_list

INNER JOIN users_list
ON borrows_list.users_id = users_list.users_id

INNER JOIN books_list
ON borrows_list.books_id = books_list.books_id

WHERE borrows_list.status != 'Damaged' AND borrows_list.status != 'Returned' AND title LIKE '%$search%'
ORDER BY date_added DESC";

$borrows = $con->query($sql) or die ($con->error);
$borrows_row = $borrows->fetch_assoc();

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
          <?php do{  ?>
              <tr>
                  <td><?php echo $borrows_row['title']; ?></td>
                  <td><?php echo $borrows_row['borrower_name']; ?></td>
                  <td><?php echo $borrows_row['email']; ?></td>
                  <td><?php echo date('M j, Y',strtotime($borrows_row['date_added'])); ?></td>
                  <td><?php echo $borrows_row['borrower_status']; ?></td>
                  <td>
                  <a href="" class="btn btn-primary">RETURNED</a>
                  </td>
              </tr>
           <?php }while($borrows_row = $borrows->fetch_assoc())  ?>
      </tbody>
  </table>




<?php include("../template/footer.php"); ?>