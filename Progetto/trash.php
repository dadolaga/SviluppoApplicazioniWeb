<?php 
    require "connection.php"; //se non trova file da errore
    require "include.php";
	
    if (isset($_GET["id"])) { //se riceve qualcosa con POST dobbiamo registrarlo
        $id = mysqli_real_escape_string($connection, trim($_GET['id']));
        $stmt = mysqli_prepare($connection, "DELETE FROM carrello WHERE ProdottoId=? AND UtenteId=?;");
        mysqli_stmt_bind_param($stmt, 'ii',$_GET['id'], $_SESSION['Id']);
        mysqli_stmt_execute($stmt);
    }
?>