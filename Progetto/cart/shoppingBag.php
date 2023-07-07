<!DOCTYPE html>
<html lang="EN">
<head>
	<title>Shopping bag</title>
	<?php
	//quando prodotto viene acquistato automaticamente appare 
	//la quantità prelevata in stock quindi non viene gestita la decrementazione nel DB
	require "../home/connection.php";
	require "../home/include.php";
	if (!empty($_POST)) {
		$key = array_keys($_POST);
		for ($i = 0; $i < count($key); $i++) {
			$id = explode("_", $key[$i])[1];
			$quantity = $_POST[$key[$i]];

			$stmt = mysqli_prepare($connection, "INSERT INTO myOrder(UserId, ProductId, Quantity) VALUES(?,?,?);");
			mysqli_stmt_bind_param($stmt, 'iii', $_SESSION['Id'], $id, $quantity);
			mysqli_stmt_execute($stmt);

			$stmt = mysqli_prepare($connection, "DELETE FROM cart WHERE UserId=? AND ProductId=?;");
			mysqli_stmt_bind_param($stmt, 'ii', $_SESSION['Id'], $id);
			mysqli_stmt_execute($stmt);
		}
	}

	?>
	<link href="../style/completeOrder.css" rel="stylesheet">
</head>

<body>
	<?php require "../home/header.php"; ?>

	<div class="container">
		<div class="row d-flex justify-content-center my-4">
			<div class="col-md-8">
				<div class="card mb-4">
					<div class="card-header py-3">
						<h5 class="mb-0">Cart</h5>
					</div>
					<div class="card-body">
						<form method="POST" id="form_cart">
							<!-- inserimento automatico prodotti nel cart -->
							<?php
							$stmt = mysqli_prepare($connection, "SELECT * FROM cart JOIN product ON ProductId = product.Id WHERE UserId=?;");
							mysqli_stmt_bind_param($stmt, 'i', $_SESSION['Id']);
							if (!mysqli_stmt_execute($stmt))
								echo "Errore nella connessione";
							$res = mysqli_stmt_get_result($stmt); //piglio risultato

							$cont = 0;
							while (($row = mysqli_fetch_array($res)) != NULL) {
								echo '<div id="row_' . $cont . '" class="row">
								<div class="col-3 ">
								<!-- Image -->
									<div class="bg-image hover-overlay ripple rounded" >
										<img class="w-100" src="../image/product/' . $row['Id'] . '.jpg" onclick="window.open(\'../product/singleProduct.php?id=' . $row['Id'] . '\', \'_self\')"/>
									</div>
								<!-- Image -->
								</div>
		
								<div class="col-5 ">
									<!-- Data -->
									<h4><strong>' . $row['Title'] . '</strong></h4>
										<p class="">
											<strong>' . $row['Price'] . ' §</strong>
										</p>
									<button type="button" class="btn btn-primary btn-sm me-1 mb-2" title="rimuovi articolo" onclick="trash(' . $row['Id'] . ',' . $cont . ');">
										<i class="fas fa-trash" style="font-size: 25px;" ></i>
									</button>
									<!-- Data -->	
								</div>
		
								<div class="col-4 ">
								<!-- Quantity -->
									<div class="d-flex " style="max-width: 300px">
										<!-- bottone decremento quantità -->
										<div class="btn btn-primary px-3 me-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown(); updatePrice(' . $row['Id'] . ',' . $cont . ');" readonly>
											<i class="fas fa-minus"></i>
										</div>
		
										<div class="form-outline">
											<input id="Pezzi_' . $cont . '" min="0" name="quantity_' . $row['Id'] . '" value="' . $row['Pice'] . '" type="number" class="form-control" readonly/>
										</div>	
										<!-- bottone incremento quantità -->
										<div class="btn btn-primary px-3 ms-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp(); updatePrice(' . $row['Id'] . ',' . $cont . ');" readonly>
											<i class="fas fa-plus"></i>
										</div>
									</div>
								</div>
								<hr class="my-4" />
							</div>';

								$cont++;
							}
							?>

						</form>

					</div>
				</div>
				<div class="card mb-4 <?php if ($cont == 0) echo "d-none"; ?>">
					<div class="card-body">
						<p><strong>Expected shipping delivery</strong></p>
						<p class="mb-0">
							<?php
							$today = date_create();
							echo date_format(date_add($today, date_interval_create_from_date_string("7 days")), "d/m/Y") . " - " . date_format(date_add($today, date_interval_create_from_date_string("14 days")), "d/m/Y");
							?>
						</p>
					</div>
				</div>

			</div>
			<?php
			$stmt = mysqli_prepare($connection, "SELECT *, SUM(product.Price*Pice) AS total FROM cart JOIN product ON ProductId = product.Id WHERE UserId=?;");
			mysqli_stmt_bind_param($stmt, 'i', $_SESSION['Id']);
			if (!mysqli_stmt_execute($stmt))
				echo "Errore nella connessione";
			$res = mysqli_stmt_get_result($stmt); //piglio risultato
			$row = mysqli_fetch_array($res);
			$total = $row['total'];
			?>
			<div class="col-md-4">
				<div class="card mb-4">
					<div class="card-header py-3">
						<h5 class="mb-0">Summary</h5>
					</div>
					<div class="card-body">
						<ul class="list-group list-group-flush">
							<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
								Products
								<span id="total_1"><?php echo $total ?> §</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center px-0">
								Shipping
								<span>Gratis</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
								<div>
									<strong>Total amount</strong>
									<strong>
										<p class="mb-0">(including IVA)</p>
									</strong>
								</div>
								<span><strong id="total_2"><?php echo $total ?> §</strong></span>
							</li>
						</ul>

						<div style="display: flex; justify-content: center;">
							<button class="truck-button">
								<span class="default">Complete Order</span>
								<span class="success">
									Order Placed
								</span>
								<div class="truck">
									<div class="wheel"></div>
									<div class="back"></div>
									<div class="front"></div>
									<div class="box"></div>
								</div>
							</button>
						</div>

					</div>
					<div class="card mb-4 mb-lg-0 p-3">
						<p><strong>We accept</strong></p>
						<div class="card-body d-flex justify-content-between">
							<i class="mx-4 fa-brands fa-amazon-pay fa-beat-fade fa-2xl" style="color: #213454;"></i>
							<i class="mx-4 fa-brands fa-cc-visa fa-beat-fade fa-2xl" style="color: #1f3551;"></i>
							<i class="mx-4 fa-brands fa-paypal fa-beat-fade fa-2xl" style="color: #394a8e;"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	function updatePrice(id, cont) {
		var pezzi = document.getElementById("Pezzi_" + cont).value;

		fetch('updatePices.php?id=' + id + '&Pezzi=' + pezzi) //uso + per concatenare(javascript) passo con GET(default)
			.then(function(response) {
				if (response.ok)
					reloadPrice();
			});
	}

	function reloadPrice() {
		fetch('updateTotalPrice.php') //passo con GET(default)
			.then(response => response.text())
			.then(data => {
				// Aggiorna il front-end con il nuovo prezzo
				document.getElementById("total_1").innerText = data + ' §';
				document.getElementById("total_2").innerText = data + ' §';
			})
			.catch(error => console.error(error));
	}

	function trash(id, cont) {

		fetch('trash.php?id=' + id) //uso + per concatenare(javascript) passo con GET(default)
			.then(function(response) {
				if (response.ok) {
					document.getElementById("row_" + cont).remove();
					reloadPrice();
				}
			});
	}

	function reload() {
		//ricarica pagina dopo ordine
		document.getElementById("form_cart").submit();
	}
