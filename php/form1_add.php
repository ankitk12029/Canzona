<?php
header('Content-Type: application/json');

include "../form1.php";
include "../form1.html";


// Check connection
if ($conn->connect_error) {
  echo "Connection failed: " . $conn->connect_error;
} else {

  if ( isset($_POST["user_name"]) && !empty($_POST["user_name"]) && isset($_POST["password"]) && !empty($_POST["password"])
  && isset($_POST["fname"]) && !empty($_POST["fname"]) && isset($_POST["lname"]) && !empty($_POST["lname"]) && isset($_POST["email_id"]) && !empty($_POST["email_id"]) && isset($_POST["gender"]) && !empty($_POST["gender"]) ) {

    $user_name = $_POST["user_name"];
    $password =  password_hash(mysqli_real_escape_string($conn, $_POST["password"]), PASSWORD_BCRYPT);
    // $phno = $_POST["phno"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email_id=$_POST["email_id"];
    echo "Rp"; 

    $(document).ready(function(){
        $("input[type='button']").click(function(){
          var radioValue = $("input[name='gender']:checked").val();
            if(radioValue){
                 $gender=radioValue;
            }
        });
    });
    $gender=$_POST["gender"]
   

    $sql = "INSERT INTO user_details(fname, lname, user_name, password,email_id,gender)
            VALUES ('$user_name','$password','$fname', '$lname', '$email_id','$gender')";

    if (!mysqli_query($conn, $sql)) {
      echo statusMessage(500, "internal server error");
      die('Error: ' . mysqli_error($conn));

    } else {
      // echo "New record created successfully";
      $conn->close();
      $res = [
        'register' => TRUE
      ];
      echo json_encode([json_decode(statusMessage(200, "success")), $res]);
    }

  } else {
    echo statusMessage(400, "bad request");
  }

}
?>
