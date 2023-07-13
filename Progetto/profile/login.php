<!DOCTYPE html>
<html lang="EN">

<head>
  <title>Login</title>
  <style>
    #login {
      display: none;
    }

    .wrong_data {
      color: #a51a27 !important;
      font-weight: 800;
    }
  </style>
  <?php
  $loginNotRequired = true;

  require "../home/connection.php"; //se non trova file da errore
  require "../home/include.php";
  $no_log = "style= 'display: none'"; //per far uscire 'wrong email'

  if (isset($_POST["email"]) && isset($_POST["pass"])) {
    $email = trim($_POST['email']); //trim per non avere spazi nella mail
    $password = $_POST['pass'];

    $stmt = mysqli_prepare($connection, "SELECT Id,Name,Password FROM user WHERE user.Email=?");
    if (!$stmt){
        error_log('Query error: ' . mysqli_error($connection));
        header("Location: ../home/executeError.php");
    }
    mysqli_stmt_bind_param($stmt, 's', $email);
    if (!mysqli_stmt_execute($stmt))
        header("Location: ../home/executeError.php");
    $res = mysqli_stmt_get_result($stmt); //piglio risultato
    $row = mysqli_fetch_array($res); //piglio tutta la riga

    //se email esiste e la pass è giusta
    if ($row!=null && password_verify($password, $row['Password'])) {
      $_SESSION['Id'] = $row['Id'];
      header("Location: ../home/homepage.php");
    } 
    else 
      $no_log = "style= 'display: block'";
  }
  ?>
</head>

<body>
  <?php require "../home/header.php"; ?>

  <main class="form-signin w-100">
    <div class="col-md-10 m-auto col-lg-5">

      <form class="p-4 p-md-5 rounded-3" style="background-color: #f8edeb4a;" method="POST">
        <p class="wrong_data" <?php echo $no_log; ?>>Wrong email or password</p>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com" required>
          <label for="floatingEmail">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>
        <input type="submit" name="submit" value="login" class="w-100 btn btn-lg btn-primary">
        <hr class="my-4">
        <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
      </form>
    </div>
  </main>
</body>

</html>