<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product</title>
  <?php
    require "connection.php";
    require "include.php";
  ?>
  <link href="styleStar.css" rel="stylesheet">

</head>

<body>
  <?php require "header.php";?>
  <div class="container">
    <?php
    $offset=0;
    $stmt=mysqli_prepare($connection,"SELECT DISTINCT Id, Title FROM myOrder JOIN product ON myorder.ProductId=product.Id WHERE UserId=?;");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['Id']);
	  mysqli_stmt_execute($stmt);
    $res=mysqli_stmt_get_result($stmt);

    $array_id=array();
    while(($row=mysqli_fetch_array($res))!=NULL){
      $stmt=mysqli_prepare($connection,"SELECT Rating FROM review WHERE UserId=? AND ProductId=?;");
      mysqli_stmt_bind_param($stmt, 'ii', $_SESSION['Id'], $row['Id']);
      mysqli_stmt_execute($stmt);
      $res_rating=mysqli_stmt_get_result($stmt);
      $rating_value=0;
      $button_disabled="";
      if(($row_rating=mysqli_fetch_array($res_rating))!=NULL){
        $rating_value=$row_rating[0];
        $button_disabled="disabled";
      }
      array_push($array_id,$row['Id']);
      echo '<form action="addReview.php" method="GET">
              <div class="row mx-5 border rounded mb-4 bg-white position-relative">
              <div class="col-auto p-0 rounded">
              <img src="product/'.$row['Id'].'.jpg" width="200" height="250">  
              </div>
              
              <div class="row col p-4">
                <h3 class="mb-0">'.$row['Title'].'</h3>
                
                  <div class="col-8">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="4" required> questa è la recensione del prodotto</textarea>
                  </div>
                  <div class="col-1"></div>
                  <button type="submit" class="col-3 btn btn-dark" id="btn-dark" '.$button_disabled.'>Recensisci</button>

                  <input type="hidden" name="id" value="'.$row['Id'].'"> </input>
                ';
                include("starRating.php");
                
      echo' </div>
            </div>
            </form>';
    }
    ?>
    
    
      <?php require "footer.php" ?>
  </div>
  
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
</body>
</html>