<!DOCTYPE html>
<html lang="EN">
    <head> <title>Show profile</title> </head>
    <body>
        <form action="update_profile.php" method="post">
            <input type="text" name="firstname" value=<?php echo $FIRSTNAME; ?>>
            <input type="text" name="lastname" value=<?php echo $LASTNAME; ?>>
            <input type="email" name="email" value=<?php echo $EMAIL; ?>>
            <input type="username" name="username" required value=<?php echo $USERNAME; ?>> <!-- per poter commentare deve essere obbligatorio-->
            <input type="text" name="residance" value=<?php echo $RESIDANCE; ?>>
            <input type="date" name="born" required value=<?php echo $BORN; ?>>  <!-- si accettano solo maggiorenni-->
            <input type="text" name="linkWeb" value=<?php echo $LINKWEB; ?>>
            <input type="text" name="social" value=<?php echo $SOCAL; ?>>
            <input type="submit" name="submit" value="modification">
        </form>
        <a href="delete_profile.php">Delete profile </a>
    </body>
</html>