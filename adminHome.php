<?php
//  include('components/dbConnect.php');
//  $sql = "SELECT `product`, sum(quantity) as total_production, avg(quantity) as avg_production, AVG(price) as avg_price 
//         FROM `farmer`
//         GROUP by product;";
//  $result = mysqli_query($conn,$sql);
//  //print_r($result)
// while($row = mysqli_fetch_assoc($result)){
//   echo $row['product'];
//   echo $row['total_production'];
//   echo $row['avg_production'];
//   echo $row['avg_price'];
// }

// SELECT product_name, sum(quantity) as total_production, sum(unsold) as total_unsold, avg(quantity) as avg_production, AVG(buing_price) as avg_bprice, AVG(selling_price) as avg_sprice
//              FROM `distributor`
//              GROUP by product_name;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .header {
      background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4)),
        url("img/adminHome.jpg");
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
        <a style="color:aliceblue ;" class="navbar-brand" href="index.php">
          &nbsp;Roots
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a style="color:aliceblue ;" class="nav-link active" aria-current="page" href="adminHome.php">Home</a>
            </li>
            <li class="nav-item">
              <a style="color:aliceblue ;" class="nav-link" href="dataVisu.php">Data Visualization</a>
            </li>
            <li class="nav-item">
              <a style="color:aliceblue ;" class="nav-link test-center" href="logout.php">logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container mt-3">
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button style="color:aliceblue ;" class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Overview</button>
      </li>
      <li class="nav-item" role="presentation">
        <button style="color:aliceblue ;" class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Farmer</button>
      </li>
      <li class="nav-item" role="presentation">
        <button style="color:aliceblue ;" class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="true">Disrtibutor</button>
      </li>
      <li class="nav-item" role="presentation">
        <button style="color:aliceblue ;" class="nav-link" id="pills-retailer-tab" data-bs-toggle="pill" data-bs-target="#pills-retailer" type="button" role="tab" aria-controls="pills-retailer" aria-selected="true">Retailer</button>
      </li>
    </ul>
  </div>

  <div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card">
              <img style="height: 230px ;"  src="https://i.pinimg.com/originals/ba/44/61/ba4461cd9b8b1d46dad3355329c8cfe1.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Farmer</h5>
                <?php
                include('components/dbConnect.php');
                $sql = "SELECT `product`, sum(quantity) as total_production, avg(quantity) as avg_production, AVG(price) as avg_price 
                FROM `farmer`
                GROUP by product;";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Product Name : <?php echo $row['product'] ?></li>
                    <li class="list-group-item">Total Production : <?php echo $row['total_production'] ?></li>
                    <li class="list-group-item">Avg Production : <?php echo $row['avg_production'] ?></li>
                    <li class="list-group-item">Avg Selling price : <?php echo $row['avg_price']; ?></li>
                    <br>
                  </ul>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img style="height: 230px ;" src="https://media.istockphoto.com/photos/two-farmers-talk-on-the-field-then-shake-hands-use-a-tablet-picture-id1127962536?k=20&m=1127962536&s=612x612&w=0&h=TOBsZ-M7iWgyFCR3agaOMLx8NXfz2RxGV1Hjwf9cpgU=" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Distributor</h5>
                <?php
                include('components/dbConnect.php');
                $sql = "SELECT product_name, sum(quantity) as total_production, sum(unsold) as total_unsold, avg(quantity) as avg_production, AVG(buing_price) as avg_bprice, AVG(selling_price) as avg_sprice
                FROM `distributor`
                GROUP by product_name;";
                $result2 = mysqli_query($conn, $sql);
                while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Product Name : <?php echo $row2['product_name'] ?></li>
                    <li class="list-group-item">Total Production : <?php echo $row2['total_production'] ?></li>
                    <li class="list-group-item">Total Production : <?php echo $row2['total_unsold'] ?></li>
                    <li class="list-group-item">Avg Production : <?php echo $row2['avg_production'] ?></li>
                    <li class="list-group-item">Avg Buying Price : <?php echo $row2['avg_bprice']; ?></li>
                    <li class="list-group-item">Avg Selling Price : <?php echo $row2['avg_sprice']; ?></li>
                    <br>
                  </ul>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img style="height: 230px ;" src="https://dmrqkbkq8el9i.cloudfront.net/Pictures/2000xAny/7/1/2/162712_eat17fruitandveg_316436_crop.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Retailer</h5>
                <?php
                include('components/dbConnect.php');
                $sql = "SELECT product_name, sum(quantity) as total_production, avg(quantity) as avg_production, AVG(buing_price) as avg_bprice, AVG(selling_price) as avg_sprice
                FROM `distributor`
                GROUP by product_name;";
                $result3 = mysqli_query($conn, $sql);
                while ($row3 = mysqli_fetch_assoc($result3)) { ?>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Product Name : <?php echo $row3['product_name'] ?></li>
                    <li class="list-group-item">Total Production : <?php echo $row3['total_production'] ?></li>
                    <li class="list-group-item">Avg Production : <?php echo $row3['avg_production'] ?></li>
                    <li class="list-group-item">Avg Buying Price : <?php echo $row3['avg_bprice']; ?></li>
                    <li class="list-group-item">Avg Selling Price : <?php echo $row3['avg_sprice']; ?></li>
                    <br>
                  </ul>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <div class="container">
        <div class="overflow-scroll">
          <table class="table" style="background-color:aliceblue ;">
            <thead class="table-dark">
              <tr>
                <th scope="col">Farmer Name</th>
                <th scope="col">Farmer Location</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('components/dbConnect.php');
              $sql = "SELECT *, 
                      (SELECT name FROM accounts WHERE farmer.id = accounts.id) as f_name, 
                      (SELECT address FROM accounts WHERE farmer.id = accounts.id) as f_location 
          FROM farmer WHERE quantity > 0 ORDER by (quantity);";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td> <?php echo $row['f_name']; ?></td>
                  <td> <?php echo $row['f_location']; ?></td>
                  <td> <?php echo $row['product']; ?></td>
                  <td> <?php echo $row['unsold']; ?></td>
                  <td> <?php echo $row['price']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
      <div class="container">
        <div class="overflow-auto">
          <table class="table" style="background-color:aliceblue ;">
            <thead class="table-dark">
              <tr>
                <th scope="col">Distributor Name</th>
                <th scope="col">Distributor Location</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col"> Buying Price</th>
                <th scope="col"> Selling Price</th>

              </tr>
            </thead>
            <tbody>
              <?php
              include('components/dbConnect.php');
              $sql = "SELECT *, 
                      (SELECT name FROM accounts WHERE distributor.id = accounts.id) as d_name, 
                      (SELECT address FROM accounts WHERE distributor.id = accounts.id) as d_location 
          FROM distributor WHERE quantity > 0 ORDER by (quantity);;";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td> <?php echo $row['d_name']; ?></td>
                  <td> <?php echo $row['d_location']; ?></td>
                  <td> <?php echo $row['product_name']; ?></td>
                  <td> <?php echo $row['unsold']; ?></td>
                  <td> <?php echo $row['buing_price']; ?></td>
                  <td> <?php echo $row['selling_price']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-retailer" role="tabpanel" aria-labelledby="pills-retailer-tab">
      <div class="container">
        <div class="overflow-scroll">
          <table class="table" style="background-color:aliceblue ;">
            <thead class="table-dark">
              <tr>
                <th scope="col">Retailer Name</th>
                <th scope="col">Retailer Location</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col"> Buying Price</th>
                <th scope="col">Selling Price</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('components/dbConnect.php');
              $sql = "SELECT *, (SELECT name FROM accounts WHERE retailer.id = accounts.id) as d_name, 
                            (SELECT address FROM accounts WHERE retailer.id = accounts.id) as d_location 
                  FROM retailer WHERE quantity > 0 ORDER by (quantity);";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td> <?php echo $row['d_name']; ?></td>
                  <td> <?php echo $row['d_location']; ?></td>
                  <td> <?php echo $row['product_name']; ?></td>
                  <td> <?php echo $row['quantity']; ?></td>
                  <td> <?php echo $row['buing_price']; ?></td>
                  <td> <?php echo $row['selling_price']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>