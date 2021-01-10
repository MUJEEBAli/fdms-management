<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FDMS</title>
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

        .carousel-item.active,
        .carousel-item-next,
        .carousel-item-prev {
            display: block;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php'); ?>
    <?php include('includes/slider.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">Welcome to Food Donation Management System</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Donate Extra Food</h4>

                    <p class="card-text" style="padding-left:2%">if you have extra food donate that food to needy people form your home. donate extras </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Reduce hunger</h4>

                    <p class="card-text" style="padding-left:2%">if we all donate our extra food that become garbage we can reduce half of hunger. </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Who you could Help</h4>

                    <p class="card-text" style="padding-left:2%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <h2>Some of the Donar</h2>

        <div class="row">
            <?php
            $status = 1;
            $sql = "SELECT * from donations where status=:status order by rand() limit 6";
            $query = $dbh->prepare($sql);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) { ?>

                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100" style="border-radius: 10%;">
                            <a href="#"><img class="card-img-top img-fluid" src="images/banner3.jpeg" alt="" style="padding-top:2% ;padding-left:10% "></a>
                            <div class=" card-block">
                                <h4 class="card-title"><a href="#"><?php echo htmlentities($result->fullname); ?></a></h4>
                                <p class="card-text"><b> FoodType :</b> <?php echo htmlentities($result->foodtype); ?></p>
                                <p class="card-text"><b>food Quantity :</b> <?php echo htmlentities($result->foodquantity); ?></p>

                            </div>
                        </div>
                    </div>

            <?php }
            } ?>





        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2>Donations</h2>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum in facilis aperiam laborum iure. Sunt aut minima, error velit inventore unde distinctio accusamus, voluptate in, earum nemo voluptatum odit numquam..</p>

                <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better!.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="images/blood-donor.jpeg" alt="" style="border-radius:10%;">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h4>Donor</h4>
                <p>
                    A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation

                </p>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>