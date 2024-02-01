<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
    <!-- <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.min.js"></script> -->
</head>
<body>
    
</body>
</html>
<?php
    include "../server/index.php";
    $errors = array();
    $username ="";
    $password = "";

    if (isset($_POST['btn-login'])) {
         $errors = array();
        $username =  $_POST['username'];
        $password = $phone =  $_POST['password'];
        
        if (empty($username)) {
            $errors['user'] = "Required username";
        }
        if (empty($password)) {
            $errors['pass'] = "Required password";
        }
        if (count($errors)===0) {

            $sqli = "SELECT * FROM `register` WHERE  `username` = '$username' AND `password` = '$password' LIMIT 1 ";
            $rest = $conn->query($sqli);
       
            if($rest->num_rows ==1 ) {
                session_start();
                $_SESSION['username']= $username;
                echo "
                <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Login successfully',
                    showConfirmButton: false,
                    timer: 1500
                  })
                    .then(function(res){
                        if(true){
                            window.location='../dashboard'}});       
                </script>
            ";
            }
        else{
            echo "
                <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'User Not Found',
                    showConfirmButton: false,
                    timer: 1500
                  })
                    .then(function(res){
                        if(true){
                            window.location='./'}}); 
                </script>
            ";
            }
        }
    }

?>