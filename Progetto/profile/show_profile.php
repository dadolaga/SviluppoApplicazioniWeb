<!DOCTYPE html>
<html lang="EN">

<head>
  <title>Show profile</title>
  <?php
  require "../home/connection.php"; //se non trova file da errore
  require "../home/include.php";
  if (isset($_SESSION['Id'])) {
    $Id = $_SESSION['Id'];
    $stmt = mysqli_prepare($connection, "SELECT * FROM user WHERE user.Id='$Id'");
    if (!mysqli_stmt_execute($stmt))
      echo "Errore nella connessione";
    $res = mysqli_stmt_get_result($stmt); //piglio risultato
    $row = mysqli_fetch_array($res); //piglio tutta la riga
    $FIRSTNAME = htmlentities($row['Name']); //per evitare attacchi
    $LASTNAME = htmlentities($row['Surname']);
    $EMAIL = htmlentities($row['Email']);
    $USERNAME = htmlentities($row['Username']);
    $RESIDANCE = htmlentities($row['Residence']);
    $BORN = htmlentities($row['BornDate']);
  }
  ?>
</head>

<body>
  <?php require "../home/header.php"; ?>

  <main class="form-signin w-100 my-5">
    <div class="col-md-10 m-auto col-lg-5">
      <form action="../profile/update_profile.php" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="firstname" id="floatingFirstname" placeholder="Firstname" value=<?php echo $FIRSTNAME; ?>>
          <label for="floatingFirstname">Firstname</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="lastname" id="floatingLastname" placeholder="Lastname" value=<?php echo $LASTNAME; ?>>
          <label for="floatingLastname">Lastname</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com" value=<?php echo $EMAIL; ?>>
          <label for="floatingEmail">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="username" id="floatingUsername" placeholder="Username" value=<?php echo $USERNAME; ?>>
          <label for="floatingUsername">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="residance" id="floatingResidance" placeholder="Residance" value=<?php echo $RESIDANCE; ?>>
          <label for="floatingResidance">Residance</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="born" id="floatingBorn" placeholder="Born" value=<?php echo $BORN; ?>>
          <label for="floatingBorn">Born</label>
        </div>

        <input type="submit" name="submit" value="modification" class="w-100 btn btn-lg btn-primary">
        <hr class="my-4">
        <small class="text-muted">By clicking Modification, you agree to the terms of use.</small>
      </form>
    </div>
  </main>
</body>

</html>