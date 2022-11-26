
<!doctype html>
<!-- we will close the html element in our footer template -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- create a dynamic title -->
    <title><?php echo $title;?></title>
    <!-- create a dynamic description -->
    <meta name="description" content="<?php echo $description;?>">
    <meta name="robots" content="noindex, nofollow">
    <!-- add our CSS -->
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <!-- the body element will be closed in our footer template -->
  <body>
    <header>
      <!-- adding the logo in a div -->
      <div class="">
        <a href="index.php"><img src="./img/logo.png" alt="header logo"></a>
      </div>
      <!-- creating the navigation for the header -->
      <nav>
        <!-- unordered list for the page navigation buttons -->
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="account.php">My Account</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </nav>
    </header>
