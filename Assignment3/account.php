
<?php
  // inserting the title of the page
  $title = 'Account Info';
  // inserting the description of the page
  $description = 'view your account here !';
  // adding the header
  require "./templates/header.php";
  // requiring the database only once
  require_once 'database.php';
  // connecting to the database
  $database->connect();
  // getting the id
  $id = $_GET['id'];
 // storing the credentials with the getCredential method created using the id
  $fname = $database->getCredential($id, 'fname');
  $lname = $database->getCredential($id, 'lname');
  $email = $database->getCredential($id, 'email');
  $bio = $database->getCredential($id, 'bio');
?>
<main class="account-page">
  <section class="masthead">
    <div>
      <h1>View Account Info</h1>
    </div>
  </section>
  <?php
  // if the edit button hasnt been pressed yet then display the account
    if(!isset($_POST['edit'])){
   ?>
  <section class="view-account">
    <section>
      <div>
        <!-- add blank image here -->
        <img src="./img/empty-profile.jpeg" alt="default profile image">
        <h3><?php echo $fname . " " . $lname;?></h3>
      </div>
      <table>
        <tr>
          <th>Email: </th>
          <td><?php echo $email;?></td>
        </tr>
        <tr>
          <th>Bio:</th>
          <td><?php echo $bio;?></td>
        </tr>
      </table>
      <form method="POST">
        <input type="submit" name="edit" value="Edit" >
      </form>
  </section>

  <?php
}
  // if the edit button was pressed, display the view to be able to change the credentials of the account
    if(isset($_POST['edit'])){
  ?>
  <section class="edit-account">
    <form method="post">
      <!-- add blank image here -->
      <img src="./img/empty-profile.jpeg" alt="default profile image">
      <div>
        <p><input type="text" name="fname" placeholder="<?php echo $fname; ?>"></p>
        <p><input type="text" name="lname" placeholder="<?php echo $lname; ?>"></p>
      </div>
      <div>
        <div>
          <h2>Email:</h2>
          <p><input type="email" name="email" placeholder="<?php echo $email; ?>"></p>
        </div>
        <div>
          <h2>Bio:</h2>
          <input type="text" name="bio" placeholder="<?php echo $bio; ?>" >
        </div>
      </div>
      <input type="submit" name="replace" value="Make Changes" >
      <input type="submit" name="delete" value="Delete Account" >
    </form>
    <?php
    }
    // if they pressed the make changes button change the values in the database
    if(isset($_POST['replace'])){
      $database->edit($id, $fname, $lname, $email, $bio);
      $fname = $database->getCredential($id, 'fname');
      $lname = $database->getCredential($id, 'lname');
      $email = $database->getCredential($id, 'email');
      $bio = $database->getCredential($id, 'bio');
    }
    // if the delete button was replaced take it out of the database and return to the home screen
     if(isset($_POST['delete'])){
      $database->deleteAccount($id);
    }
    ?>
  </section>
</main>
<?php
// adding the footer
  require "./templates/footer.php";
?>