</script>

</html>


<script>
	document.querySelectorAll('.truck-button').forEach(button => {
		button.addEventListener('click', e => {
			setTimeout(reload, 5500);

			e.preventDefault();
			let box = button.querySelector('.box'),
				truck = button.querySelector('.truck');

			if (!button.classList.contains('done')) {
				if (!button.classList.contains('animation')) {
					button.classList.add('animation');

					gsap.to(button, {
						'--box-s': 1,
						'--box-o': 1,
						duration: .3,
						delay: .5
					});

					gsap.to(box, {
						x: 0,
						duration: .4,
						delay: .7
					});

					gsap.to(button, {
						'--hx': -5,
						'--bx': 50,
						duration: .18,
						delay: .92
					});

					gsap.to(box, {
						y: 0,
						duration: .1,
						delay: 1.15
					});

					gsap.set(button, {
						'--truck-y': 0,
						'--truck-y-n': -26
					});

					gsap.to(button, {
						'--truck-y': 1,
						'--truck-y-n': -25,
						duration: .2,
						delay: 1.25,
						onComplete() {
							gsap.timeline({
								onComplete() {
									button.classList.add('done');
								}
							}).to(truck, {
								x: 0,
								duration: .4
							}).to(truck, {
								x: 40,
								duration: 1
							}).to(truck, {
								x: 20,
								duration: .6
							}).to(truck, {
								x: 96,
								duration: .4
							});
							gsap.to(button, {
								'--progress': 1,
								duration: 2.4,
								ease: "power2.in"
							});
						}
					});
				}
			} else {
				button.classList.remove('animation', 'done');
				gsap.set(truck, {
					x: 4
				});
				gsap.set(button, {
					'--progress': 0,
					'--hx': 0,
					'--bx': 0,
					'--box-s': .5,
					'--box-o': 0,
					'--truck-y': 0,
					'--truck-y-n': -26
				});
				gsap.set(box, {
					x: -24,
					y: -6
				});
			}
		});
	});
</script>