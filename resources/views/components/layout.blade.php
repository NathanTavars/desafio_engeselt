<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/client.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Rita Cookies</title>
</head>
<body>
    
<div class="header">
        <div class="topics">
            <div class="logo">
            <img src="./img/cookie-logo.png" alt="">    
            <h1>Cookies da Rita</h1>
        </div>
        <a href="{{ route('clients.index') }}" class="pages">Ver Clientes</a>
        <a href="{{ route('orders.index') }}" class="pages">Ver Pedidos</a>
        <a href="{{ route('clients.show') }}" class="pages">Ver Mapa</a>

    </div> 
</div>   
    <div class="layout">
    @yield('content')  
    </div>

    <script src="node_modules/@turf/turf/turf.min.js"></script>

</body>
</html>