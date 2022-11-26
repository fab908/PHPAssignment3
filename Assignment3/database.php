<?php
class Database{
  // creating variables for the connection
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "assignment3";
  public $con;


  public function connect(){
    //making the connection
    $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database, 4306);
    // if it didnt connect then display it
    if(mysqli_connect_error()){
      trigger_error("Failed to connect: " . mysqli_connect_error());
    }else{
      return $this->con;
    }
  }

  public function create(){
    if(isset($_POST['btnSubmit'])){
      // storing the data into variables
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $bio = $_POST['bio'];
      $query = "INSERT INTO accounts(fname,lname,email,bio) VALUES('$fname','$lname','$email','$bio')";
      //actually submitting the query
      $sql = $this->con->query($query);
      // getting the id number associated with the account created
      $query = "SELECT * FROM accounts WHERE email = '$email' AND fname = '$fname' AND lname = '$lname' AND bio = '$bio'";
      $sql = $this->con->query($query);
      $sql = $sql->fetch_assoc();
      $id = $sql['id'];
      //if its true you get redirected
      if($sql == true){
        // append the id number
        $url = "account.php?id=" . $id;
        Header("Location: " . $url);
        return true;
      }else{
        echo "Could not add the record";
      }

    }
  }
// not even using this im getting the variables from the getCredentials function below
public function read($id){
  // selecting all from the proper id
    $query = "SELECT * FROM accounts WHERE id = '$id'";
    // running the query
    $result = $this->con->query($query);
    // getting the credentials and storing them in variables
    $result = $result->fetch_assoc();
    $fname = $result['fname'];
    $lname = $result['lname'];
    $email = $result['email'];
    $bio = $result['bio'];
    ?>
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
    </section>
    <?php
}
// edits the account credentials; takes in all of the current credentials
public function edit($id, $fname, $lname, $email, $bio){
  // storing the data into variables if they are not empty
  if($_POST['fname'] != ""){
    $fname = $_POST['fname'];
  }
  if($_POST['lname'] != ""){
    $lname = $_POST['lname'];
  }
  if($_POST['email'] != ""){
    $email = $_POST['email'];
  }
  if($_POST['bio'] != ""){
    $bio = $_POST['bio'];
  }
  // updates the row in the database using the id
  $query = "UPDATE accounts SET fname = '$fname',lname = '$lname', email = '$email', bio = '$bio' WHERE id = '$id'";
  //actually submitting the query
  $sql = $this->con->query($query);
  //if its true you get redirected
  if($sql == true){
    $url = "account.php?id=" . $id;
    Header("Location: " . $url);// append the id
    return true;
  }else{
    echo "Could not add the record";
  }
}
// deleting the account from the database
public function deleteAccount($id){
  // sql query to delete it using the id
  $query = "DELETE FROM accounts WHERE id = '$id'";
  // executing the query
  $sql = $this->con->query($query);
  // if the query happened, redirect to the home page with the message saying it was deleted
  if($sql == true){
    header("Location:index.php?msg1='deleted'");
  }else{
    // else say it could not be deleted
    echo "<p>Could not delete the record</p>";
  }
}
// this is a function to get the credentials associated to the id.
// enter the id, then which credential youre looking for ex: id number, 'fname' to get the first name
public function getCredential($id, $row){
  // sql query
  $query = "SELECT * FROM accounts WHERE id = '$id'";
  // run the query
  $result = $this->con->query($query);
  // get all the credentials
  $result = $result->fetch_assoc();
  //result will equal whatever youre looking for
  $result = $result[$row];
  return $result;
  }
}
$database = new Database();
?>
