<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nuevo gasto</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/estilo_secundario.css">
</head>
<body>
	<div id="barra"></div>
		<h1>Nuevo gasto</h1><br>
		<div id="saldo">Saldo $Aquí va tu saldo</div>
		<center>
		<table id="tb-ingreso">
				<tr>
					<td>
						<label>Importe:</label>
						<input type="text" name="monto" required="">
						<label>Concepto:</label>
						<textarea name="concepto" required=""></textarea>
						</td>
						<td>
						<label>Fecha:</label>
						<input type="date" name="" required="">
					</td>
				</tr>
			</table>
			</center>
			<br>
				<div id="btns">
					<a href="">Cancelar</a>
					<input type="submit" value="Guardar" class="btn">
				</div>
</body>
</html>