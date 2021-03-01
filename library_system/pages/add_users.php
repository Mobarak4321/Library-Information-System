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

        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $userpassword = $_POST['userpassword'];
        $access = $_POST['access'];
        $sql = "INSERT INTO `users_list`(`name`, `email`, `username`,`userpassword`,`access`, `status`) VALUES 
        ('$name','$email', '$username', '$userpassword', '$access', 'Activate')";
        $con2->query($sql) or die ($con2->error);
    
        echo header("Location: users.php");
        }
?>

<form action="" method="post">
    <h1 style="text-align:center;">ADD USERS ACCOUNT</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" id="inputDefault" name="name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" id="inputDefault" name="email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" id="inputDefault" name="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" id="inputDefault" name="userpassword">
        </div>

        <div class="form-group">
                <select class="form-control" name="access">
                <option value="disabled Selected">Select User Type</option>
                <option value="administrator">Administrator</option>
                <option value="students">Students</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submit">SUBMIT</button>
    </form>

<?php include("../template/footer.php"); ?>