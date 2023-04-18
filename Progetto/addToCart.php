<?php require "connection.php"; //se non trova file da errore
    require "include.php";
	
    if (isset($_GET["id"])) { //se riceve qualcosa con POST dobbiamo registrarlo
        $id = mysqli_real_escape_string($connection, trim($_GET['id']));
        $stmt = mysqli_prepare($connection, "INSERT INTO carrello(UtenteId, ProdottoId, Pezzi) VALUES(?,?,+1) ON DUPLICATE KEY UPDATE Pezzi=Pezzi+1;");
        mysqli_stmt_bind_param($stmt, 'ii', $_SESSION['Id'], $id);
        mysqli_stmt_execute($stmt);
    }
?>
<script>
    history.back();
</script>