
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lineawesome/lineawesome/css/line-awesome.css">
    <script src="../jquery-ajax.js"></script>
    <script src="../jquery.js"></script>
    <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <style>
        .header{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
        form{
    display:flex;
    flex-direction: row;
    flex-wrap: wrap;
    border: none;
    }
    .la{
        font-size: 25px;
    }
    .btn{
        background-color: rgb(72, 17, 124);
        color: white;
    }
    .card-title{
        color: rgb(72, 17, 124);
        font-family: monospace;
        font-weight: bold;
    }
    footer{
    background-color: rgb(72, 17, 124);
    color: white;
    padding: 3px;
}
    </style>
<?php
// include "../server/index.php";
// Check if a session variable is set

//  else {
    include "process.php";
// }
?>
</head>
<body>
    <header>
        <div class="header">
            <a href="./"><p class="text-light"><i class="la la-home"></i></p></a>
            <?php
            // include "..login";
            $username = $_SESSION['username'];
            $sql_user = "SELECT * FROM register WHERE username = '$username'";
            $res_user = mysqli_query($conn, $sql_user);
            $sn = 1;
                $data = mysqli_fetch_assoc($res_user);
            ?>
            <p class="text-light"><i><u><b>Hi, <?=$data['username']?></b></u></i></p>
            <a href="../logout.php"><p class="text-light"><i class="la la-user"></i>Logout</p></a>
        </div>
        <div class="container card">
            <h4 class="card-title text-center">WELCOME TO PASSWORD SAVING</h4>
        </div>
        <p class="text-center text-light p-1"><b><i>By MIKK-TECH</i></b></p>
    </header>
    <?php
            if (count($errors) === 1):?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $key => $erro): ?>
                        <li class="text-center"><?=$erro ?></li>
                    <?php endforeach ?>    
                </div>
            <?php endif ?>
    <div class="p-5">
        <div class="row">
            <h4 class="text-center">
                <u>
                    <b>
                        <i>
                            <?php
                            if ($update === true) {
                                echo "Update Password & Link";
                            }else{
                            ?>
                            Save Your Link & Password
                            <?php } ?>
                        </i>
                    </b>
                </u>
            </h4>
            <form action="./" method="post">
            <div class="form-group col-md-4">
                <label for="Link"><b><i>Link to Save</i></b></label>
                <input type="hidden" name="hidden" class="form-control" value="<?=$id ?>"  placeholder="Link to save">
                <?php if ($update === true) {?>
                    <input type="text" name="link" class="form-control" value="<?=$link ?>"  placeholder="Link to save">
                <?php }else{ ?>

                <input type="text" name="link" class="form-control" placeholder="Link to save">
                <?php }?>
            </div>
            <div class="form-group col-md-4">
                <label for="Full Name"><b><i>Password to save</i></b></label>
                <?php if ($update === true) { ?>
                    <input type="text" name="password" class="form-control" value="<?=$password ?>" placeholder="Password to save">
                <?php }else{ ?>
                <input type="text" name="password" class="form-control"  placeholder="Password to save">
                <?php }?>
            </div>
            <div class="form-group col-md-4 text-center">
                <label for="button"></label> <br>
                                <?php 
                                    if ($update === true) {
                                        echo "<button name='btn-update' class='btn form-control '>Update</button>";
                                    }else{ 
                                ?>
                <button name="btn" class="btn form-control ">Send</button>
                <?php } ?>
            </div>
            </form>
        </div>
        <div class="  ">
            <table class="table card-body table-hover table-striped">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>LINK</th>
                        <th>PASSWORD</th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $username = $_SESSION['username'];
                    $sql = "SELECT * FROM users WHERE `username` = '$username'";
                    // $res_user = $conn->query($sql);
                    $sn = 1;
                    $res_user = $conn->query($sql);
                    // while($data = mysqli_fetch_assoc($res_user)):
                    while($row = $res_user->fetch_assoc()):
                        
                    ?>
                    <tr>
                        <td><?=$sn++ ?></td>
                        <td><?=$row['link']?></td>
                        <td><?=$row['password']?></td>
                        <!-- <td>mdnjj22@11mm</td> -->
                        <td>
                            <a href="../delete?del=<?=$row['id']?>"><i style="color:red; font-size:30px;" class="la la-trash"></i></a>
                            <a href="./?edit=<?=$row['id']?>"><i style="color:blue; font-size:30px;" class="la la-edit"></i></a>
                        </td>
                    </tr>
                    <?php
                    // }
                        endwhile
                    ?>
                
                </tbody>
            </table>
           </div>
    </div>
    <footer>
        <p class="text-center">
            <u>
                <b>
                    <i>
                        copywrite @mikkcomputer 08137005444
                    </i>
                </b>
            </u>
        </p>
    </footer>
</body>
</html>