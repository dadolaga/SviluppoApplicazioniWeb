<?php require "connection.php"; //se non trova file da errore
    require "include.php";
	
    if (!empty($_GET)) { //se riceve qualcosa con POST dobbiamo registrarlo
        $id = mysqli_real_escape_string($connection, trim($_GET['id']));
        $stmt = mysqli_prepare($connection, "INSERT INTO review(UserId, ProductId, Rating) VALUES(?,?,?)");
        mysqli_stmt_bind_param($stmt, 'iii', $_SESSION['Id'], $id, $_GET['rating']);
        mysqli_stmt_execute($stmt);
    }
?>
<script>
    history.back();
</script>