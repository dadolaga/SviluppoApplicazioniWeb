<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product</title>
  <?php
  require "connection.php";
  require "include.php";
  ?>
</head>

<body>
  <?php require "header.php";?>
  <div class="container">
    <?php
    $offset=0;
    $stmt=mysqli_prepare($connection,"SELECT * FROM product");
    if(!mysqli_stmt_execute($stmt))
        echo "Errore nella connessione";
    $res=mysqli_stmt_get_result($stmt);//piglio risultato
    $conta=mysqli_num_rows($res);

    $page=1;
    if (isset($_GET['page'])){
      $offset=$_GET['page']*6;
      $page=$_GET['page'];
    }
    $stmt=mysqli_prepare($connection,"SELECT * FROM product LIMIT 6 OFFSET $offset");
    if(!mysqli_stmt_execute($stmt))
        echo "Errore nella connessione";
    $res=mysqli_stmt_get_result($stmt);//piglio risultato
    while(($row=mysqli_fetch_array($res))!=NULL){
      echo '<div class="row border rounded mb-4 bg-white position-relative" onclick="window.open(\'singleProduct.php?id='.$row['Id'].'\', \'_self\') ">
              <div class="col-auto p-0 rounded">
              <img src="product/'.$row['Id'].'.jpg" width="200" height="250">  
              </div>
              <div class="col p-4">
                <h3 class="mb-0">'.$row['Title'].'</h3>
                <div class="mb-1 text-muted">'.$row['Price'].' §</div>
                <p class="mb-auto">'.$row['Description'].'</p>
              </div>
            </div>';
    }
    ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link <?php if($page <= 0) echo 'disabled';?>" href="?page=<?php echo $page-1?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php

         $numPage=1;
         if ($conta%6!=0)
           $numPage+=$conta/6;
         else $numPage=$conta/6;
        for($i=0;$i<$numPage-1;$i++){
          echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.($i+1).'</a></li>';
        }
        ?>
        <li class="page-item">
          <a class="page-link <?php if($page > $numPage-2) echo 'disabled';?>" href="?page=<?php echo $page+1?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    
      <?php require "footer.php" ?>
  </div>
  
</body>


</html>