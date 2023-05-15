<html>

<head>
	<?php 
		require "connection.php";
        require "include.php";
	?>
  <style>
  </style>

<body>
	<?php require "header.php";?>
	
		<div class="container">
		<div class="row d-flex justify-content-center my-4">
			<div class="col-md-8">
				<div class="card mb-4">
					<div class="card-header py-3">
					<h5 class="mb-0">Cart</h5>
					</div>
					<div class="card-body">
						<!-- inserimento automatico prodotti nel cart -->
						<?php
							$stmt=mysqli_prepare($connection,"SELECT * FROM cart JOIN product ON ProductId = product.Id WHERE UserId=?;");
							mysqli_stmt_bind_param($stmt, 'i', $_SESSION['Id']);
							if(!mysqli_stmt_execute($stmt))
								echo "Errore nella connessione";
							$res=mysqli_stmt_get_result($stmt);//piglio risultato

							$cont = 0;
							while(($row=mysqli_fetch_array($res))!=NULL){
							echo '<div id="row_'.$cont.'" class="row">
							<div class="col-3 ">
							<!-- Image -->
								<div class="bg-image hover-overlay ripple rounded" >
									<img class="w-100" src="product/' .$row['Id']. '.jpg" onclick="window.open(\'singleProduct.php?id='.$row['Id'].'\', \'_self\')"/>
								</div>
							<!-- Image -->
							</div>
	
							<div class="col-5 ">
								<!-- Data -->
								<h4><strong>'.$row['Title'].'</strong></h4>
									<p class="">
										<strong>'.$row['Price'].' §</strong>
									</p>
								<button type="button" class="btn btn-primary btn-sm me-1 mb-2" title="rimuovi articolo" onclick="trash('.$row['Id'].','.$cont.');">
									<i class="fas fa-trash" style="font-size: 25px;" ></i>
								</button>
								<!-- Data -->	
							</div>
	
							<div class="col-4 ">
							<!-- Quantity -->
								<div class="d-flex " style="max-width: 300px">
									<button class="btn btn-primary px-3 me-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown(); updatePrice('.$row['Id'].','.$cont.');">
										<i class="fas fa-minus"></i>
									</button>
	
									<div class="form-outline">
										<input id="Pezzi_'.$cont.'" min="0" name="quantity" value="'.$row['Pice'].'" type="number" class="form-control" disabled/>
									</div>	
	
									<button class="btn btn-primary px-3 ms-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp(); updatePrice('.$row['Id'].','.$cont.');">
										<i class="fas fa-plus"></i>
									</button>
								</div>
							</div>
							<hr class="my-4" />
						</div>';

						$cont++;
							}
						?>

				</div>
			</div>
			<div class="card mb-4 <?php if($cont == 0) echo "d-none";?>">
				<div class="card-body">
				<p><strong>Expected shipping delivery</strong></p>
				<p class="mb-0">
					<?php
						$today = date_create();
						echo date_format(date_add($today,date_interval_create_from_date_string("7 days")), "d/m/Y") . " - " . date_format(date_add($today,date_interval_create_from_date_string("14 days")), "d/m/Y");
					?>
				</p>
				</div>
			</div>
			
			</div>
			<?php
				$stmt=mysqli_prepare($connection,"SELECT *, SUM(product.Price*Pice) AS total FROM cart JOIN product ON ProductId = product.Id WHERE UserId=?;");
				mysqli_stmt_bind_param($stmt, 'i', $_SESSION['Id']);
				if(!mysqli_stmt_execute($stmt))
					echo "Errore nella connessione";
				$res=mysqli_stmt_get_result($stmt);//piglio risultato
				$row=mysqli_fetch_array($res);
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

				<button type="button" class="col-12 btn btn-primary btn-lg btn-block">
					Go to checkout
				</button>
				</div>
				<div class="card mb-4 mb-lg-0">
					<div class="card-body">
						<p><strong>We accept</strong></p>
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
	function updatePrice(id, cont){
		var pezzi = document.getElementById("Pezzi_"+cont).value;
	
		fetch('updatePices.php?id='+id+'&Pezzi='+pezzi)//uso + per concatenare(javascript) passo con GET(default)
		.then(function(response) {
			if(response.ok) 
				reloadPrice();
		});
	}

	function reloadPrice(){
		fetch('updateTotalPrice.php')//passo con GET(default)
		.then(response => response.text())
		.then(data => {
		// Aggiorna il front-end con il nuovo prezzo
		document.getElementById("total_1").innerText=data+' §';
		document.getElementById("total_2").innerText=data+' §';
		})
		.catch(error => console.error(error));
	}

	function trash(id,cont){
	
		fetch('trash.php?id='+id)//uso + per concatenare(javascript) passo con GET(default)
		.then(function(response) {
			if(response.ok) {
				document.getElementById("row_"+cont).remove();
				reloadPrice();
			}
		});
	}
</script>

</html>