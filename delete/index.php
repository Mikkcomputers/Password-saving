<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
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
if (isset($_GET['del'])) {
    $del = $_GET['del'];

    $sql_del = "DELETE FROM users WHERE id = $del";
    // $sql_del = "DELETE FROM `users` WHERE $del";
    // $sql_del = "TRUNCATE  users WHERE id = $del";
    $res = $conn->query($sql_del);
    if ($res === true) {
        echo "<script>
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Deleting successifully',
            showConfirmButton: false,
            // showConfirmButton: true,
            timer: 1500
        }).then((res)=>{window.location='../dashboard'});
        // swal.fire('Done','Deleting success','success').then((res)=>{window.location='../dashboard'})
        </script>";
        // header("location: ../login");
    }else{
        echo "deleting errorrrrr".$conn->error;
    }
}
?>
<!-- 
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
});
swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: 'You won't be able to revert this!',
  icon: "warning",
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire({
      title: 'Deleted!',
      text: 'Your file has been deleted.',
      icon: 'success'
    });
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire({
      title: 'Cancelled',
      text: 'Your imaginary file is safe :)',
      icon: 'error'
    });
  }
});
 -->