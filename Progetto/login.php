<!DOCTYPE html>
<html lang="EN">
    <head> <title>Login</title> 
      <style> 
        #login{display: none;}
        
      </style>
        <?php require "connection.php"; //se non trova file da errore
        require "include.php";
            if(isset($_POST["email"])){ 
                $email=mysqli_real_escape_string($connection,trim($_POST['email']));
                $password=mysqli_real_escape_string($connection,trim($_POST['pass']));

                $stmt=mysqli_prepare($connection,"SELECT Id,Name,Password FROM utenti WHERE utenti.Email='$email'");
                if(!mysqli_stmt_execute($stmt))
                    echo "Errore nella connessione";
                $res=mysqli_stmt_get_result($stmt);//piglio risultato
                $row=mysqli_fetch_array($res);//piglio tutta la riga
                $conta=mysqli_num_rows($res);

                print_r($row);
                if($conta==1 && password_verify($password,$row['Password'])){
                    $_SESSION['Id'] = $row['Id'];
                    $_SESSION['name']=$row['Name'];
                    $_SESSION['password']=$password;
                    header("Location: index.php");
                }
                else {
                    echo "Identificazione non riuscita: Name utente o password errati <br />";
                }
            }
        ?>
    </head>
    <body>
        <?php require "header.php";?>

        <main class="form-signin w-100">
        <div class="col-md-10 m-auto col-lg-5" >
        <form class="p-4 p-md-5 rounded-3" style="background-color: #f8edeb4a;" method="POST">
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