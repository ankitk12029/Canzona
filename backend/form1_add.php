<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include "../backend/form1.php";


// Check connection
if ($conn->connect_error) {
  echo "Connection failed: " . $conn->connect_error;
}
else {

  if ( isset($_POST["user_name"]) && !empty($_POST["user_name"]) && isset($_POST["fname"]) && !empty($_POST["fname"]) && isset($_POST["lname"]) && !empty($_POST["lname"]) && isset($_POST["email_id"]) && !empty($_POST["email_id"]) && isset($_POST["gender"]) && !empty($_POST["gender"]) && isset($_POST["password"]) && !empty($_POST["password"]) ) {

    $user_name = $_POST["user_name"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email_id=$_POST["email_id"];
    $gender=$_POST["gender"];
    $password =  password_hash(mysqli_real_escape_string($conn, $_POST["password"]), PASSWORD_BCRYPT);

    $sql = "INSERT INTO user_details(user_name,fname, lname, email_id,gender,password)
            VALUES ('$user_name','$fname', '$lname','$email_id','$gender','$password')";

    if (!mysqli_query($conn, $sql)) {
      echo "internal server error";
      die('Error: ' . mysqli_error($conn));

    } else {
      // echo "New record created successfully";
      $conn->close();
      $res = [
        'register' => TRUE
      ];
      echo json_encode($res);
    }

  } else {
    echo "bad request";
  }

}

?>
