<?php require "../home/connection.php"; //se non trova file da errore
    require "../home/include.php";
	
    if (isset($_GET["id"])) { //se riceve qualcosa con POST dobbiamo registrarlo
        $id = mysqli_real_escape_string($connection, trim($_GET['id']));
        $stmt = mysqli_prepare($connection, "INSERT INTO cart(UserId, ProductId, Pice) VALUES(?,?,+1) ON DUPLICATE KEY UPDATE Pice=Pice+1;");
        mysqli_stmt_bind_param($stmt, 'ii', $_SESSION['Id'], $id);
        mysqli_stmt_execute($stmt);
    }
?>
<script>
    history.back();
</script>