<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <title>Inicio</title>
</head>
<body>
    <x-app-layout>
    <div class="circulo"></div>
        <div class="content">
        <div class="textBox">
            <h2>Inventario de herramientas<br> <span>JDK Tools</span></h2>
            <p>Un sistema de inventario tiene un papel vital para funcionar acorde y coherente dentro del proceso de producción.</p>
            <a href="{{route('imprimir')}}">Imprimir PDF</a>
        </div>
        <div class="imgBox">
        <img  clas="icono" src="img3.png" alt="">
        </div>
        </div>    
    </x-app-layout>
 
</body>
</html>
