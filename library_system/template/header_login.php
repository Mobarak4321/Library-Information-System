<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE LIBRARY SYSTEM SYSTEM</title>

    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.js"></script>
 </head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="">CKCST ONLINE LIBRARY SYSTEM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
    </ul>
    <?php if($_SESSION['Access'] == "administrator"){ ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href="<?php echo("books.php"); ?>" >BOOKS</a></li>
    </ul>
    <?php }?>
    <?php if($_SESSION['Access'] == "administrator"){ ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href="<?php echo("borrowers.php"); ?> ">BORROWER</a></li>
    </ul>
    <?php }?>
    <?php if($_SESSION['Access'] == "administrator"){ ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href=<?php echo("returned.php"); ?> " >RETURNED</a></li>
    </ul>
    <?php }?>
    <?php if($_SESSION['Access'] == "administrator"){ ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href="<?php echo("lost.php"); ?>" >LOST</a></li>
    </ul>
    <?php }?>
    <?php if($_SESSION['Access'] == "administrator"){ ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href="<?php echo("users.php"); ?>" >USERS</a></li>
    </ul>
    <?php }?>
    <?php if($_SESSION['Access'] == "administrator"){ ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href="" >REPORT</a></li>
    </ul>
    <?php }?>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href="<?php echo("logout.php"); ?>" >LOGOUT</a></li>
    </ul>
  </div>
</nav>

<br>
<br>

<div class="container">

    
