<?php
    $dID = $_GET['did'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distributor History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
  .header {
    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
      url("img/Enven.jpg");
    /* */
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 100vh;
    position: relative;
  }

  :root {
    --main-color:#7ddbb6;
  }

  .act,
  .navbar a:hover {
    color: var(--main-color) !important;
    border-bottom: 1px solid var(--main-color);
  }

</style>
<body class="header">
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light" >
    <div class="container-fluid">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#7ddbb6" class="bi bi-tree" viewBox="0 0 16 16">
          <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z" />
        </svg>
      <a class="navbar-brand" href="#" style="color: white">
        &nbsp;Roots
      </a>
      <div class="container text-center" style="color: white">
      </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="distributorHome.php" style="color: white">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link test-center" href="logout.php" style="color: white">logout</a>
          </li>
      </ul>
    </div>
  </div>
</nav>
  </div>
<div class="container mt-4">
    <table class="table table-hover table-light text-center">
      <thead class="table-dark" >
        <tr>
          <th scope="col">Retailer Name</th>
          <th scope="col">Product Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Transation ID</th>

        </tr>
      </thead>
      <tbody>
      <?php
        include ('components/dbConnect.php');
        $sql3 = "SELECT name,p_name,amount,tprice,t_id
        from accounts
        INNER JOIN dsell_rbuy
        on dsell_rbuy.d_id = $dID
        WHERE accounts.id = dsell_rbuy.r_id";
        $result3 = mysqli_query($conn, $sql3);
        while ($row = mysqli_fetch_assoc($result3)) {
        ?>
        <tr>
            <th><?php echo $row['name']?></th>
            <th><?php echo $row['p_name']?></th>
            <th><?php echo $row['amount']?></th>
            <th><?php echo $row['tprice']?></th>
            <th><?php echo $row['t_id']?></th>
        </tr>
       <?php 
               } 
          ?>
          </tbody>
         
          </table>
          
  </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>