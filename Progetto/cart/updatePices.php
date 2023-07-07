<?php 
    require "../home/connection.php"; //se non trova file da errore
    require "../home/include.php";
	
    if (isset($_GET["id"]) && isset($_GET["Pezzi"])) { //se riceve qualcosa con POST dobbiamo registrarlo
        $id = mysqli_real_escape_string($connection, trim($_GET['id']));
        $stmt = mysqli_prepare($connection, "UPDATE cart SET Pice=? WHERE ProductId=? AND UserId=?;");
        mysqli_stmt_bind_param($stmt, 'iii', $_GET['Pezzi'],$_GET['id'], $_SESSION['Id']);
        mysqli_stmt_execute($stmt);
    }
?>