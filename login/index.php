<?php
include "new_process.php";
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
        <div class="mt-4   p-2 ">
            <div class="row">
                <form action="./" method="post">
                <h3 id="h3" class="form-control">Login</h3>
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
                <div class="form-group mt-5">
                    <label for="Full Name">UserName</label> <i class="la la-user"></i>
                    <input type="text" name="username" class="form-control mb-3" placeholder="UserName">
                </div>
                <div class="form-group">
                    <label for="Full Name">Password</label> <i class="la la-lock"></i>
                    <input type="password" name="password" class="form-control mb-4" placeholder="Password">
                </div>
                <div class="form-group mb-3">
                    <button name="btn-login" class="btn btn form-control ">Login</button>
                </div>
                </form>
                <div class="form- mb-5">
                    <b>
                        <i>
                            <p class="text-center">Forget Password Click <a href="../register/">Here</a></p>
                            <p class="text-center">New User <a href="../register/">Create Account</a></p>
                        </i>
                    </b>
                </div>
            </div>
        </div>
       
    </div>
</body>
</html>