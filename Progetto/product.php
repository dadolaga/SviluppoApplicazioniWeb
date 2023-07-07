<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product</title>
  <?php
  $loginNotRequired = true;
  require "connection.php";
  require "include.php";

  $showSearch = true;
  ?>
  <link href="styleStar.css" rel="stylesheet">

  <style> 
  .container{ width: 60%;}
  </style> 

</head>

<body>
  <?php require "header.php";?>
  <div class="container">
    <?php
    
    $stmt=mysqli_prepare($connection,"SELECT product.*, AVG(review.Rating) AS rating FROM product LEFT JOIN review ON product.Id = review.ProductId WHERE Title LIKE ? GROUP BY product.Id");
    
    if(isset($_GET['name']))
      $name = "%" . $_GET['name'] . "%";
    else
      $name = "%";

    mysqli_stmt_bind_param($stmt, 's', $name);
    if(!mysqli_stmt_execute($stmt))
        echo "Errore nella connessione";
    $res=mysqli_stmt_get_result($stmt);//piglio risultato
    $array_id=array();
    while(($row=mysqli_fetch_array($res))!=NULL){
      $rating_value = round($row['rating']);

      array_push($array_id,$row['Id']);
      echo '<div class="row border rounded mb-4 bg-white position-relative" onclick="openWindow('.$row['Id'].')">
              <div class="col-auto p-0 rounded">
              <img src="product/'.$row['Id'].'.jpg" alt="'.$row['Title'].'" width="200" height="250">  
              </div>
              <div class="col p-4">
                <h3 class="mb-0">'.$row['Title'].'</h3>
                <div class="mb-1 text-muted">'.$row['Price'].' §</div>
                <p class="mb-auto">'.$row['Description'].'</p>
                <form > <fieldset disabled> '; //fieldset disabilita tutto form stelline in product
                include("starRating.php");
      echo' </fieldset>
            </form>
            </div>
            </div>';
    }
    ?>
    
      <?php require "footer.php" ?>
  </div>
  
</body>


</html>
<script>
  var disable;

  function disableWindowsOpen(){
    disable=true;
  }
  function enableWindowsOpen(){
    disable=false;
  }

  function openWindow(id){
    if(!disable) 
      window.open('singleProduct.php?id='+id, '_self'); 
  }
</script>