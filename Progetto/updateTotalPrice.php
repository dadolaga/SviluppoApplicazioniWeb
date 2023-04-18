<?php 
    require "connection.php"; //se non trova file da errore
	
    $stmt=mysqli_prepare($connection,"SELECT *, SUM(product.Prezzo*Pezzi) AS total FROM carrello JOIN product ON ProdottoId = product.Id WHERE UtenteId=?;");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['Id']);
    if(!mysqli_stmt_execute($stmt))
        echo "Errore nella connessione";
    $res=mysqli_stmt_get_result($stmt);//piglio risultato
    $row=mysqli_fetch_array($res);
    echo $row['total'];
?>