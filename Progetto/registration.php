<!DOCTYPE html>
<html lang="EN">
    <head> <title>Registration</title> 
    <style> 
      #login{display: none;}
    </style>
        <?php 
        $loginNotRequired = true;
      
        require "connection.php"; //se non trova file da errore
        require "include.php";
            if(isset($_POST["firstname"])){ //se riceve qualcosa con POST dobbiamo registrarlo
                $firstname=mysqli_real_escape_string($connection,trim($_POST['firstname']));
                $lastname=mysqli_real_escape_string($connection,trim($_POST['lastname']));
                $email=mysqli_real_escape_string($connection,trim($_POST['email']));
                $password=mysqli_real_escape_string($connection,trim($_POST['pass']));
                $confirm=mysqli_real_escape_string($connection,trim($_POST['confirm']));

                if($password!=$confirm){ 
                    echo "Le password non corrispondono";
                    exit(1);
                }
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $stmt=mysqli_prepare($connection,"INSERT INTO user(Name,Surname,Email,Password) VALUES(?,?,?,?)");
                mysqli_stmt_bind_param($stmt,'ssss',$firstname,$lastname,$email,$hash);
                mysqli_stmt_execute($stmt);

                if(mysqli_affected_rows($connection)===0)
                    echo "Errore nella registrazione";
                else {
                  echo "Utente registrato"; 
                  header("Location: login.php");
                }

            }
        ?>
    </head>
    <body>
        <?php require "header.php";?>

        <main class="form-signin w-100 my-5">
        <div class="col-md-10 m-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light"method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="firstname" id="floatingFirstname" placeholder="Firstname" required>
            <label for="floatingFirstname">Firstname</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="lastname" id="floatingLastname" placeholder="Lastname" required>
            <label for="floatingLastname">Lastname</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com" required>
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
