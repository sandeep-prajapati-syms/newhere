<?php
require "connection.php";
$year = $_SESSION['year'];
$course = $_SESSION['course'];

$select = "SELECT * FROM merchant WHERE ((year = '$year' and course = '$course')or(year = 'For-all-year' and course = 'For-all-Courses')or(year = 'For-all-year' and course = '$course')or(year = '$year' and course = 'For-all-Courses'));";
$qury = mysqli_query($conn, $select);
?>
<div class="container-fluid">
    <div class="row">
  <?php
                while($result = mysqli_fetch_array($qury))
                {
            ?>
  <div class="col-md-4">
    <div class="card m-3">
      <img style="height:350px; width : auto ;" src="<?php echo $result['img']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h1 class="card-title">
          <?php echo $result['title']; ?>
          </h5>
          <p class="card-text">
            <?php echo $result['dirciption']; ?>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <?php echo $result['price']; ?>
        </li>
        <li class="list-group-item">
          <?php echo $result['address']; ?>
        </li>
        <li class="list-group-item">
          <?php echo $result['mobilNo']; ?>
        </li>
        <div class="row">
          <div class="col-sm-4 text-center">
          <?php echo $result['course']; ?>
          </div>
          <div class="col-sm-4 text-center">
          <?php echo $result['year']; ?>
          </div>
          <div class="col-sm-4 text-center">
          <?php echo $result['minimum']; ?>
          </div>
        </div>
      </ul>

      <!-- <div class="card-body">
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div> -->
    </div>
  </div>
  <?php
                   }
  ?>
    </div>
</div>
</div>