<?php
session_start();
$name = $_SESSION['username'] ?? 'Guest';
$id = $_SESSION['id'] ?? 'NULL';
if (isset($_POST['submit'])) {
  include('components/dbConnect.php');
  $product = $_POST['product'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $sql2 = "INSERT INTO `farmer`(`id`,`product`, `quantity`, `price`, `unsold`) VALUES ('$id','$product','$quantity','$price', '$quantity')";
  $result2 = mysqli_query($conn, $sql2);
  if ($result2) {
    header("Location: farmerHome.php?msg=New rocord created successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
  mysqli_close($conn);
}
if (isset($_POST['delete'])) {
  include('components/dbConnect.php');
  $sNum = $_POST['idToDelete'];
  $sql = "delete from farmer where sl = $sNum";
  if (mysqli_query($conn, $sql)) {
    header('Location: farmerHome.php');
  } else {
    echo "Error!" . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
  .header {
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
      url("img/farmerHome.jpg");
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
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#7ddbb6" class="bi bi-tree" viewBox="0 0 16 16">
          <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z" />
        </svg>
        <a class="navbar-brand theme-text" href="index.php" style="color:aliceblue ;">&nbsp;Roots</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php" style="color:aliceblue ;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:aliceblue ;" href="f_history.php?fid=<?php echo $id ?>" >Transaction</a>
            </li>
            <li class="nav-item">
              <a class="nav-link test-center" href="logout.php" style="color:aliceblue ;">logout</a>
            </li>
          </ul>
          <!-- <div class="container">
          <button class="btn btn-outline-danger" type="submit" href="logout.php">logout</button>
        </div> -->
        </div>
      </div>
    </nav>
  </div>

  <div class="container" style="color:aliceblue ;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
      <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
      <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
    </svg>
    <?php echo "Farmer <br>",  "$name <br>ID ($id)"; ?>
  </div>
  <div class="container-fluid w-50 h-50 my-5 py-5 shadow p-3 mb-5 rounded" style="background-color:rgba(100, 252, 247, 0.1); ">
    <div class="container text-center">
      <h2 style="color:aliceblue ;">Add Product</h3>
        <p class="text" style="color:darkgray;">Update your product from bellow</p>
    </div>
    <div class="container d-flex justify-content-center">
      <form action="farmerHome.php" method="POST" style="width:50vw; min-width: 300px;">
        <div class="Container">
          <label for="form-select" class="form-label" style="color:aliceblue ;">Choose Your Product</label>
          <select name="product" class="form-select"style="background-color:aliceblue;">
            <option selected>.......</option>
            <option value="Rice">Rice-(Chaal)</option>
            <option value="Wheat">Wheat-(Goom)</option>
            <option value="Lentils">Lentils-(Musur Daal)</option>
            <option value="Onions">Onions-(Peyaj)</option>
            <option value="Potato">Potato-(Aalu)</option>
            <option value="Cotton">Cotton-(Tuula)</option>
            <option value="Milk">Milk-Cow</option>
            <option value="Mustard">Mustard Seed-(Shorisha dana)</option>
          </select>
          <div class="row">
            <div class="col mt-2">
              <label for="quantity" class="form-label" style="color:aliceblue ;">Quantity in KG</label>
              <input type="number" class="form-control" style="background-color:aliceblue ;" name="quantity" id="" placeholder="0 kg ">
            </div>
            <div class="col mt-2">
              <label for="price" class="form-label" style="color:aliceblue ;">Price in BDT</label>
              <input type="number" min="0.00"style="background-color:aliceblue ;" class="form-control" name="price" id="" placeholder="0.00">
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn mt-4" name="submit" style="background-color:aliceblue;">Save</button>&nbsp;
          <a href="farmerHome.php" class="btn mt-4" style="background-color:aliceblue">Cancle</a>
        </div>
      </form>
    </div>
  </div>
  <div class="container mt-4">
    <table  class="table table-hover text-center" style="background-color:floralwhite">
      <thead class="table-dark" style="background-color:black ;">
        <tr>
          <th scope="col">Product</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include('components/dbConnect.php');
        $sql3 = "SELECT `sl`, `product`, `quantity`, `price` FROM `farmer` where `id`=$id;";
        $result3 = mysqli_query($conn, $sql3);
        while ($row = mysqli_fetch_assoc($result3)) {
        ?>
          <tr>
            <th><?php echo $row['product'] ?></th>
            <th><?php echo $row['quantity'] ?></th>
            <th><?php echo $row['price'] ?></th>
            <th>
              <form action="farmerHome.php" method="post">
                <!-- <button type="submit" name="edit" class="btn btn-sm mx-1">Edit</a> -->
                <input type="hidden" name="idToDelete" value="<?php echo $row['sl'] ?>">
                <button type="submit" name="delete" class="btn btn-dark btn-sm">Delete</a>
              </form>
            </th>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>

</body>

</html>