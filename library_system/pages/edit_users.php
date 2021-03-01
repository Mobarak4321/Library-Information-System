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
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM users_list WHERE users_id = '$user_id'";
    $users = $con->query($sql) or die ($con->error);
    $users_row = $users->fetch_assoc();

    if (isset($_POST['submit']) ){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $userpassword = $_POST['userpassword'];
        $staus = $_POST['status'];
        $sql = "UPDATE users_list SET name='$name', email='$email', username='$username', userpassword='$userpassword',
        status='$staus' WHERE users_id=$user_id";
        $con2->query($sql) or die ($con2->error);
    
        echo header("Location: users.php");
        }
?>

<form action="" method="post">
    <h1 style="text-align:center;">UPDATE USERS ACCOUNT</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" id="inputDefault" name="name"
            value="<?php echo $users_row['name']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" id="inputDefault" name="email"
            value="<?php echo $users_row['email']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" id="inputDefault" name="username"
            value="<?php echo $users_row['username']; ?>">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" id="inputDefault" name="userpassword"
            value="<?php echo $users_row['userpassword']; ?>">
        </div>

        <div class="form-group">
                <select class="form-control" name="status" value="<?php echo $users_row['status']; ?>">
                <option value="disabled Selected">Select Status</option>
                <option value="Activate">Activate</option>
                <option value="Deactivate">Deactivate</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submit">SUBMIT</button>
    </form>

<?php include("../template/footer.php"); ?>