<?php
session_start();
$name = $_SESSION['username'] ?? 'Guest';
$id = $_SESSION['id'] ?? 'NULL';
if (!$_SESSION['loggedin'] == true) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retailer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
  .header {
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
      url("img/retailerHome.jpg");
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

<body class="header">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#7ddbb6" class="bi bi-tree" viewBox="0 0 16 16">
          <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z" />
        </svg>
        <a class="navbar-brand" href="index.php" style="color: white">
          &nbsp;Roots
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="retailerHome.php" style="color: white">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="r_inventory.php?rid=<?php echo $id ?>" style="color: white">Inventory</a>
            </li>
            <li class="nav-item">
              <a class="nav-link test-center" href="logout.php" style="color: white">logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container" style="color:lavenderblush ;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
      <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
      <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
    </svg>
    <?php echo "Retailer <br>",  "$name <br>ID ($id)"; ?>
  </div>

  <div class="container-fluid shadow rounded text-center w-50 my-5 p-2 mb-1"style="background-color:rgba(100, 252, 247, 0.2); ">
    <h3 style="color: lavenderblush">Buy Product</h3>
    <p class="text" style="color: lavenderblush">Buy Product from Distributor</p>
  </div>
  <div class="container mt-4 justify-content-center" style="width: 500px!important;">
    <form action="retailerHome.php" method="GET" class="d-flex" role="search">
      <input class="form-control me-2" name="searchB" value="<?php if (isset($_GET['searchB'])) {
                                                                echo $_GET['searchB'];
                                                              } ?>" type="search" placeholder="Name/Location/Product" aria-label="Search">
      <button class="btn btn-outline-info" type="submit">Search</button>
    </form>
  </div>

  <div class="container mt-4">
    <table class="table table-hover text-center table-light">
      <thead class="table-dark">
        <tr>
          <th scope="col">Distributor Name</th>
          <th scope="col">Distributor Location</th>
          <th scope="col">Product</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        <?php
        include('components/dbConnect.php');
        if (isset($_GET['searchB'])) {
          $searchB = $_GET['searchB'];
          $sql = "SELECT *, 
                      (SELECT name FROM accounts WHERE distributor.id = accounts.id and distributor.unsold>0 and distributor.selling_price>0 ) as d_name, 
                      (SELECT address FROM accounts WHERE distributor.id = accounts.id and distributor.unsold>0 and distributor.selling_price>0 ) as d_location 
          FROM distributor 
          where (distributor.unsold>0 and distributor.selling_price>0) and distributor.selling_price>0 and distributor.product_name like '%$searchB%' or (SELECT name FROM accounts WHERE distributor.id = accounts.id and distributor.unsold>0 and distributor.selling_price>0)  like '%$searchB%' or (SELECT address FROM accounts WHERE distributor.id = accounts.id and accounts.address like '%$searchB%' and distributor.unsold>0 and distributor.selling_price>0);";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td> <?php echo $row['d_name']; ?></td>
              <td> <?php echo $row['d_location']; ?></td>
              <td> <?php echo $row['product_name']; ?></td>
              <td> <?php echo $row['unsold']; ?></td>
              <td> <?php echo $row['selling_price']; ?></td>
              <td>
                <a class="btn btn-sm btn-dark" href="r_buy.php?sl= <?php echo $row['d_sl'] ?> & id=<?php echo $row['id'] ?> & rid=<?php echo $id ?> "> Buy</a>
              </td>
            </tr>
        <?php }
        }
        ?>
      </tbody>
    </table>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>

</body>

</html>