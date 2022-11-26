<?php
  $title = 'Sign up';
  $description = 'sign up for your new account here !';
  require "./templates/header.php";
  //include 'database.php';
  //$database = new database();
  //if($_POST['fname'] != null && $_POST['lname'] != null && $_POST['email'] != null && $_POST['bio'] != null){
  //  $database->insertData();
//  }
?>
<main class="homepage">
  <section class="masthead">
    <div>
      <h1>Welcome to our Website</h1>
    </div>
    <!-- if the account was deleted -->
    <?php if(isset($_GET['msg1'])){ ?>
    <div class="">
      <!-- display this message -->
        <h2>Your Record Has Been Deleted, Sad So See You Go</h2>
    </div>
    <?php } ?>
  </section>
  <!-- form to create your account -->
  <section>
    <form method="POST">
      <h2>Sign Up Now!</h2>
      <h3>Name</h3>
      <div>
        <p><input type="text" name="fname" placeholder="First Name" required></p>
        <p><input type="text" name="lname" placeholder="Last Name" required></p>
      </div>
      <h3>Email</h3>
      <p><input type="email" name="email" placeholder="Email" required></p>
      <h3>Bio</h3>
      <input type="text" name="bio">
      <div>
        <input type="submit" name="btnSubmit" value="Submit">
        <input type="reset" name="btnReset" value="Reset">
      </div>
    </form>
      <?php
        // adding the database file
        require_once 'database.php';
        // connecting to the database
        $database->connect();
        // adding the account to the database
        $database->create();
      ?>
  </section>
</main>
<?php
 // adding the footer
  require "./templates/footer.php";
?>
