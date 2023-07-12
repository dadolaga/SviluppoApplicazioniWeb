<!DOCTYPE html>
<html lang="EN">

<head>
  <title>Registration</title>
  <style>
    #login {
      display: none;
    }
    .wrong_data {
      color: #a51a27 !important;
      font-weight: 800;
    }
    .verification{
      margin: 20px 0px;
      
    }
    .verification >p{
      margin: 0px;
      color: #ad0202 !important;
      font-size: smaller;
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

  if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"])) { //se riceve qualcosa con POST dobbiamo registrarlo
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = $_POST['pass'];
    $confirm = $_POST['confirm'];

    if ($password != $confirm || check_password($password))
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

  function check_password($password) {
    if (preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/[0-9]/', $password)) {
        return true;
    } else {
        return false;
    }
}

  ?>
</head>

<body>
  <?php require "../home/header.php"; ?>

  <main class="form-signin w-100 my-5">
    <div class="col-md-10 m-auto col-lg-5">
      <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" id="registration">
      <p class="wrong_data" <?php echo $no_pass?>> !! Password not coherent</p>

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
          <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password" required >
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="confirm" id="floatingConfirm" placeholder="Password" required>
          <label for="floatingConfirm">Confirm Password</label>
        </div>
        <div class="verification " >
          <p>• The password must be at least 8</p>
          <p>• The password must contain at least one lowercase character</p>
          <p>• The password must contain at least one uppercase character</p>
          <p>• The password must contain at least a number</p>
        </div>
        <input type="submit" name="submit" value="registration" class="w-100 btn btn-lg btn-primary">
        <hr class="my-4">
        <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
      </form>
    </div>
  </main>
</body>

<script>

  function checkPassword(password) {
      return /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password);
  }

  document.getElementById("registration").addEventListener("submit",function (event){
    let password; //per questa funzione
    password=document.getElementById("registration").elements["pass"].value; //per prendere elemento password dentro al form
    
    if(password.lenght < 8 || !checkPassword(password)){
      alert ("control the password");
      event.preventDefault();
    }
  })
</script>
</html>