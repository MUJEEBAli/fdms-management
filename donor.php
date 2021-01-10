<?php
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $mobile = $_POST['mobileno'];
    $ftype = $_POST['foodtype'];
    $fquantity = $_POST['fquantity'];
    $address = $_POST['address'];

    $status = 1;
    $sql = "INSERT INTO  donations(fullname,mobileno,adress,foodtype,foodquantity,status) VALUES(:fullname,:mobileno,:address,:foodtype,:fquantity,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobile, PDO::PARAM_STR);
    $query->bindParam(':foodtype', $ftype, PDO::PARAM_STR);
    $query->bindParam(':fquantity', $fquantity, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $msg = "Your info submitted successfully";
    } else {
        $error = "Something went wrong. Please try again";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Donation Management System| Become A Donar</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
        .navbar-toggler {
            z-index: 1;
        }

        @media (max-width: 576px) {
            nav>.container {
                width: 100%;
            }
        }
    </style>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>


</head>

<body>

    <?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Become a <small>Donor</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Become a Donor</li>
        </ol>
        <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
        <!-- Content Row -->
        <form name="donar" method="post">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="font-italic">Full Name<span style="color:red">*</span></div>
                    <div><input type="text" name="fullname" class="form-control" required></div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="font-italic">Mobile Number<span style="color:red">*</span></div>
                    <div><input type="text" name="mobileno" class="form-control" required></div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="font-italic">FOOD TYPE<span style="color:red">*</span></div>
                    <div><select name="foodtype" class="form-control" required>
                            <option value="">Select</option>
                            <option value="fruit">fruits</option>
                            <option value="vegetable">Vegatables</option>
                            <option value="mixed">Mixed</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="font-italic">Food Quantity<span style="color:red">*</span> </div>
                    <div><select name="fquantity" class="form-control" required>
                            <option value="">Select</option>
                            <?php $sql = "SELECT * from  quantity ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {                ?>
                                    <option value="<?php echo htmlentities($result->foodquantity); ?>"><?php echo htmlentities($result->foodquantity); ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="font-italic">Address</div>
                    <div><textarea class="form-control" name="address"></textarea></div>
                </div>

                <div class="col-lg-8 mb-4">
                    <div class="font-italic">Message<span style="color:red">*</span></div>
                    <div><textarea class="form-control" name="message" required> </textarea></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div><input type="submit" name="submit" class="btn btn-primary" value="Donate" style="cursor:pointer">
                        <a href="./donor/index.php" style=" padding-left:16.5%">become perminant Member</a></div>

                </div>



            </div>



            <!-- /.row -->
        </form>
        <!-- /.row -->
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>