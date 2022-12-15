<?php
include('components/dbConnect.php');

if (isset($_POST['login'])) {
  header("Location: login.php");
}

$showAlret = false;
$showError = false;

if (isset($_POST['signup'])) {
  $username = $_POST['username'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $catagory = $_POST['catagory'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phnNum = $_POST['phnNum'];
  $gender = $_POST['gender'];
  //$exists=false;

  $existSql = "select * from accounts where username = '$username' ";
  $result = mysqli_query($conn, $existSql);
  $existRows = mysqli_num_rows($result);
  if ($existRows > 0) {
    $showError = "Username already exists";
  } else {
    if ($pass == $cpass && $username != "" && $catagory != "" && $name != "" && $address != "" && $phnNum != "" && $gender != "") {
      $sql = "INSERT INTO `accounts` (`username`, `pass`, `catagory`, `name`, `address`, `phnNum`, `gender`, `createDate`) 
  VALUES ('$username', '$pass', '$catagory', '$name', '$address', '$phnNum', '$gender', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showAlret = true;
      }
    } else {
      $showError = 'password do not match';
    }
  }
}
?>
<?php
include('components/dbConnect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SignUP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
</head>

<body class="header">
  <?php
  if ($showAlret) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully Created Your Account </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> ';
  }
  if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> ' . $showError . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>
  <div class="container signup">
    <form action="signup.php" method="post">
      <div class="row">
        <div class="col-md-4 signup-left" style="margin :auto">
          <img src="img/root.png" alt="logo" width="300" height="100" />
          <h3>Welcome</h3>
          <p>Find Your own roots to buy and sell products</p>
          <input type="submit" style="background-color:#7ddbb6; color:Black;" href="login.php" name="login" value="Log In">
        </div>
        <!-- add new content -->

        <div class="col-md-8 signup-right">

          <div class="row signup-form">
            <div class="col-md-9" style="margin :auto">
              <!-- _--------------- -->
              <h3 class="signup-heading">Provide Your Valid Information</h3>
              <div class="from-group">
                <select name="catagory" class="form-select">
                  <option value=" " disabled selected>----Category----</option>
                  <option value="Farmer">Farmer</option>
                  <option value="Distributor">Distributor</option>
                  <option value="Retailer">Retailer</option>
                </select>
              </div>

              <!-- --------------------- -->
              <div class="from-group"><input type="Name" class="form-control" placeholder="Name" id="name" name="name"></div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                <label class="form-check-label" for="other">Other</label>
              </div>
              <div class="from-group"><input type="Address" class="form-control" placeholder="Address" id="address" name="address"></div>
              <div class="from-group"><input type="Phone Number" class="form-control" placeholder="Phone Number" id="phnNum" name="phnNum"></div>
              <div class="from-group"><input type="date" class="form-control" placeholder="Date of Birth" id="dob" name="dob"></div>
              <div class="from-group"><input type="NID number" class="form-control" placeholder="NID" id="NID" name="NID"></div>
              <div class="from-group"><input type="Email" class="form-control" placeholder="Email" id="email" name="email"></div>
              <div class="from-group"><input type="Username" class="form-control" placeholder="Username" id="username" name="username"></div>
              <div class="from-group"><input type="password" class="form-control" placeholder="Password" id="pass" name="pass"></div>
              <div class="from-group"><input type="password" class="form-control" placeholder="Confirm Password" id="cpass" name="cpass"></div>
              <div class="d-grid gap-2 col-md-6 mx-auto my-3 lbtn">
                <br><button type="submit" class="btn " style="background-color:#7ddbb6; color:Black;" name="signup">Sign In</button></br>
              </div>

            </div>
          </div>

          <!-- end of new content -->
        </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>