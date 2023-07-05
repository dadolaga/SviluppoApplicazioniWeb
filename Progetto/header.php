<header class="p-3 mb-3 border-bottom " style="--bs-border-color: black;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="image/logo.jpg" height="50" width="50">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="color: black;">
                <li><a href="index.php" class="nav-link px-2 "> Home </a></li>
                <li><a href="product.php" class="nav-link px-2 "> Products </a></li>

            </ul>

            <form class="input-group me-auto <?php if(!isset($showSearch)) echo "d-none"; ?>" style="width: 50%;" action="product.php">
                <input type="search" class="form-control float-start" name="name" data-mdb-filter='true' placeholder="Search..." aria-label="Search">
                <button type="submit" class="btn btn-primary" style="width: 10%; background-color: black; border-color: black; ">
                    <i class="fa fa-search" style="color:white !important"></i>
                </button>
            </form>


            <div class="col-auto text-end <?php if (isset($_SESSION['Id'])) echo "d-none" ?>" id="login">
                <button type="button" class="btn btn-outline-primary me-2" onclick="window.open('login.php','_self')">Login</button>
                <button type="button" class="btn btn-primary" onclick="window.open('registration.php','_self')">Sign-up</button>
            </div>

            <!--non funziona menù a tendina del profilo è da posizionare meglio-->
            <div class="dropdown text-end position-relative <?php if (!isset($_SESSION['Id'])) echo "d-none" ?>" id="alien_user"> <!--d-none nasconde logo-->
                <a href="#" class=" link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex;align-items: center;">
                    <img src="image/user.png" alt="mdo" width="32" height="32" class="rounded-circle float-start">
                    <?php
                    if (isset($_SESSION['Id'])) {
                        $stmt = mysqli_prepare($connection, "SELECT Name FROM user WHERE user.Id=" . $_SESSION["Id"]);
                        if (!mysqli_stmt_execute($stmt))
                            echo "Errore nella connessione";
                        $res = mysqli_stmt_get_result($stmt); //piglio risultato
                        $row = mysqli_fetch_array($res); //piglio tutta la riga

                        echo "<div class='truncate float-start mt-1'> Hello " . $row["Name"] . "</div>"; //per scrivere nome
                    } 
                    ?>
                </a>

                <ul class="dropdown-menu text-small float-start ">
                    <li><a class="dropdown-item" href="ShoppingBag.php">Alien Bag</a></li>
                    <li><a class="dropdown-item" href="show_profile.php">Profile</a></li><!--profilo utente stile insta + edit profile-->
                    <li><a class="dropdown-item" href="review.php">Reviews</a></li><!--recensioni-->

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="logout.php" onclick="window.open('logout.php','_self')">Sign out</a></li>
                </ul>
            </div>

        </div>
    </div>
</header>