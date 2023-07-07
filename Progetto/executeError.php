<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <?php include("include.php")?>
</head>
<body>
    <header class="p-3 mb-3 border-bottom " style="--bs-border-color: black;">
            <div class="d-flex justify-content-between mx-3 align-items-center">
                <div class="d-flex align-items-center">
                    <a href="homepage.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <img src="image/logo.jpg" height="50" width="50" alt="Logo">
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="color: black;">
                        <li><a href="homepage.php" class="nav-link px-2 "> Home </a></li>
                        <li><a href="product.php" class="nav-link px-2 "> Products </a></li>
                    </ul>
                </div>    
            </div>
    </header>

    <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-danger alert-dismissible fade show" style="width: 40%; ">
            <h4 class="alert-heading" style="color: #ab0000 !important;"><i class="bi-exclamation-octagon-fill" style="color: #ab0000 !important;"></i> Oops! Something went wrong.</h4>
            <div class="d-flex justify-content-center">
                <h5 style="color: #ab0000 !important;">the server is not responding, try again later. <br> If you need any help just contact us. </h5>
            </div>
            <hr>
            <h3 style="color: #ab0000 !important;">Error §§§</h3>
        </div>
    </div>
</body>
</html>