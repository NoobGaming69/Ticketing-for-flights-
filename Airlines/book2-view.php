<?php
require 'admin/dbcon.php';
require 'admin/message.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/book1-view.css">

    <title>Passenger Data</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('admin/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- PROMPT double check entry -->
                        <h4 id="prompt-head">Double Check Your Entries </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        $query = "Select reservation.reservation_id, reservation.passenger_id, reservation.flight_id, flight.flight_id, flight.schedule_id, schedule.schedule_id, direction.direction_id, airline.airline_id, airline.airline_name, direction.origin_airport_code, direction.destination_airport_code, schedule.direction_id, schedule.departure_time, schedule.arrival_time, schedule.airline_id, schedule.price from reservation left join flight on reservation.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airline on schedule.airline_id = airline.airline_id order by reservation_id desc limit 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $reservation = mysqli_fetch_array($query_run);
                        ?>

                            <input type="hidden" name="reservation_id" value="<?= $reservation['reservation_id']; ?>">
                            <!-- <div class="mb-3">
                                <label> Flight ID </label>
                                <p class="form-control">
                                    <?= $reservation['flight_id']; ?>
                                </p>
                                <label> Origin Airport Code </label>
                                <p class="form-control">
                                    <?= $reservation['origin_airport_code']; ?>
                                </p>
                                <label> Destination Airport Code </label>
                                <p class="form-control">
                                    <?= $reservation['destination_airport_code']; ?>
                                </p>
                                <label> Departure Time </label>
                                <p class="form-control">
                                    <?= $reservation['departure_time']; ?>
                                </p>
                                <label> Arrival Time </label>
                                <p class="form-control">
                                    <?= $reservation['arrival_time']; ?>
                                </p>
                                <label> Price </label>
                                <p class="form-control">
                                    <?= $reservation['price']; ?>
                                </p>
                            </div>

                            <td>
                                <a href="book3.php?reservation_id=<?= $reservation['reservation_id']; ?>" class="btn btn-info btn-sm">Confirm</a>
                                <a href="book2.php" class="btn">Cancel</a>
                            </td> -->

                            <!-- main card -->
                            <div id="main-card">

                                <!-- entry container -->
                                <div id="entry-container">

                                    <!-- indv entries -->

                                        <!-- flight id -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Flight ID:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['flight_id']; ?></h4>

                                        </div>

                                        <!-- origin port code -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Origin Airport Code:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['origin_airport_code']; ?></h4>

                                        </div>
                                        
                                        <!-- Destination Airport Code -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Destination Airport Code:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['destination_airport_code']; ?></h4>

                                        </div>
                                        
                                        <!-- Departure Time -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Departure Time:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['departure_time']; ?></h4>

                                        </div>
                                        
                                        <!-- Arrival Time -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Arrival Time:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['arrival_time']; ?></h4>

                                        </div>
                                        
                                        <!-- Price -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Price:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['price']; ?></h4>

                                        </div>

                                </div>

                                <!-- actions form -->
                                <form id="act-container"  action="delete.php" method='POST' class="d-inline">

                                    <!-- confirm -->
                                    <a id="confirm-btn" href="book3.php?reservation_id=<?= $reservation['reservation_id']; ?>" class="btn btn-info btn-sm">
                                            Confirm
                                    </a>

                                    <!-- Cancel -->
                                    <button id="cancel-btn" type="submit" name="delete_passenger" value="<?= $passenger['passenger_id']; ?>" class="btn" onclick="history.back()">Cancel</button>

                                </form>

                            </div>

                        <?php
                        } else {
                            echo "<h4>No ID Found</h4>";
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