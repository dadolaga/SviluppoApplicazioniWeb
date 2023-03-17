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
    $row=mysqli_fetch_array($res);//piglio tutta la riga
    $conta=mysqli_num_rows($res);

    if($conta == 0) {
        echo "Identificazione non riuscita: nome utente o password errati <br />";
    }
  }
  ?>
</head>

<body>
  <?php require "header.php";?>
  <div class="container">
  <div class="card">
        <div class="card-body">
            <h3><?php echo $row['Titolo'];?></h3>
            <div class="row">
                <div class="col-3">
                    <div class="white-box text-center"><img src="product/<?php echo $row['Id'];?>.jpg" style="width: 100%;" class="img-responsive"></div>
                </div>
                <div class="col-9" style="padding: 0 7rem;">
                    <h4 class="box-title">Product description</h4>
                    <p><?php echo $row['Descrizione'];?></p>
                    <h2 class="mt-5">
                      <?php echo $row['Prezzo'];?> §
                    </h2>
                    <button class="btn btn-primary btn-rounded" onclick="window.open('ShoppingBag.php?id=<?php echo $id ?>', '_self')"> Add to cart</button>
                </div>
            </div>
        </div>
    </div>
      <?php require "footer.php" ?>
  </div>
  
</body>

</html>