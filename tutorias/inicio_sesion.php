<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesión</title>
	<link rel="stylesheet" type="text/css" href="css/inicio.css">
</head>
	<body>
	<div class="container">
    	<form action="validar.php" method="POST">
        	<div class="container-info">
            	<div class="form-info">
                <div class="info">
                    <div align="center">
                    <h2>INICIO SESIÓN</h2><br><br>
                    <b><label >Usuario:</label><br></b>
                    	<input type="text" name="matricula"><br><br>
                    <b><label>Contraseña:</label><br></b>
                    	<input type="password" name="contraseña" required><br>
                    <button type="submit">Iniciar</button>
                	</div>
                </div>
            	</div>
        	</div>
    	</form>
    </div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src=""></script>
</body>
<!-- <script type="text/javascript">
			function mensaje(){
				alert("Contraseña incorrecta");
			}
		</script> -->
</html>