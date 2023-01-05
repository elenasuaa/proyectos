<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/estilo_index.css">
</head>
<body>
	<header class="encabezado">
		<nav>
			<div><img src="img/estadisticas.png" alt=""></div>
			<ul>
				<li><a id="cuenta" href="">Mi cuenta</a>
					<ul>
						<li><a id="menu" href="configuracion.php">Configuración de cuenta</a></li>
						<li><a id="menu" href="">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header><br>
		<div class="nomb_user">
		<p>Hola,</p>
		<h3>@nombre del usuario</h3><br>
		</div>
		<div class="ingresos">
			<p>Tus ingresos</p>
			<h2 style="color: #4472C4;">Aquí va el ingreso</h2><br><br>
			<p>Próximo a pagar</p>
			<h2 style="color: #4472C4;">Aquí va otra cantidad</h2>
			<p id="fecha_v">Fecha de vencimiento</p>
		</div><br><br><br><br>
			<div class="imagenes" align="center">
				<a href="ingreso.php"><button><img src="img/agg_ingreso.png"></button></a>
					<p>Agregar ingreso</p>
				<a href="tipo_gastos.php"><button><img src="img/gastos.png"></button></a>
					<p>Gastos</p>
				<a href="estado_cuenta.php"><button><img src="img/EstadodeCuenta.png"></button></a>
					<p>Estado de cuenta</p>
				<a href="calendario.php"><button><img src="img/calendario.png"></button></a>
					<p>Calendario</p>
				<a href=""><button><img src="img/consejos.png"></button></a>
					<p>Consejos</p> 
			</div>

	<!-- <div class="imagenes" align="center">
		<a href=""><img src="img/agg_ingreso.png"></a>
		<p>Agregar ingreso</p>
		<a href=""><img src="img/gastos.png"></a>
		<p>Gastos</p>
		<a href=""><img src="img/EstadodeCuenta.png"></a>
		<p>Estado de cuenta</p>
		<a href=""><img src="img/calendario.png"></a>
		<p>Calendario</p>
		<a href=""><img src="img/consejos2.png"></a>
		<p>Consejos</p> -->
	</div>
</body>
</html>