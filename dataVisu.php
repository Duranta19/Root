<?php
include('components/dbconnect.php');
?>
<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Visualization</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Product Name', 'Buying Price', 'Selling Price'],
          <?php
            $query="SELECT product_name, AVG(buing_price) as buy_price, AVG(selling_price) as sell_price FROM `distributor` GROUP BY product_name";
            $res=mysqli_query($conn,$query);
            while($data=mysqli_fetch_array($res)){
              $p=$data['product_name'];
              $bp=$data['buy_price'];
              $sp=$data['sell_price'];
           ?>
           ['<?php echo $p;?>',<?php echo $bp;?>,<?php echo $sp;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Distributor Sells',
            subtitle: 'Average Buying and Selling Price',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Product', 'Quantity'],
          <?php
            $query="SELECT `product`, sum(quantity) as total_production FROM `farmer` GROUP by product;";
            $res=mysqli_query($conn,$query);
            while($data=mysqli_fetch_array($res)){
              $p=$data['product'];
              $tp=$data['total_production'];
           ?>
           ['<?php echo $p;?>',<?php echo $tp;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          title: 'Total Production of Products',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Product Name', 'Buying Price', 'Selling Price'],
          <?php
            $query="SELECT product_name, AVG(buing_price) as buy_price, AVG(selling_price) as sell_price FROM `retailer` GROUP BY product_name";
            $res=mysqli_query($conn,$query);
            while($data=mysqli_fetch_array($res)){
              $p=$data['product_name'];
              $bp=$data['buy_price'];
              $sp=$data['sell_price'];
           ?>
           ['<?php echo $p;?>',<?php echo $bp;?>,<?php echo $sp;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Retailer Sells',
            subtitle: 'Average Buying and Selling Price',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Product', 'Demand', 'Supply'],
            <?php
                $query1="SELECT `product`, sum(quantity) as total_production,(SELECT demand from demand where demand.product_name = farmer.product) as p_demand FROM `farmer` GROUP by product;";
                $res1=mysqli_query($conn,$query1);
                while($data=mysqli_fetch_array($res1)){
                    $p=$data['product'];
                    $tp=$data['total_production'];
                    $demand = $data['p_demand'];
            ?>
            ['<?php echo $p;?>', <?php echo $demand;?> ,<?php echo $tp;?>],
            <?php } ?>
        ]);

        var options = {
          chart: {
            title: 'Supply And Demand',
            subtitle: 'Supply Vs. Demand: 2021-2022',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material3'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Product', 'Farmer Selling price', 'Retailer Selling Price'],

          <?php
                $query2="SELECT product, avg(price) as f_price, avg(selling_price) as r_price
                from farmer
                INNER JOIN retailer
                on farmer.product = retailer.product_name
                GROUP BY product";
                $res3=mysqli_query($conn,$query2);
                while($data=mysqli_fetch_array($res3)){
                    $p=$data['product'];
                    $afp=$data['f_price'];
                    $arp = $data['r_price'];
            ?>
            ['<?php echo $p;?>', <?php echo $afp;?> ,<?php echo $arp;?>],
            <?php } ?>
        ]);

        var options = {
          title: 'Farmer Price vs Retailer Price',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      </script>
     <style>
    /* .header {
      background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4)),
        url("img/adminHome.jpg");
      background-position: center;
      background-size: cover;
      width: 100%;
      height: 100vh;
      position: relative;
    } */

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
    <nav class="navbar navbar-expand-lg navbar-light" >
      <div class="container-fluid">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#7ddbb6" class="bi bi-tree" viewBox="0 0 16 16">
          <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z" />
        </svg>
        <a class="navbar-brand theme-text" href="index.php" >&nbsp;Roots</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="adminHome.php" >Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="updateDemand.php">Update Demand</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="container">
  <div id="piechart" style="width: 900px; height: 500px; margin:auto"></div>
    <div class="row">
        <div class="col">
            <div id="barchart_material" style="height: 500px;"></div>
        </div>
        <div class="col">
            <div id="barchart_material2" style="height: 500px;"></div>
        </div>
    </div>
    <br>
    <div id="barchart_material3" style="width: 900px; height: 500px; margin:auto"></div>
    <br>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  </body>
</html>