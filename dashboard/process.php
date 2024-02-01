<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
</head>
<body>
    
</body>
</html>
<?php
    include "../server/index.php";
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>
    // success
    Swal.fire({
      position: 'top-end',
      icon: 'info',
      title: 'Login Firsr Before Enter',
      showConfirmButton: false,
      timer: 3500
  }).then((res)=>{window.location='../login'});
  </script>";
  exit();
}
    // session_start();
    $errors = array();
    $link = "";
    $password = "";
    if (isset($_POST['btn'])) {
        $errors = array();
        $link = $_POST['link'];
        $password = $_POST['password'];
        $username = $_SESSION['username'];

        if (empty($link && $password)) {
            $errors['exit'] = "Pleased Field Link & Password";    
        }
        if (count($errors) === 0) {
        //    $password = password_hash($password, PASSWORD_DEFAULT );
        $sql = "INSERT INTO users(`link`, `password`, `username`)VALUES(?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $link, $password, $username);
        $res = $stmt->execute();

        if ($res) {
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
                title: 'Adding Successfully',
                showConfirmButton: false,
                timer: 1500
            })
                .then(function(res){
                    if(true){
                        window.location='../dashboard'}});  
        </script>".$conn->error;
        }
    }}


//EDIT DATA FROM DATABASE
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $edit = $_GET['edit'];
    $sql = "SELECT * FROM users WHERE id = $edit";
    $success = $conn->query($sql);
    $row2 = $success->fetch_assoc();

    if ($update === true) {
        $id = $row2['id'];
        $link = $row2['link'];
        $password  = $row2['password'];
    }
}

//UPDATE DATABASE
if (isset($_POST['btn-update'])) {
    $id = $_POST['hidden'];
    $link = $_POST['link'];
    $password = $_POST['password'];

    $sql2 = "UPDATE users SET link = '$link', `password` = '$password' WHERE id = $id";
    $ress = $conn->query($sql2);
    if ($ress === true) {
        echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Update Successfully',
                showConfirmButton: false,
                timer: 1500
            })
                .then(function(res){
                    if(true){
                        window.location='./'}});
        </script>";
    }
}

?>