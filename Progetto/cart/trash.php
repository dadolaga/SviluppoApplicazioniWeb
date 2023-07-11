<?php 
    require "../home/connection.php"; //se non trova file da errore
	
    if (isset($_GET["id"])) { //se riceve qualcosa con POST dobbiamo registrarlo
        $id = mysqli_real_escape_string($connection, trim($_GET['id']));
        $stmt = mysqli_prepare($connection, "DELETE FROM cart WHERE ProductId=? AND UserId=?;");
        if (!$stmt){
            error_log('Query error: ' . mysqli_error($connection));
            http_response_code(400);
            exit;
        }
        mysqli_stmt_bind_param($stmt, 'ii',$_GET['id'], $_SESSION['Id']);
        mysqli_stmt_execute($stmt);
    }
    else{
        http_response_code(400);
        exit;
    }
?>