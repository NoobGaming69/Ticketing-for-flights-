<?php
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
    <title>View</title>

  </head>
  <body>


    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Passenger Details
                            <a href="passenger.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if(isset($_GET['passenger_id'])){
                            $passenger_id = mysqli_real_escape_string($con, $_GET['passenger_id']);
                            $query = "SELECT * FROM passenger WHERE passenger_id='$passenger_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $passenger = mysqli_fetch_array($query_run);
                                ?>

                                    <div class="mb-3">
                                        <label> Passenger First Name </label>
                                        <p class="form-control"><?=$passenger['first_name'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Passenger Last Name </label>
                                        <p class="form-control"><?=$passenger['last_name'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Passenger Date of Birth </label>
                                        <p class="form-control"><?=$passenger['date_of_birth'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Passenger Citizenship </label>
                                        <p class="form-control"><?=$passenger['citizenship'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Passenger Phone Number </label>
                                        <p class="form-control"><?=$passenger['p_number'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Email </label>
                                        <p class="form-control"><?=$passenger['email'];?></p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No ID Found</h4>";
                            }
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    
  </body>
</html>