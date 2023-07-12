<!DOCTYPE html>
<html lang="en">

<head>
  <title>Review</title>
  <?php
  require "../home/connection.php";
  require "../home/include.php";
  ?>
  <link href="../style/styleStar.css" rel="stylesheet">

  <style>
    .container {
      width: 60%;
    }
  </style>

</head>

<body>
  <?php require "../home/header.php"; ?>
  <div class="container">
    <?php
    $offset = 0;
    $stmt = mysqli_prepare($connection, "SELECT DISTINCT Id, Title FROM myOrder JOIN product ON myorder.ProductId=product.Id WHERE UserId=?;");
    if (!$stmt){
      error_log('Query error: ' . mysqli_error($connection));
      header("Location: ../home/executeError.php");
    }
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['Id']);
    if(!mysqli_stmt_execute($stmt))
        header("Location: ../home/executeError.php");
    $res = mysqli_stmt_get_result($stmt);

    $array_id = array();
    while (($row = mysqli_fetch_array($res)) != NULL) {
      $stmt = mysqli_prepare($connection, "SELECT Rating FROM review WHERE UserId=? AND ProductId=?;");
      if (!$stmt){
        error_log('Query error: ' . mysqli_error($connection));
        header("Location: ../home/executeError.php");
      }
      mysqli_stmt_bind_param($stmt, 'ii', $_SESSION['Id'], $row['Id']);
      if(!mysqli_stmt_execute($stmt))
        header("Location: ../home/executeError.php");

      $res_rating = mysqli_stmt_get_result($stmt);
      $rating_value = 0;
      $button_disabled = "";
      if (($row_rating = mysqli_fetch_array($res_rating)) != NULL) {
        $rating_value = $row_rating[0];
        $button_disabled = "disabled";
      }

      array_push($array_id, $row['Id']);
      echo '<form action="../review/add../review/review.php" method="GET">
              <div class="row border rounded mb-4 bg-white position-relative">
              <div class="col-auto p-0 rounded">
              <img src="../image/product/' . $row['Id'] . '.jpg" alt="' . $row['Title'] . '" width="200" height="250">  
              </div>
              
              <div class="row col p-4">
                <h3 class="mb-0">' . $row['Title'] . '</h3>
                
                  <div class="col-8">
                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="4" style="margin-top:30px;" required> this is the product review </textarea>
                  </div>
                  <div class="col-1"></div>
                  <button type="submit" class="col-3 btn btn-dark" id="btn-dark" ' . $button_disabled . '>Recensisci</button>

                  <input type="hidden" name="id" value="' . $row['Id'] . '"> </input>
                ';
      include("../product/starRating.php");

      echo ' </div>
            </div>
            </form>';
    }
    ?>
    <?php require "../home/footer.php" ?>
  </div>

</body>

</html>