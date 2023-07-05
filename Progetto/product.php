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

</head>

<body>
  <?php require "header.php";?>
  <div class="container">
    <?php
    
    $stmt=mysqli_prepare($connection,"SELECT product.*, AVG(recensioni.Rating) AS rating FROM product LEFT JOIN recensioni ON product.Id = recensioni.ProductId WHERE Title LIKE ? GROUP BY product.Id");
    
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
              <img src="product/'.$row['Id'].'.jpg" width="200" height="250">  
              </div>
              <div class="col p-4">
                <h3 class="mb-0">'.$row['Title'].'</h3>
                <div class="mb-1 text-muted">'.$row['Price'].' §</div>
                <p class="mb-auto">'.$row['Description'].'</p>
                <form alt="hello">
                ';
                include("starRating.php");
      echo' </form>
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
        window.addEventListener("DOMContentLoaded", () => {
          var array_id=<?php echo json_encode($array_id); ?>; 
          for(var i=0;i<array_id.length;i++){
            //variabile per animazione
          const starRating= new StarRating("#rating_form_"+array_id[i], array_id[i]);
          }
        });

            class StarRating {
                constructor(qs, id) {
                  console.log(qs);
                    this.id=id;
                    this.rating = null;
                    this.el = document.querySelector(qs);   //prende tutto "l'array" stelle
                    this.el?.addEventListener("change", this.updateRating.bind(this)); //fa partire updateRating quando clicchi qualcosa
                }
                
                updateRating(e) {
                    // clear animation delays
                    Array.from(this.el.querySelectorAll('[for*="rating_'+this.id)).forEach(el => {
                        el.className = "rating__label";
                        
                    });
                    
                    const prevRatingID = this.rating || 0;
                    this.rating=parseInt(e.target.value);

                    let delay = 0;
                    for(var i=1;i<=5;i++) {
                        // crea ritardo animazione 
                        const ratingLabel = this.el.querySelector('[for="rating_'+this.id+'-'+ i+'"]');
                        if (i > prevRatingID + 1 && i <= this.rating) {  
                                                   
                            ++delay;                            
                            ratingLabel.classList.add(`rating__label--delay${delay}`);
                        }
                    }
                }
            }
        </script>