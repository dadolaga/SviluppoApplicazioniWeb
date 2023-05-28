<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product</title>
  <?php
  require "connection.php";
  require "include.php";

  if(isset($_GET["id"])){
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    $stmt=mysqli_prepare($connection,"SELECT * FROM product WHERE id=$id");
    if(!mysqli_stmt_execute($stmt))
        echo "Errore nella connessione";
    $res=mysqli_stmt_get_result($stmt);//piglio risultato
    $rowProduct=mysqli_fetch_array($res);//piglio tutta la riga

  }
  ?>
  <link href="styleStar.css" rel="stylesheet">
</head>

<body>
  <?php require "header.php";?>
  <div class="container">
  <div class="card">
        <div class="card-body">
            <h3><?php echo $rowProduct['Title'];?></h3>
            <div class="row">
                <div class="col-3">
                    <div class="white-box text-center"><img src="product/<?php echo $rowProduct['Id'];?>.jpg" style="width: 100%;" class="img-responsive"></div>
                </div>
                <div class="col-9" style="padding: 0 7rem;">
                    <h4 class="box-title">Product description</h4>
                    <p><?php echo $rowProduct['Description'];?></p>
                    <h2 class="mt-5">
                      <?php echo $rowProduct['Price'];?> §
                    </h2>
                    <?php
                      include("starRatingSingle.php");
                    ?>
                    <button class="btn btn-primary btn-rounded" onclick="window.open('addToCart.php?id=<?php echo $id ?>', '_self')"> Add to cart</button>
                </div>
            </div>
        </div>
    </div>
      <?php require "footer.php" ?>
  </div>
  
</body>

</html>
