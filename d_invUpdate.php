<?php
include('components/dbConnect.php');
    $serial = $_GET['dsl'];
    $dID = $_GET['did'];
    $error = false;
    $sql1 = "select * from distributor where d_sl = $serial and id= $dID";
    $res1 = mysqli_query($conn,$sql1);

    $r = mysqli_fetch_assoc($res1);
    
    if(isset($_POST['update'])){
        $pname = $_POST['pname'];
        $pprice = $_POST['price'];
        include('components/dbConnect.php');
        $sql = "UPDATE `distributor` SET `selling_price` = $pprice WHERE `distributor`.`d_sl` = '$serial' and `distributor`.id =$dID";
        $res = mysqli_query($conn,$sql);
        if($res){
            $error = true;
            header("Location: d_inventory.php?did=$dID");
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
          .header{
            background-image:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                                url("img/designbig.jpg");
            /* */
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 100vh;
            position: relative;
        }
        .cc{
            color: white;
        }
    </style>
</head>
<body class="header">
    <ul class="nav justify-content-end" style="background-color:#df7878">
    <li class="nav-item">
        <a class="nav-link cc" href="d_inventory.php?did=<?php echo $dID?>">Inventory</a>
    </li>
    <li class="nav-item">
        <a class="nav-link cc" href="distributorHome.php">Home</a>
    </li>
    </ul>
    <?php
    if ($error) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update Successfull!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
    }
    ?>
    <br>
    <div class="container text-center my-5" style="color:aliceblue ;">
      <h3  >Update Product Price</h3>
      <p class="text">Update your product price from bellow</p>
    </div>
    <div class="container w-50">
        <form action="d_invUpdate.php?dsl= <?php echo $serial ?> & did=<?php echo $dID ?>" method="POST">
            <div class="Container">
                <label for="form-select cc" class="form-label" style="color:aliceblue">Product Name</label>
                <input type="text"  class="form-control" name="pname" id="" value="<?php echo $r['product_name']; ?>" readonly>
                
                <label for="price cc" class="form-label" style="color:aliceblue">Price in BDT</label>
                <input type="number" min="0.00" class="form-control" name="price" placeholder="0.00">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn mt-4" name="update" style="background-color:aliceblue;">Update</button>&nbsp;
                    <a href="d_inventory.php?did=<?php echo $dID?>" class="btn mt-4" style="background-color:aliceblue">Cancle</a>
                </div>
            </div>>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>