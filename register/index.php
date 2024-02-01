<?php
include "process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lineawesome/lineawesome/css/line-awesome.css">
    <script src="../jquery-ajax.js"></script>
    <script src="../jquery.js"></script>
    <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <style>
        
    </style>
</head>
<body>
    
    <div class="container1">
    <section>
            <h2>Welcome to Password Saving App</h2>
            <i id="lock" class="la la-lock" ></i>
            <h3>Save Your Password</h3>
        </section>
        <div class="mt-1   p-2 ">
            <div class="row">
                <form action="./" method="post">
                <h3 id="h3" class="form-control">Create Account</h3>
                <?php
                // include "process.php";
                    if (count($errors) >1): ?>
                            
                        <div class="alert alert-danger">
                       <?php
                        foreach($errors as $error){ ?>
                            
                                <li><?=$error ?></li>
                            
                        <?php
                        } ?>
                            </div>
                   <?php
                    endif
                ?>
                <div class="form-group ">
                    <label for="Full Name">Full Name</label>
                    <input type="text" name="fullname" class="form-control mb-3" placeholde="Fullname">
                </div>
                <div class="form-group">
                    <label for="Full Name">UserName</label>
                    <input type="text" name="username" class="form-control mb-3" placeholde="UserName">
                </div>
                <div class="form-group">
                    <label for="Full Name">Phone Number</label>
                    <input type="text" name="phone" class="form-control mb-3" placeholde="Phone Number">
                </div>
                <div class="form-group">
                    <label for="Full Name">Email Address</label>
                    <input type="email" name="email" class="form-control mb-3" placeholde="Email Address">
                </div>
                <div class="form-group">
                    <label for="Full Name">Password</label>
                    <input type="password" name="password" class="form-control mb-3" placeholde="Password">
                </div>
                <div class="form-group">
                    <label for="Full Name">Comfirm Password</label>
                    <input type="password" name="cpassword" class="form-control mb-3" placeholde="Repeat Password">
                </div>
                <div class="form-group mb-3">
                    <button name="btn" style="background-color: rgb(115, 88, 141); color:aliceblue;" class="btn btn form-contro">Sign UP</button>
                </div>
                </form>
                </form>
                <div class="form- ">
                    <b>
                        <i>
                            <p class="text-center">If You Have an account <a href="../login/">Login</a></p>
                        </i>
                    </b>
                </div>
            </div>
        </div>
       
    </div>
</body>
</html>