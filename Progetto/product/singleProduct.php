<!DOCTYPE html>
<html lang="en">

<head>
  <title>Singol product</title>
  <?php
  require "../home/connection.php";
  require "../home/include.php";

  if (isset($_GET["id"])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    $stmt = mysqli_prepare($connection, "SELECT product.*, AVG(review.Rating) AS rating FROM product LEFT JOIN review ON product.Id = review.ProductId WHERE product.Id=? GROUP BY product.Id");
    mysqli_stmt_bind_param($stmt, 'i', $id);


    if (!mysqli_stmt_execute($stmt))
      echo "Errore nella connessione";
    $res = mysqli_stmt_get_result($stmt); //piglio risultato
    $rowProduct = mysqli_fetch_array($res); //piglio tutta la riga
    $rating_value = round($rowProduct['rating']);
  }
  ?>
  <link href="../style/styleStar.css" rel="stylesheet">
</head>

<body>
  <?php require "../home/header.php"; ?>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h3><?php echo $rowProduct['Title']; ?></h3>
        <div class="row">
          <div class="col-3">
            <div class="white-box text-center"><img src="../image/product/<?php echo $rowProduct['Id']; ?>.jpg" style="width: 100%;" class="img-responsive"></div>
          </div>
          <div class="col-9" style="padding: 0 7rem;">
            <h4 class="box-title">Product description</h4>
            <p><?php echo $rowProduct['Description']; ?></p>
            <h2 class="mt-5">
              <?php echo $rowProduct['Price']; ?> §
            </h2>
            <?php
            include("../home/starRatingSingle.php");
            ?>
            <button class="btn btn-primary btn-rounded" onclick="window.open('../cart/addToCart.php?id=<?php echo $id ?>', '_self')"> Add to cart</button>
          </div>
        </div>
      </div>
    </div>
    <?php require "../home/footer.php" ?>
  </div>

</body>

</html>