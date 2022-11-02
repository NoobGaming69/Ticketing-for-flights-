<?php
  session_start();
  require 'dbcon.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">

    <title>Admin</title>

  </head>
  <body>

    <div class="wrapper">
      <div class="sidebar">
        <h2>DB Admin</h2>

        <li><a href="admin.php">Home</a></li>
        <li><a href="ticket.php">Ticket</a></li>
        <li><a href="passenger.php">Passenger</a></li>
        <li><a href="flight.php">Flight</a></li>
        <li><a href="payment.php">Payment</a></li>
        <li><a href="../home.php"> Back to Website</a></li>
  
      </div>
    </div>

    <div class="container mt-5">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Flight Details
                <a href="flight-create.php" class="btn btn-primary float-end">Add Flight</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Flight ID</th>
                        <th>Location</th>
                        <th>Destination</th>
                        <th>Airlines</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM flight";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $flight){

                          // echo
                          ?>
                          <tr>
                            <td><?= $flight['fid']; ?></td>
                            <td><?= $flight['location']; ?></td>
                            <td><?= $flight['destination']; ?></td>
                            <td><?= $flight['airlines']; ?></td>
                            <td><?= $flight['departure']; ?></td>
                            <td><?= $flight['arrival']; ?></td>
                            <td>
                              <a href="flight-view.php?id=<?= $flight['fid']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="flight-update.php?id=<?= $flight['fid']; ?>" class="btn btn-success btn-sm">Update</a>
                              <form action="code.php" method='POST' class="d-inline">
                                <button type="submit" name="delete_flight" value="<?=$flight['fid']; ?>" class="btn btn-danger btn-sm">Delete</a>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else{
                        echo '<h5>No Record Found </h5>';
                      }
                    ?>
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  </body>
</html>