<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
    <script src="./sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
</head>
<body>
    
</body>
</html>
<?php
session_start();
session_destroy();
echo "<script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Logout Successfully',
            showConfirmButton: false,
            timer: 1500
        })
            .then(function(res){
                if(true){
                    window.location='./login'}});
    </script>";
?>