<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lineawesome/lineawesome/css/line-awesome.css">
    <script src="../jquery-ajax.js"></script>
    <script src="../jquery.js"></script>
    <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
    <!-- <script src="../sweetalert/sweetalert/dist/sweetalert.min.js"></script> -->
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">

</head>
<body>
    
</body>
</html>
<?php
 include "../server/index.php";
 // global $conn;
$errors = array();
$fullname = "";
$username = "";
$phone = "";
$email = "";
$password = "";
$cpassword = "";

if (isset($_POST['btn'])) {
 $errors = array();
 $fullname = $_POST['fullname'];
 $username = $_POST['username'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $cpassword = $_POST['cpassword'];
 $roll = 1;
 $token = substr(time()*rand(),1,6);
 $verify = 0;

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
//  $sql = "SELECT * FROM `register` WHERE `username` = ? OR `email` = ? OR `phone` = ?";
//  $stmt = $conn->prepare($sql);
 
//  $stmt->bind_param('sss', $username, $email, $phone);
 
//  $stmt->execute();
 
//  $ress = $stmt->get_result();
//  $row_count = $ress->num_rows;

//  if ($row_count === 0 ) {
//    $errors['exist'] = "User already Exist inside";
//  }
 if (count($errors) === 0) {

// SQL query
$query = "INSERT INTO register(`fullname`, `username`, `phone`, `email`, `password`, `roll`, `token`, `verify`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare statement
$stmt = $conn->prepare($query);
// Bind parameters
// $password = password_hash($password, PASSWORD_DEFAULT);
$stmt->bind_param("sssssiii", $fullname, $username, $phone, $email, $password, $roll, $token, $verify);

// Execute statement
$res = $stmt->execute();

// Check if the execution was successful
if ($res) {
  echo "
    <script>
         Swal.fire({
           position: 'top-end',
           icon: 'success',
           title: 'Register Successfully',
           showConfirmButton: false,
           timer: 2000})
          .then(function(res) {
            if (true) {
              window.location.href = '../login';
            }
          })
    </script>
  ";
    // echo "<div class='alert alert-success'>Register Successfully</div>";
    // header("location: ../login");
      //  echo "Thank you for register";
      // header("location:../login");
     }else{
      // echo "<div class='alert alert-danger'>Rrgister Have an Error</div>";
    // header("location: ../login");
       echo "
           <script>
          //      Swal({
          //      position: 'top-end',
          //      icon: 'error',
          //      title: 'Have an error',
          //      showConfirmButton: false,
          //      timer: 2000
          //  })
          swal.fire('Error','Rrgister Have an Error','error')
          .then(res){
             if(true){
               window.location='../register'
             }
           }
     </script>
    ".$conn->error;
     }
// Close the statement
// $stmt->close(); 
}
}

?>