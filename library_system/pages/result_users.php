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
$search = $_GET['search'];

$sql = "SELECT * FROM users_list WHERE name LIKE '%$search%' ORDER BY users_id DESC";
$users = $con->query($sql) or die ($con->error);
$users_row = $users->fetch_assoc();
?>

<!-- SEARCH FORM -->

<form class="form-inline my-2 my-lg-0" action="result.php" method="get">
    <input class="form-control mr-sm-1" type="text" placeholder="Search"
      id="search" name="search">
    <button class="btn btn-secondary my-2 my-sm-0" id="search" type="submit">Search</button>
        <a href="<?php echo("add_users.php"); ?>" style ="margin-left: 15px;" class="btn btn-success my-2 my-sm-0">ADD USERS</a>
  </form>

  <!-- END SEARCH -->

  <br>

      <!-- LIST OF THESIS TITLE -->

      <table class = "table table-hover">
      <thead>
          <tr class="table-primary">
              <th>NAME</th>
              <th>EMAIL</th>
              <th>USERNAME</th>
              <th>PASSWORD</th>
              <th>USERTYPE</th>
              <th>STATUS</th>
              <th>ACTION</th>
          </tr>
      </thead>
      <tbody>
          <?php do{  ?>
              <tr>
                  <td><?php echo $users_row['name']; ?></td>
                  <td><?php echo $users_row['email']; ?></td>
                  <td><?php echo $users_row['username']; ?></td>
                  <td><?php echo $users_row['userpassword']; ?></td>
                  <td><?php echo $users_row['access']; ?></td>
                  <td><?php echo $users_row['status']; ?></td>
                  <td>
                  <a href="" class="btn btn-primary">EDIT</a>
                  <a href="" class="btn btn-primary">REMOVE</a>
                  </td>
              </tr>
           <?php }while($users_row = $users->fetch_assoc())  ?>
      </tbody>
  </table>

<?php include("../template/footer.php"); ?>