<?php
// function register(){?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  </head>
  <body>
    
  </body>
  </html>
  <?php
  //register function
  function register(){
    include "./server/index.php";
    // global $conn;
  $errors = array();
  $fullname = "";
  $username = "";
  $phone = "";
  $email = "";
  $password = "";
  $cpassword = "";

  if (isset($_post['btn'])) {
    $errors = array();
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $roll = 1;
    $token = substr(time()*rand(),1,6);

    if (empty($fullname)) {
      $errors['fullname'] = "Require Fullname";
    }
    if (empty($username)) {
      $errors['username'] = "Require Username";
    }
    if (empty($email)) {
      $errors['email'] = "Require Email Address";
    }
    if (empty($phone)) {
      $errors['phone'] = "Require Phone Number";
    }
    if (empty($password)) {
      $errors['password'] = "Require Password";
    }
    if (empty($cpassword)) {
      $errors['cpassword'] = "Require Repeat Password";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
      $errors['validate'] = "Invalid Email Adress";
    }
    if ($password != $cpassword)  {
      $errors['pass'] = "Password Mix Match";
    }

    $sql = "SELECT * FROM register WHERE username = ? OR email = ? OR phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $phone);
    $ress = $stmt->execute();
    $ress = $stmt->get_result();
    if ($ress->num_rows >1 ) {
      $errors['exist'] = "User already Exist inside";
    }
    if (count($errors) === 0) {
    $query = "INSERT INTO register(`fullname`, `username`, `phone`,`email`,`password`,`roll`,`token`)VALUE(?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $res = $stmt->bind_param("sssssii", $fullname, $username, $phone, $email, $password,$roll,$token);
    if ($res) {
      echo "
      <script>
          Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Register Successfully',
          showConfirmButton: false,
          timer: 2000
      })
      .then(res){
        if(true){
          window.location='../login'
        }
      }
    </script>
      ";
    }else{
      echo "
          <script>
              Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Have an error',
              showConfirmButton: false,
              timer: 2000
          })
          .then(res){
            if(true){
              window.location='../register'
            }
          }
    </script>
  ".$conn->error;
    }
  }
}
}   
register();
//login function
function login() {
  session_start();
include "../server";
include "./function";
login();
$errors = array();
$username = "";
$password = "";
if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $errors['username'] = "Username Require";
    }
    if (empty($password)) {
        $errors['password'] = "Password Required";

        if (count($errors) === 0) {
            $mysqli = "SELECT * FROM register WHERE username = ? AND `password` = ?";
            $stmt = $conn->prepare( $mysqli);
            $stmt->bind_param("ss", $username, $password);
            $ress = $stmt->execute();
            // $ress = $stmt->get_result();
            if ($ress->num_rows == 1) {
              $_SESSION['users'] = $username;
              echo "
                  <script>
                      Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Have an error',
                      showConfirmButton: false,
                      timer: 2000
                  })
                  .then(res){
                    if(true){
                      window.location='../dashboard'
                    }
                  }
            </script>
      ";
            }else {
              echo "
                  <script>
                      Swal.fire({
                      position: 'top-end',
                      icon: 'error',
                      title: 'Have an error',
                      showConfirmButton: false,
                      timer: 2000
                  })
                  .then(res){
                    if(true){
                      window.location='../login'
                    }
                  }
            </script>
          ".$conn->error;
            }

        }
    }

}
}
//insert data into user record statement
function users(){
  include "../server";
  $errors = array();
  $link = "";
  $password = "";
  if (isset($_POST['btn'])) {
      $errors = array();
      $link = $_POST['link'];
      $password = $_POST['password'];

      if (empty($link && $password)) {
          $errors['exit'] = "Pleased Field This Field";    
      }
      if (count($errors) === 0) {
         $password = password_hash($password, PASSWORD_DEFAULT );
      
      $sql = "INSERT INTO users(`link`, `password`)VALUES(?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $link, $password);
      $res = $stmt->execute();

      if ($res === true) {
          echo "<script>
              Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Addind Successfully',
                  showConfirmButton: false,
                  timer: 1500
              })
                  .then(function(res){
                      if(true){
                          window.location='../dashboard'}});  
          </script>";
      }else{
          echo "<script>
          Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Addind Successfully',
              showConfirmButton: false,
              timer: 1500
          })
              .then(function(res){
                  if(true){
                      window.location='../dashboard'}});  
      </script>".$conn->error;
      }
  }}
}
?>