<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roots Supply Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="styleLP.css">
</head>

<body>
    <section id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#93d7e9" class="bi bi-tree"
                        viewBox="0 0 16 16">
                        <path
                            d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z" />
                    </svg>
                    <a class="navbar-brand theme-text" href="index.php">&nbsp;Roots</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link act" aria-current="page" href="#">Home</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Our Servces</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="farmerHome.php">Farmer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="distributorHome.php">Distributor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="retailerHome.php">Local Store</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link act" href="signup.php">Sign In</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="middle">
                <h1 class="text-white display-3 fw-bold"> We Help you to find <span class="theme-text">
                        a <br> Clean Supply Chain</span>.</h1>
            </div>
        </div>
        <svg class="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 180" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(81.061, 236.7, 199.262, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(50.695, 75.646, 81.879, 1)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)"
                d="M0,0L48,27C96,54,192,108,288,111C384,114,480,66,576,57C672,48,768,78,864,90C960,102,1056,96,1152,99C1248,102,1344,114,1440,120C1536,126,1632,126,1728,123C1824,120,1920,114,2016,99C2112,84,2208,60,2304,57C2400,54,2496,72,2592,90C2688,108,2784,126,2880,111C2976,96,3072,48,3168,36C3264,24,3360,48,3456,75C3552,102,3648,132,3744,126C3840,120,3936,78,4032,69C4128,60,4224,84,4320,96C4416,108,4512,108,4608,102C4704,96,4800,84,4896,69C4992,54,5088,36,5184,24C5280,12,5376,6,5472,12C5568,18,5664,36,5760,51C5856,66,5952,78,6048,93C6144,108,6240,126,6336,111C6432,96,6528,48,6624,45C6720,42,6816,84,6864,105L6912,126L6912,180L6864,180C6816,180,6720,180,6624,180C6528,180,6432,180,6336,180C6240,180,6144,180,6048,180C5952,180,5856,180,5760,180C5664,180,5568,180,5472,180C5376,180,5280,180,5184,180C5088,180,4992,180,4896,180C4800,180,4704,180,4608,180C4512,180,4416,180,4320,180C4224,180,4128,180,4032,180C3936,180,3840,180,3744,180C3648,180,3552,180,3456,180C3360,180,3264,180,3168,180C3072,180,2976,180,2880,180C2784,180,2688,180,2592,180C2496,180,2400,180,2304,180C2208,180,2112,180,2016,180C1920,180,1824,180,1728,180C1632,180,1536,180,1440,180C1344,180,1248,180,1152,180C1056,180,960,180,864,180C768,180,672,180,576,180C480,180,384,180,288,180C192,180,96,180,48,180L0,180Z">
            </path>
        </svg>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>