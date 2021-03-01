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

$sql = "SELECT returns_list.returns_id AS return_id, books_list.title AS book_name, 
users_list.name AS borrower_name, borrows_list.date_added AS borrow_date, returns_list.date_added AS return_date,
returns_list.status AS transaction_status

FROM books_list 

INNER JOIN borrows_list 
ON books_list.books_id = borrows_list.books_id 

INNER JOIN returns_list 
ON borrows_list.borrows_id = returns_list.borrow_id 

INNER JOIN users_list 
ON borrows_list.users_id = users_list.users_id
WHERE (books_list.title LIKE '%$search%' OR users_list.name LIKE '%$search%')
ORDER BY return_date DESC ";


$returns = $con->query($sql) or die ($con->error);
$returns_row = $returns->fetch_assoc();

?>


    <!-- SEARCH FORM -->

        <form class="form-inline my-2 my-lg-0" action="result_returned.php" method="get">
        <input class="form-control mr-sm-1" type="text" placeholder="Search"
      id="search" name="search">
        <button class="btn btn-secondary my-2 my-sm-0" id="search" type="submit">Search</button>
        </form>

    <!-- END SEARCH -->

  <br>

    <!-- LIST OF RETURNED -->

      <table class = "table table-hover">
      <thead>
          <tr class="table-primary">
              <th>BOOKS TITLE</th>
              <th>BORROWERS NAME</th>
              <th>BORROW DATE</th>
              <th>RETURN DATE</th>
              <th>STATUS</th>
          </tr>
      </thead>
      <tbody>
          <?php do{  ?>
              <tr>
                  <td><?php echo $returns_row['book_name']; ?></td>
                  <td><?php echo $returns_row['borrower_name']; ?></td>
                  <td><?php echo date('M j, Y',strtotime($returns_row['borrow_date'])); ?></td>
                  <td><?php echo date('M j, Y',strtotime($returns_row['return_date'])); ?></td>
                  <td><?php echo $returns_row['transaction_status']; ?></td>
              </tr>
           <?php }while($returns_row = $returns->fetch_assoc())  ?>
      </tbody>
  </table>

    <!-- END LIST OF RETURNED -->


    <!-- PAGINATION -->

        <div>
        <ul class="pagination">
            <li class="page-item disabled">
            <a class="page-link" href="#">&laquo;</a>
            </li>
            <li class="page-item active">
            <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="#">5</a>
            </li>
            <li class="page-item">
            <a class="page-link" href="#">&raquo;</a>
            </li>
        </ul>
    </div>

    <!-- END PAGINATION -->

<?php include("../template/footer.php"); ?>