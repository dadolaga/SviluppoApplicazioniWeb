<!DOCTYPE html>
<html lang="EN">

<head>
  <title>Registration</title>
  <style>
    #login {
      display: none;
    }
  </style>
  <?php
  $loginNotRequired = true;

  require "../home/connection.php"; //se non trova file da errore
  require "../home/include.php";

  $no_pass = "style= 'display: none'"; //per far uscire 'wrong pass'

    $firstname = "";
    $lastname = "";
    $email ="";

  if (isset($_POST["firstname"])) { //se riceve qualcosa con POST dobbiamo registrarlo
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = $_POST['pass'];
    $confirm = $_POST['confirm'];

    if ($password != $confirm)
        $no_pass = "style= 'display: block'";
    else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($connection, "INSERT INTO user(Name,Surname,Email,Password) VALUES(?,?,?,?)");
        if (!$stmt){
            error_log('Query error: ' . mysqli_error($connection));
            header("Location: ../home/executeError.php");
        }
        mysqli_stmt_bind_param($stmt, 'ssss', $firstname, $lastname, $email, $hash);
        if(!mysqli_stmt_execute($stmt)){
            error_log('Query error: ' . mysqli_error($connection));
            echo '<script> alert("email already exist"); </script>';
        }
        else
            header("Location: ../profile/login.php");
    }
  }
  ?>
</head>

<body>
  <?php require "../home/header.php"; ?>

  <main class="form-signin w-100 my-5">
    <div class="col-md-10 m-auto col-lg-5">
      <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST">
      <p class="wrong_data" <?php echo $no_pass?>>password not corrispond</p>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="firstname" id="floatingFirstname" placeholder="Firstname"   value="<?php echo $firstname; ?>" required >
          <label for="floatingFirstname">Firstname</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="lastname" id="floatingLastname" placeholder="Lastname"  value="<?php echo $lastname; ?>" required>
          <label for="floatingLastname">Lastname</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com"  value="<?php echo $email; ?>" required>
          <label for="floatingEmail">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="confirm" id="floatingConfirm" placeholder="Password" required>
          <label for="floatingConfirm">Confirm Password</label>
        </div>
        <input type="submit" name="submit" value="registration" class="w-100 btn btn-lg btn-primary">
        <hr class="my-4">
        <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
      </form>
    </div>
  </main>
</body>

</html>