<?php
    include ('components/dbConnect.php');
    $error = false;
    $btrx = 0;
    $totalAmmountBK =0;
    $pQunt=0;
    $dID = $_GET['id'] ;
    $dSL = $_GET['sl'] ;
    $rID = $_GET['rid'];
    $total =0;
    $sql1 = "SELECT name,address,phnNum FROM accounts WHERE id = $dID";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result1);
    //mysqli_free_result($result1);
    // print_r($row1);

    $sql2 = "SELECT product_name,quantity,selling_price,sold,unsold FROM distributor WHERE d_sl = $dSL";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    mysqli_free_result($result1);
   // print_r($row2);
 

    // if(isset($_POST['ok'])){
    //     $PdctQnt = $_POST['dPdctQnt'];
    //     $total = $PdctQnt*$row2['price'];
    // }
    $sql3 = "SELECT name,address,phnNum FROM accounts WHERE id = $rID";
    $result3 = mysqli_query($conn,$sql3);
    $row3 = mysqli_fetch_assoc($result3);
    //mysqli_free_result($result1);
    //print_r($row3);

    if(isset($_POST['confirm'])){
        include('components/dbconnect.php');
        $pName = $row2['product_name'];
        $bPrice = $row2['selling_price'];
        $sPrice = 0 ;
        $trnxId =$_POST['rTId'] ;
        $pQunt = $_POST['rPdctQnt'];
        $d_sold = $row2['sold'] + $pQunt;
        $d_usold = $row2['unsold'] - $pQunt;
        if($pQunt > $row2['unsold']){
          $error = " Invalid Product Ammount";
        }
        else{
        $sql4 = "INSERT INTO `retailer` (`id`, `product_name`, `quantity`,`buing_price`, `selling_price`) 
                VALUES ('$rID', '$pName','$pQunt', '$bPrice', '$sPrice')";
        $result4 = mysqli_query($conn, $sql4);
        
        $sql5 = "UPDATE `distributor` SET `sold` = '$d_sold', `unsold` = '$d_usold' WHERE `distributor`.`d_sl` = $dSL and id = $dID;";
        mysqli_query($conn, $sql5);
        $totalAmount = $pQunt*$bPrice;
        $sql6 = "INSERT INTO `dsell_rbuy` (`d_id`, `r_id`, `p_name`, `amount`, `tprice`, `t_id`) 
                VALUES ('$dID', '$rID', '$pName', '$pQunt', '$totalAmount', '$trnxId')";
        mysqli_query($conn, $sql6);
        if ($result4) {
          header("Location: retailerHome.php?msg=New rocord created successfully");
        } else {
          echo "Failed: " . mysqli_error($conn);
        }
      }
    }

    if(isset($_POST['bconf'])){
      $bPrice = (int)$row2['selling_price'];
      $pQunt = (int)$_POST['rPdctQnt'];
      $totalAmmountBK = (int)($pQunt * $bPrice);

      $num = $_POST['bpnum'];
      $pin = $_POST['bppin'];
      $amnt = $_POST['bpamm'];
      // echo $num . "</br>";
      // echo $pin;

      $sql7 = "SELECT * FROM `payment` WHERE phn_num = $num";
      $result7 = mysqli_query($conn,$sql7);
      while ($row = mysqli_fetch_assoc($result7)) {
        if($pin == $row['pin'] && $totalAmmountBK <= $row['balance'] ){
          $btrx =rand(10000000,999999999);
          $newbalance = $row['balance'] - $totalAmmountBK;

          $sql9 = "UPDATE `payment` SET `balance`='$newbalance' WHERE `phn_num`=$num;";
          mysqli_query($conn,$sql9);
        }
        else{
          $error = "Invalid User or Balance";
        }
      }
    }
    if(isset($_POST['nconf'])){
      $bPrice = (int)$row2['selling_price'];
      $pQunt = (int)$_POST['rPdctQnt'];
      $totalAmmountBK = (int)($pQunt * $bPrice);

      $num1 = $_POST['pnum'];
      $pin = $_POST['ppin'];
      $amnt = $_POST['pamm'];
      // echo $num . "</br>";
      // echo $pin;

      $sql8 = "SELECT * FROM `payment` WHERE phn_num = $num1";
      $result8 = mysqli_query($conn,$sql8);
      while ($row = mysqli_fetch_assoc($result8)) {
        if($pin == $row['pin'] && $totalAmmountBK <= $row['balance'] ){
          $btrx =rand(10000000,999999999);

          $newbalance = $row['balance'] - $totalAmmountBK;

          $sql10 = "UPDATE `payment` SET `balance`='$newbalance' WHERE `phn_num`=$num;";
          mysqli_query($conn,$sql10);
        }
        else{
          $error = "Invalid User or Balance";
        }
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retailer Buy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
      .header {
          background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
            url("img/Enven.jpg");
          /* */
          background-position: center;
          background-size: cover;
          width: 100%;
          height: 100vh;
          position: relative;
        }
    </style>
</head>
<body class="header">
    <div class="container-fluid px-0">
        <ul class="nav justify-content-center" style="background-color:#f5f5f5">
            <!-- <li class="nav-item">
                <a class="nav-link" href=>Buy Product</a>
            </li> -->
        </ul>
    </div>
    <!-- <?php
    echo $dID ;
    echo $dSL ;
    ?> -->
  <?php
  if ($error) {
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> ' . $error . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
  }
  ?>
    <div class="container-md">
        <div class="row text-center">
            <h2 style="color: white">Information</h2>
        </div>
    </div>

    <div class="card w-75" style="margin : auto;  background-color:rgba(173, 246, 213, 0.10);color:white; ">
        <div class="container">
            <h4>Seller Information</h4>
            <form class="row g-3" action="components/r_buy.php" method="post">
                <div class="col-md-6">
                    <label for="Distributor Name" class="form-label">Distributor Name</label>
                    <input type="text" class="form-control" name="dName" value="<?php echo $row1['name']?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="Phone Number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="dPhnNm" value=<?php echo $row1['phnNum']?> readonly>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" name="dAddress" value=<?php echo $row1['address']?> readonly>
                </div>
                <div class="col-md-6">
                    <label for="Product Name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="dPdctName" value=<?php echo $row2['product_name']?> readonly>
                </div>
                <div class="col-md-4">
                    <label for="Product Quantity(Avaliable)" class="form-label">Product Quantity(Avaliable)</label>
                    <input type="text" class="form-control" name="dPdctQnt" value=<?php echo $row2['quantity']?> readonly>
                </div>
                <div class="col-md-2">
                    <label for="Price" class="form-label">Price/Unit</label>
                    <input type="text" class="form-control" name="dPdctPrc" value=<?php echo $row2['selling_price']?> readonly>
                </div>
                <!-- <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div> -->
            </form>
        </div>
        <br>


        <div class="container">
            <h4 class="card-title">Buyer Information</h4>
            <form action="r_buy.php?sl= <?php echo $dSL?> & id=<?php echo $dID?>  & rid=<?php echo $rID?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <label for="Retailer Name" class="form-label">Retailer Name</label>
                        <input type="text" class="form-control" name="rName" value="<?php echo $row3['name']?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="Phone Number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="rPhnNUm" value=<?php echo $row3['phnNum']?> readonly>
                    </div>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" name="rAddress" value=<?php echo $row3['address']?> readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="Product Name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="rPdctName" value=<?php echo $row2['product_name']?> readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="Product Quantity" class="form-label">Product Quantity</label>
                        <input type="text" class="form-control" name="rPdctQnt" value=<?php echo $pQunt?>>
                    </div>
                    <div class="col-md-2">
                        <label for="Price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="rPdctPrc" value=<?php echo $row2['selling_price']?> readonly>
                    </div>
                </div>
                <!-- <button type="submit" name="ok" class="btn btn-success my-3">Ok</button>
                <div class="col-12">
                    <label for="total" class="form-label">Total Price</label>
                    <input type="text" class="form-control" name="dTotalPrice" value=<?php echo $total; ?> readonly>
                </div> -->
                <div class="row">
                    <div class="col-md-6">
                    <button type="button" class="btn btn mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal"
data-bs-whatever="@getbootstrap"><img src="https://www.logo.wine/a/logo/BKash/BKash-Icon2-Logo.wine.svg" class="rounded mx-auto d-block" alt="..." style="height: 50; width:200px"></button>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <img src="img/bkash.png" alt="logo" width="500" height="90" />
        
        </div>
        <div class="modal-body" style="background-color:#e01261;">
        <form action="r_buy.php" method="post">
          <div class="Container">
            <label for="form-select cc" class="form-label" style="color:aliceblue">Ammount</label>
            <input type="text"  class="form-control" name="bpamm" id="" >

            <label for="form-select cc" class="form-label" style="color:aliceblue">Phone Number</label>
            <input type="text"  class="form-control" name="bpnum" id="" >
            
            <label for="price cc" class="form-label" style="color:aliceblue">Pin</label>
            <input type="password" min="0.00" class="form-control" name="bppin">
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn mt-4" name="bconf" style="background-color:aliceblue;">Confirm</button>&nbsp;
                <button type="submit" class="btn mt-4" name="cancle" style="background-color:antiquewhite;">Cancel</button>&nbsp;
            </div>

            <!-- <div class="d-flex justify-content-center">
              <label for="number" class=" col-form-label col-mb-4" style="color:White ;"><h5>Transaction ID</h5><br></label>
              <input type="number" class="form-control" style="width: 300px;" value="<?php echo $btrx;?>" readonly>
            </div> -->
          </div>
        </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">
<button type="button" class="btn btn mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal2"
data-bs-whatever="@getbootstrap"><img src="https://www.logo.wine/a/logo/Nagad/Nagad-Vertical-Logo.wine.svg" class="rounded mx-auto d-block" alt="..." style="height: 50; width:200px"></button>

  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <img src="img/nagad.png" alt="logo" width="500" height="90" />
        
        </div>
        <div class="modal-body" style="background-color:#d71319;">
        <form action="r_buy.php" method="post"></form>
          <div class="Container">
                  <label for="form-select cc" class="form-label" style="color:aliceblue">Ammount</label>
                  <input type="text"  class="form-control" name="pamm" id="" >

                  <label for="form-select cc" class="form-label" style="color:aliceblue">Phone Number</label>
                  <input type="text"  class="form-control" name="pnum" id="" >
                  
                  <label for="price cc" class="form-label" style="color:aliceblue">Pin</label>
                  <input type="password" min="0.00" class="form-control" name="ppin" >
                  <div class="d-flex justify-content-center">
                      <button type="submit" class="btn mt-4" name="nconf" style="background-color:aliceblue;">Confirm</button>&nbsp;
                      <button type="submit" class="btn mt-4" name="cancle" style="background-color:antiquewhite;">Cancel</button>&nbsp;
              </div>

            <!-- <div class="d-flex justify-content-center">
              <label for="number" class=" col-form-label col-mb-4" style="color:White ;"><h5>Transaction ID</h5><br></label>
              <input type="number" class="form-control" style="width: 300px;" value="<?php echo $btrx;?>" readonly>
            </div> -->
            </div>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
                </div>
                <div class="col-12">
                    <label for="trnx" class="form-label">Transaction ID</label>
                    <input type="text" class="form-control"  name="rTId" value="<?php echo $btrx;?>">
                </div>
                <button type="submit" name="confirm" class="btn btn-success my-3">Confirm</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>