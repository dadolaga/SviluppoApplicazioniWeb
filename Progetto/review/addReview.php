<?php 
    require "../home/connection.php"; //se non trova file da errore

    if (isset($_GET['id']) && isset($_GET['rating'])) { //se riceve qualcosa con POST dobbiamo registrarlo
        $stmt = mysqli_prepare($connection, "INSERT INTO review(UserId, ProductId, Rating) VALUES(?,?,?)");
        if (!$stmt){
            error_log('Query error: ' . mysqli_error($connection));
            header("Location: ../home/executeError.php");
        }
        mysqli_stmt_bind_param($stmt, 'iii', $_SESSION['Id'], $_GET['id'], $_GET['rating']);
        if(!mysqli_stmt_execute($stmt))
            header("Location: ../home/executeError.php");
        header("Location: review.php");
    }
    else 
        header("Location: ../home/executeError.php");
?>