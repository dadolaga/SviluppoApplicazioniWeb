<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <?php
  $loginNotRequired = true;
  require "connection.php";
  require "include.php";

  $showSearch = true;
  ?>

  <style>
    .text-truncate-container {
      width: 250px;
    }

    .text-truncate-container p {
      -webkit-line-clamp: 3;
      display: -webkit-box;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .testimonial-group > .row {
      display: block;
      overflow-x: auto;
      white-space: nowrap;
    }
    .testimonial-group > .row > .col-auto {
      display: inline-block;
    }
    .carousel-inner{
      border-radius: 55px;
    }

  </style>
</head>

<body>
  <?php require "header.php";?>
  <div class="container">
    <div id="carouselProducts" class="carousel slide mb-4" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
          $stmt=mysqli_prepare($connection,"SELECT * FROM product ORDER BY RAND() LIMIT 3");
          if(!mysqli_stmt_execute($stmt))
              echo "Errore nella connessione";
          $res=mysqli_stmt_get_result($stmt);//piglio risultato
          $active = "active";
          while(($row=mysqli_fetch_array($res))!=NULL){
            echo '<div class="carousel-item '.$active.'">
              <div class="card flex-md-row box-shadow h-md-250">
                <img class="card-img-left flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;   border-top-left-radius: 50px; border-bottom-left-radius: 50px;" src="product/'.$row['Id'].'.jpg" data-holder-rendered="true">
                <div class="card-body d-flex flex-column align-items-start">
                  <h3 class="mb-3">
                    <a class="text-dark" href="singleProduct.php?id='.$row['Id'].'">'.$row['Title'].'</a>
                  </h3>
                  <div class="mb-2">'.$row['Price'].' §</div>
                </div>
              </div>
            </div>';
            $active = "";
          }
        ?>
      </div>
    </div>

    <div class="row justify-content-md-center">    
      <div class="col-6 text-center">
        <h2>Evaluate your purchase:</h2>
        <div class="">
            <a href="review.php"><img src="image/house.png" height="150" width="150"></a>
          <div class="caption">
            <img src="image/stars.png" height="70" width="70"> <!-- Da riposizionare -->
          </div>
        </div>
      </div>

      <div class="col-6 text-center">
        <h2>Shopping cart:</h2>
        <div class="">
          <a href="ShoppingBag.php"><img class="rounded-circle" src="image/alien-shopping.jpg" height="200" width="200"></a>
        </div>
      </div>
    </div>
    
    <?php require "footer.php" ?>
  </div>
</body>

</html>