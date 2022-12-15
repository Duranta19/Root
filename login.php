<?php
$login = false;
$error = false;
$catagory = '';

if (isset($_POST['submit'])) {
  include('components/dbConnect.php');
  $username = $_POST['Username'];
  $password = $_POST['Password'];

  $sql = "select * from accounts where username = '$username' ";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      // print_r($row);
      // echo $row['pass'];
      if ($password == $row['pass']) {
        session_start();
        $login = true;
        $_SESSION['username'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['loggedin'] = true;
        $catagory = $row['catagory'];
      } else {
        $error = "Invalid Username or Password";
      }
    }
  } else {
    $error = "Invalid Credentials";
  }
  echo $catagory;
  if ($catagory == 'Farmer') {
    header("Location: farmerHome.php");
  }
  if ($catagory == 'Distributor') {
    header("Location: distributorHome.php");
  }
  if ($catagory == 'Retailer') {
    header("Location: retailerHome.php");
  }
  if ($catagory == 'Admin') {
    header("Location: adminHome.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .header {
      background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url("img/landingPage.jpg");
      /* */
      background-position: center;
      background-size: cover;
      width: 100%;
      height: 100vh;
      position: relative;
    }

    :root {
      --main-color: #7ddbb6;
    }

    .act,
    .navbar a:hover {
      color: var(--main-color) !important;
      border-bottom: 1px solid var(--main-color);
    }
  </style>
</head>

<body class="header">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#7ddbb6" class="bi bi-tree" viewBox="0 0 16 16">
          <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z" />
        </svg>
        <a class="navbar-brand theme-text" style="color:#7ddbb6;" href="index.php">&nbsp;Roots</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" style="color:#7ddbb6;" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link test-center" style="color:#7ddbb6;" href="signup.php">Sign Up</a>
            </li>
          </ul>
          <!-- <div class="container">
          <button class="btn btn-outline-danger" type="submit" href="logout.php">logout</button>
        </div> -->
        </div>
      </div>
    </nav>
  </div>
  <?php
  if ($login) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Login Successfull!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
  }
  if ($error) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $error . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  ?>
  <!--<div class="alert alert-danger" role="alert">
        A simple danger alert—check it out! 
      </div>-->
  <br>
  <section class="login" style="justify-content:center;">
    <form action="login.php" method="post" style="position:relativ;">
      <div class="container-fluid w-50 h-50 my-5 py-5 shadow p-3 mb-5 rounded" style="background-color:rgba(100, 252, 247, 0.150);">
        <h1 class="text-center" style="color:#7ddbb6;">Signin</h1>
        <div class="from-group col-md-6" style="margin:auto ;">
          <label for="Username" style="color:#7ddbb6;" class="form-label">Username</label>
          <input type="Username" class="form-control" id="Username" name="Username">
        </div>
        <div class="from-group col-md-6 my-1" style="margin:auto ;">
          <label for="Password" style="color:#7ddbb6;" class="form-label">Password</label>
          <input type="password" class="form-control" id="Password" name="Password">
        </div>
        <div class="d-grid gap-2 col-md-6 mx-auto my-3 lbtn">
          <input type="submit" class="btn btn-dark bb" name="submit" value="Login" style="border-radius: 20px;">
        </div>
      </div>
    </form>

  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>