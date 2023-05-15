<?php 
    require "connection.php"; //se non trova file da errore
	
    $stmt=mysqli_prepare($connection,"SELECT *, SUM(product.Price*Pice) AS total FROM cart JOIN product ON ProductId = product.Id WHERE UserId=?;");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['Id']);
    if(!mysqli_stmt_execute($stmt))
        echo "Errore nella connessione";
    $res=mysqli_stmt_get_result($stmt);//piglio risultato
    $row=mysqli_fetch_array($res);
    echo $row['total'];
?>