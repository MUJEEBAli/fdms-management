<?php
include('includes/config.php');
if (isset($_POST['Register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['donorpassword'];
    $sql = "INSERT INTO donor(fullname,username,email,donorpassword) VALUES(:fullname,:username,:email,:donorpassword)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':username', $username, PDO::PARAM_STR);

    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':donorpassword', $password, PDO::PARAM_STR);
    $query->execute();
    if ($query) {
        $msg = "Registerd successfully";
    } else {
        $error = "Something went wrong. Please try again";
    }
}


?>


<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FDMS| REGISTER</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="login-page bk-img" style="background-image: url(img/banner.jpeg);">
        <div class="form-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 class="text-center text-bold text-light mt-4x">Sign Up</h1>
                        <div class="well row pt-2x pb-3x bk-light">
                            <div class="col-md-8 col-md-offset-2">
                                <form method="post">

                                    <label for="" class="text-uppercase text-sm"> Full Name </label>
                                    <input type="text" placeholder="fullname" name="fullname" class="form-control mb">

                                    <label for="" class="text-uppercase text-sm"> User Name </label>
                                    <input type="text" placeholder="username" name="username" class="form-control mb">



                                    <label for="" class="text-uppercase text-sm">Email</label>
                                    <input type="email" placeholder="email" name="email" class="form-control mb">


                                    <label for="" class="text-uppercase text-sm" autocomplete="none">Password</label>
                                    <input type="password" placeholder="password" name="donorpassword" class="form-control mb">


                                    <button class="btn btn-primary btn-block" name="Register" type="submit">REGISTER</button>


                                    <a class="btn btn-primary btn-block" href="index.php">Already Register</a>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>


</body>

</html>